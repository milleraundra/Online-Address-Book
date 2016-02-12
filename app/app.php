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

	$app->post('/create_contact', function() use ($app) {
		$_SESSION['list_of_contacts'] = array();
		$address = new Address($_POST['street'], $_POST['city'], $_POST['state']);
		$contact = new Contact($_POST['first_name'], $_POST['last_name'], $_POST['phone'], $address);
		$contact->save();
		var_dump($_SESSION['list_of_contacts']);
		$app['debug'] = true;
		return $app['twig']->render('new_contact.html.twig', array('newContact'=> $contact));
	});

	return $app;

?>