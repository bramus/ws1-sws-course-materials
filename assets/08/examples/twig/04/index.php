<?php

	// includes & requires
	require_once __DIR__ . '/includes/Twig/Autoloader.php';
	Twig_Autoloader::register();

	// Twig Bootstrap
	$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
	$twig = new Twig_Environment($loader);

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

	// load template
	$tpl = $twig->loadTemplate('main.twig');

	// render template with our data
	echo $tpl->render(array(
		'title' => $title,
		'user' => $userName,
		'weather' => $weatherToday
	));

// EOF