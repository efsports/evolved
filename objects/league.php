<?php

class League extends authed {
	
	function listOrphans ($f3) {
		
		
		$rest = new restCall('
			{
				"proc": "lstopnteam",
				"request": {
					"howmanya": "40", 
					"featured": "Y"
				}
			}
		');
		$f3->set('teams', $rest->result['league']);
		echo Template::instance()->render('buy_an_orphan.html');
	}


	function myLeagues ($f3) {
		
		$rest = new restCall('{"proc": "lstownleg","request": {"cid": "'.$f3->get('SESSION.user_info.cid').'"}}');
		$f3->set('notice', "");
		
		if(empty($rest->result) == false) {
			//print_r($rest->result);die();
			$f3->set('teams', $rest->result['league']);
		} else {
			$f3->reroute('/start-a-league');
		}
		echo Template::instance()->render('my_leagues.html');
	}

	function startLeague ($f3) {
		//$f3->set('error', '');
		
		echo Template::instance()->render('start_a_league.html');
	}

	function createLeague ($f3) {

		// Customer has put in a request 
	}

	function enableLeague ($f3) {
		
	}
 
	function myDrafts ($f3) {
		
		$rest = new restCall('{"proc": "lstownleg","request": {"cid": "'.$f3->get('SESSION.user_info.cid').'","pw":  "'.$f3->get('POST.pass').'"}}');
		if(empty($rest->result) == false) {
			//print_r($rest->result);die();
			$f3->set('teams', $rest->result['league']);
		} else {
			$f3->reroute('/start-a-league');
		}
		echo Template::instance()->render('my_drafts.html');
	}

	function listPlayers ($f3) {

		$rest = new restCall('
			{
				"proc": "playerlist",
				"request": {
					"league": "000000", 
					"type": "Y",
					"first": "",
					"last": "",
					"side": "",
					"pos": "",
					"spos": ""
				}
			}
		');

		print_r($rest);die();
//		$f3->set('teams', $rest->result['league']);

	}

	function beforeRoute ($f3) { parent::beforeRoute($f3);}

}

?>