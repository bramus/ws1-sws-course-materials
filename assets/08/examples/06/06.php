<?php

	// includes & requires
	require_once '06.class.php'; // our template class

	// our variables
	$title = 'Lecturers Web Courses';
	$lecturers = array(
		'frank.haelman' => array('WT'),
		'rogier.vanderlinde' => array('WT','WS1','WS2','WP'),
		'bramus.vandamme' => array('WT','WS1','WS2','WMD'),
		'davy.dewinne' => array('WS2','WMD'),
		'kevin.picalause' => array('WP')
	);

	// load template
	$tpl = new Template('06.tpl');

	// activeate iLectureres iteration
	$tpl->setIteration('iLecturers');

	// loop all our values
	foreach($lecturers as $lecturer => $courses) {

		// assign in template iteration
		$tpl->assignIteration('lecturer', $lecturer);

		// activate iCourses iteration inside iLecturers
		$tpl->setIteration('iCourses','iLecturers');

		foreach ($courses as $course) {

			// assign value in iteration
			$tpl->assignIteration('course', $course);

			// refill the iteration
			$tpl->refillIteration('iCourses');

		}

		// parse the iteration
		$tpl->parseIteration('iCourses');

		// refill the iteration (mandatory!)
		$tpl->refillIteration('iLecturers');

	}

	// parse the iteration
	$tpl->parseIteration('iLecturers');

	// output the parsed template contents
	$tpl->display();

// EOF