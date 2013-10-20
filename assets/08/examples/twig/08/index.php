<?php

	// includes & requires
	require_once __DIR__ . '/includes/Twig/Autoloader.php';
	Twig_Autoloader::register();

	// Twig Bootstrap
	$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
	$twig = new Twig_Environment($loader);

	// define our vars (fixed or via calculations)
	$courses = array(
		'JPW235' => 'Webscripting1',
		'JPW213' => 'Webscripting2',
		'JPW218' => 'Web & Mobile',
	);

	// load template
	$tpl = $twig->loadTemplate('main.twig');

	// render template with our data
	echo $tpl->render(array(
		'courses' => $courses
	));

// EOF