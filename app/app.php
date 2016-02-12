<?php

	require_once __DIR__."/../vendor/autoload.php";
	require_once __DIR__."/../src/Contact.php";
	require_once __DIR__."/../src/Address.php";

	session_start();
	if(empty($_SESSION['list_of_contacts'])) {
		$_SESSION['list_of_contacts'] = array();
	}

	$app = new Silex\Application();

	$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=> __DIR__.'/../views'));

	$app->get('/', function() use ($app) {
		return $app['twig']->render('/index.html.twig');
	});

	return $app;

?>