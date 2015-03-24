<?php

class authed {
	function beforeRoute($f3) { 
		//Set the pages that do not need authorization
		$pages = array('/login', "/register", '/signup-confirm', '/logout');

		$hive = $f3->hive();

		$route = preg_split('/\//', $hive['PATH']);

		if ($f3->get('SESSION.user_info') == false && !preg_grep("/".$route[1]."/", $pages)) {
			$f3->reroute('/login');
		}

		// Clear the error so that its always available to any template
		$f3->set('error', '');
		
	}

}

?>