<?php
	require_once('../vendor/autoload.php');
	require_once('../globals.php');
	require_once('./JsonPDO.php');
	require_once('./SlimAPI.php');
	require_once('./routes.php');
	
	$api = new SlimAPI([
		'name' => 'Course Report API - BreatheCode Platform',
		'debug' => true,
		'jwt-clients' => [
		    'alesanchezr' => "$@#DF!gvGF!E5F#G423*fghyUJAS!dfR@vf4"
		]
	]);
	
	$api->addDB('json', new JsonPDO('data/','[]',false));
	$api->addReadme('/','./README.md');
	$api = addAPIRoutes($api);
	$api->run(); 