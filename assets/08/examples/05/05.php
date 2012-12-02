<?php

	// includes & requires
	require_once '05.class.php';	// our template class

	// our variables
	$title = 'Lecturers Web Courses';
	$lecturers = array('frank.haelman (WT)', 'rogier.vanderlinde (WT/WS1/WS2/WP)', 'bramus.vandamme (WT/WS1/WS2/WMD)', 'davy.dewinne (WS2/WMD)', 'kevin.picalausa (WP)');

	// load template
	$tpl = new Template('05.tpl');

	// assign variables into template
	$tpl->assign('title', $title);

	// activate iLecturers iteration
	$tpl->setIteration('iLecturers');

	// loop all our values
	foreach($lecturers as $lecturer) {

		// assign in template iteration
		$tpl->assignIteration('lecturer', $lecturer);

		// assign iterationOption
		if (strstr($lecturer,'bramus.vandamme') !== false)
			$tpl->assignIterationOption('oItsme');

		// refill the iteration (mandatory!)
		$tpl->refillIteration('iLecturers'); // alternative: $tpl->refillIteration();

	}

	// parse the iteration
	$tpl->parseIteration('iLecturers'); // alternative: $tpl->parseIteration();

	// output the parsed template contents
	$tpl->display(); // alternative: echo $tpl->getContent();

// EOF