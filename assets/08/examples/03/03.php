<?php

	// includes & requires
	require_once '03.class.php'; // our template class

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

	// load template
	$tpl = new Template('03.tpl');

	// assign variables into template
	$tpl->assign('title', $title);
	$tpl->assign('user', $userName);
	$tpl->assign('weather', $weatherToday);

	// output the parsed template contents
	$tpl->display(); // alternative: echo $tpl->getContent();

// EOF