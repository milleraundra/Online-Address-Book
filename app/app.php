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
		$all_contacts = Contact::getAll();
		return $app['twig']->render('/index.html.twig', array('contacts'=> $all_contacts));
		//how would I get addresses to show here?
	});

	$app->post('/create_contact', function() use ($app) {
		$contact = new Contact($_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['street'], $_POST['city'], $_POST['state']);
		$contact->save();
		return $app['twig']->render('new_contact.html.twig', array('newContact'=> $contact));
	});

	$app->post('/delete_all', function() use ($app) {
		Contact::deleteAll();
		$all_contacts = Contact::getAll();
		return $app['twig']->render('/index.html.twig', array('contacts'=> $all_contacts));
	});

	$app->post('/search', function() use($app) {
		$search = $_POST['search'];
		$all_contacts = Contact::getAll();
        $matching_contacts = array();
		if ($search == NULL) {
			return $app['twig']->render('/index.html.twig', array('contacts'=> $all_contacts));

		} else {
			foreach ($all_contacts as $contact) {
	            $search = strtolower($search);
	            $contact_name = $contact->fullName();
	            $contact_name = strtolower($contact_name);
	            if (strpos($contact_name, $search) !== false) {
	                array_push($matching_contacts, $contact);
	            }
	        }
	        return $app['twig']->render('/search_results', array('matching_contacts'=> $matching_contacts));
		}
	});

	return $app;

?>
