<?php

// Kickstart the framework
$f3=require('lib/base.php');

// Include rest service class
require('lib/rest.php');
require('lib/mail.php');

require('objects/authed.php');
require('objects/user.php');
require('objects/league.php');

// Load configuration

$f3->config('config.ini');
$f3->set('DEBUG', 3);

$f3->set('DB',
new DB\SQL(
'mysql:host=localhost;port=3306;dbname=efsports',
'efsports',
'3f5p0rt5'
)
);

$f3->set('ONERROR',function($f3){
  echo Template::instance()->render('error.html');
});

// Start Routing

$f3->route('GET /',
	function($f3) {

		$f3->reroute("/my-leagues");
	}
);

$f3->route('GET /login', 'User->login');
$f3->route('POST /login', 'User->loginAttempt');

$f3->route('GET /profile','User->profile');
$f3->route('GET /profile-edit','User->editProfile');

$f3->route('GET /register', 'User->register');
$f3->route('POST /register', 'User->attemptRegister');

$f3->route('GET /signup-confirm', 'User->keyGenerated');
$f3->route('GET /signup-confirm/@key', 'User->confirmEmailKey');

$f3->route('GET /logout', 'User->logout');

$f3->route('GET /my-leagues', 'League->myLeagues');
$f3->route('GET /my-drafts', 'League->myDrafts');
$f3->route('GET /start-a-league', 'League->startLeague');
$f3->route('GET /buy-an-orphan', 'League->listOrphans');
$f3->route('GET /list-players/@lgid/@side/@pos/@first/@last', 'League->listPlayers');

$f3->route('GET /other-gaming',
	function($f3) {
		
		echo Template::instance()->render('other_gaming.html');
	}
);

$f3->run();

