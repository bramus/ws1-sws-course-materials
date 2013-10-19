<?php

	// includes & requires
	require_once '03.class.php'; // our template class

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

	// load template
	$tpl = new Template();
	$tpl->loadTemplate(__DIR__ . '/03.tpl');

	// render template with our data
	// @note The template class with automatically prevent XSS for us :-)
	echo $tpl->render(array(
		'title' => $title,
		'user' => $userName,
		'weather' => $weatherToday
	));

// EOF