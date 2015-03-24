<?php

require('vendor/mandrill/mandrill/src/Mandrill.php');

class mail {
	
	function __construct($name, $email, $confirmation_key) {
		$mandrill = new Mandrill('YStoyLyXNA8LibaZKRKPUw') ;
		$template_name = 'Customer Signup';
	    $template_content = array(
	        array(
	            'name' => 'example name',
	            'signupkey' => 'XYZ'
	        )
	    );
	    $message = array(
	        'subject' => 'Confirmation: New Owner Signup',
	        'from_email' => 'support@efsports.com',
	        'from_name' => 'EFSports',
	        'to' => array(
	            array(
	                'email' => $email,
	                'name' => $name,
	                'type' => 'to'
	            )
	        ),
	        'headers' => array('Reply-To' => 'support@efsports.com'),
	        'important' => false,
	        'track_opens' => null,
	        'track_clicks' => null,
	        'inline_css' => null,
	        'merge' => true,
	        'merge_language' => 'mailchimp',
	        'global_merge_vars' => array(
	            array(
	                'fname' => 'merge1',
	                'signupkey' => 'merge1 content'
	            )
	        ),
	        'merge_vars' => array(
	            array(
	                'rcpt' => $email,
	                'vars' => array(
	                    array(
	                        'name' => 'FNAME',
	                        'content' => $name
	                    ),
	                    array(
	                        'name' => 'SIGNUPKEY',
	                        'content' => $confirmation_key
	                    )
	                )
	            )
	        ),
	        'tags' => array('signup-confirm'),
	        'google_analytics_domains' => array('efsports.com'),
	        'metadata' => array('website' => 'www.efsports.com')
	    );
	    $async = false;
	    $ip_pool = 'Main Pool';
	    $send_at = false;
	    $this->result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);

	    return true;
	}
	

}

?>