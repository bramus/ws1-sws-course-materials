<?php

	// includes & requires
	require_once '04.class.php'; // our template class

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

	// load template
	$tpl = new Template('04.tpl');

	// assign variables into template
	$tpl->assign('title', $title);
	$tpl->assign('user', $userName);
	$tpl->assign('weather', $weatherToday);

	// assign an option
	if ($weatherToday == 'cloudy') {
		$tpl->assignOption('oCloudy');
	} else {
		$tpl->assignOption('oSunny');
	}

	// output the parsed template contents
	$tpl->display(); // alternative: echo $tpl->getContent();

// EOF