<?php

class User extends authed {


	function profile ($f3) {
		echo Template::instance()->render('profile.html');
	}


	function editProfile ($f3) {
		echo Template::instance()->render('profile_edit.html');
	}


	function login ($f3) {
		echo Template::instance()->render('login.html');
	}


	function loginAttempt ($f3) {

		// Customer is going to either pass a CID (legacy) or their email address and password
		$loginType = (preg_match("/([^.@]+)(\.[^.@]+)*@([^.@]+\.)+([^.@]+)/", $f3->get('POST.user'))) ? "cemail3" : "cid";

		$user=new DB\SQL\Mapper($f3->get('DB'),'ef_users');
		
		if ( $user->load(array('email=?',$f3->get('POST.user'))) ) {
			if ($user->email_confirmed == 0) {
				$f3->set('error', '
					Did you check your inbox?<br />
					<a style="font-size: 12px; padding-top:10px;"" href="login">
						You must confirm your email before login.
					</a><br/>
				');

				echo Template::instance()->render('login.html');

				return;
			}
		}

		$rest = new restCall('
			{
				"proc": "customer",
				"request": {
					"'.$loginType.'": "'.str_pad($f3->get('POST.user'), 8, "0", STR_PAD_LEFT).'"
				}
			}
		');

		// Check for existence of customer and password match. 

		if(isset($rest->result['cid'])) {

			if ($rest->result['opass'] == $f3->get('POST.pass')) {

				$f3->set('SESSION.user_info', $rest->result);
				$f3->reroute("/my-leagues");

			} else {
				$f3->set('error', '
					<a style="font-size: 11px; padding-top:10px;"" href="login">
						This username/password isnt right.
					</a><br/>
				');
			}

		} 

		

		echo Template::instance()->render('login.html');
	}


	function register ($f3) {
		
		echo Template::instance()->render('register.html');
	}

	function attemptRegister ($f3) {
		$user=new DB\SQL\Mapper($f3->get('DB'),'ef_users');
		// if we don't load it first Mapper will do an insert instead 
		// of update when we use save command

		if ( $user->load(array('email=?',$f3->get('POST.email'))) ) 
		{
			$f3->set('error', '
				<a style="font-size: 12px; padding-top:10px;"" href="login">
					This username/email already exists.
				</a><br/>
			');

			echo Template::instance()->render('register.html');

		} else {
			// User doesnt exists, create new user
			$user->copyFrom('POST');
			$user->confirmation_key=  sha1(uniqid($f3->get('POST.email'), true));
			$user->save();

			//Now email the customer to confirm their signup.
			$mail = new mail($f3->get('POST.fname'), $f3->get('POST.email'), $user->get('confirmation_key'));

			$f3->reroute('/signup-confirm');
		}		
	}

	function keyGenerated ($f3) {
			$f3->set('error', '
				Congrats! Just one more step.<br />
				<a style="font-size: 12px; padding-top:10px;"" href="login">
					Check your email to confirm your signup.
				</a><br/>
			');

			echo Template::instance()->render('login.html');
	}

	function confirmEmailKey ($f3) {

		$user = new DB\SQL\Mapper($f3->get('DB'),'ef_users');

		if ($user->load(array('confirmation_key=?',$f3->get('PARAMS.key')))) {

			$rest = new restCall('{
				"proc": "customer",
				"request": 
					{
						"cid": "", 
						"opass": "'.$user->password.'", 
						"ofirst": "'.$user->fname.'", 
						"olast": "'.$user->lname.'",
						"cemail3": "'.$user->email.'", 
						"ogmt": "-7", 
						"maxs1": "1", 
						"maxs2": "2", 
						"maxs3": "3", 
						"maxs4": "4"}}
			');

			if (!isset($rest->result['cid'])) $f3->error("500");

			$user->cid = $rest->result['cid'];

			$user->confirmation_key = '';
			$user->email_confirmed = 1;

			$user->save();

			// Add an account in EFSports and login the USER
			// Store CID in ef_users table
			// Unset the confrimation_key
			// Set email confirmed to 1
			$f3->set('SESSION.user_info', $rest->result);

			$f3->reroute("/my-leagues");

		} else {
			
			// If we are here, means we have a bad key. Do not proceed.
			$f3->error("500");
			
		}
	}


	function logout ($f3) {
		$f3->clear('SESSION');
		$f3->reroute("/");
	}

	function beforeRoute ($f3) { parent::beforeRoute($f3);}

}

?>