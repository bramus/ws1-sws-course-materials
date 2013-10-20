<?php

	// includes & requires
	require_once __DIR__ . '/includes/Twig/Autoloader.php';
	Twig_Autoloader::register();

	// Twig Bootstrap
	$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
	$twig = new Twig_Environment($loader);

	// load template
	$tpl = $twig->loadTemplate('main2.twig');

	// render template with our data
	echo $tpl->render(array(
		'pageTitle' => 'Template Inheritance'
	));

// EOF