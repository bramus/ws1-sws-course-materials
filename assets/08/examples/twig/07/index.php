<?php

	// includes & requires
	require_once __DIR__ . '/includes/Twig/Autoloader.php';
	Twig_Autoloader::register();

	// Twig Bootstrap
	$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
	$twig = new Twig_Environment($loader);

	// define our vars (fixed or via calculations)
	$lecturers = array(
		array('name' => 'Rogier van der Linde', 'city' => 'Ghent', 'courses' => array('Webtechnology', 'Webdesign & Usability', 'Webscripting 1', 'Webprogramming')),
		array('name' => 'Kevin Picalausa', 'city' => 'Ghent', 'courses' => array('Webscripting 2', 'Webprogramming')),
		array('name' => 'Davy De Winne', 'city' => 'Schellebelle', 'courses' => array('Webtechnology', 'Webdesign & Usability', 'Webscripting 2')),
		array('name' => 'Joske Vermeulen'),
	);

	// load template
	$tpl = $twig->loadTemplate('main.twig');

	// render template with our data
	echo $tpl->render(array(
		'name' => 'Bramus Van Damme',
		'colleagues' => $lecturers
	));

// EOF