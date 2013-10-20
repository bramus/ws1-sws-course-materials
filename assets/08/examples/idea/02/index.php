<?php

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

	// load template
	$tplContent = file_get_contents(__DIR__ . '/templates/main.tpl');

	// assign variables into template
	$tplContent = str_replace('{{ title }}', htmlentities($title), $tplContent);
	$tplContent = str_replace('{{ user }}', htmlentities($userName), $tplContent);
	$tplContent = str_replace('{{ weather }}', htmlentities($weatherToday), $tplContent);

	// output the parsed template contents
	echo $tplContent;

// EOF