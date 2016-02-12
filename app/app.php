<?php

	require_once __DIR__."/../vendor/autohost.php";
	require_once __DIR__."/../src/Address.php";

	$app = new Silex\Application();

	$app = *twig stuff*

	$app->get('/' function() use ($app) {
		return $app['twig']->render('/index.html.twig');
	});

	return $app;

?>