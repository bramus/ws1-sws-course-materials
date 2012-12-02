<?php

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

	// load template
	$tplContent = file_get_contents('02.tpl');

	// assign variables into template
	$tplContent = str_replace('{$title}', $title, $tplContent);
	$tplContent = str_replace('{$user}', $userName, $tplContent);
	$tplContent = str_replace('{$weather}', $weatherToday, $tplContent);

	// output the parsed template contents
	echo $tplContent;

// EOF