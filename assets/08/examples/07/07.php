<?php

/**
 * Test file for our Template class
 *
 * @author Bramus Van Damme <bramus.vandamme@kahosl.be>
 */

	// Template initialization & creation

		// include Template class
		require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'template.php';

		// create new template instance
		$tpl = new Template();

		// load .tpl file
		$tpl->setTemplate(__DIR__  . DIRECTORY_SEPARATOR . '07.tpl');


	// Variables

		// assign variable $var
		$tpl->assign('var', 'i am a variable which has been set');


	// Options

		// assign option oAssigned
		$tpl->assignOption('oAssigned');

		// assign option which already was defined
		try {
			$tpl->assignOption('oAssigned');
		} catch (Exception $e) {
			// the above throws an error as it already has been defined.
		}


	// Iterations

		// Single Iteration

			// set iteration
			$tpl->setIteration('iSingle');

			// fill ten rows
			for ($i = 0; $i < 10; $i++) {

				// refill it!
				$tpl->refillIteration('iSingle'); // alternative (because the Template engine remembers the last set iteration): $tpl->refillIteration();
			}

			// parse the iteration
			$tpl->parseIteration('iSingle'); // alternative (because the Template engine remembers the last set iteration): $tpl->parseIteration();


		// Single Iteration with values

			// array with values we are going to use
			$aSingleValues = array('one', 'two', 'three', 'four');

			// set iteration
			$tpl->setIteration('iSingleWithValue');

			// loop values
			foreach ($aSingleValues as $singleValue) {

				// assign var
				$tpl->assignIteration('varInIteration', $singleValue);

				// refill Iteration
				$tpl->refillIteration('');

			}

			// parse Iteration
			$tpl->parseIteration('');


		// Nested Iterations

			// array with values we are going to use
			$aNestedValues = array(
				'first' => array('1.1', '1.2', '1.3'),
				'second' => array('2.1', '2.2'),
				'third' => array('3.1', '3.2', '3.3', '3.4')
			);

			// set iteration
			$tpl->setIteration('iNestedOuter');

			// loop values
			foreach ($aNestedValues as $nestedKey => $nestedValue) {

				// assign var in iteration
				$tpl->assignIteration('varInNestedOuter', $nestedKey);

				// set inner iteration
				$tpl->setIteration('iNestedInner', 'iNestedOuter');

				// loop nested values
				foreach ($nestedValue as $innerValue) {

					// assign var in iteration
					$tpl->assignIteration('varInNestedInner', $innerValue);

					// refill iteration
					$tpl->refillIteration();

				}

				// parse inner iteration
				$tpl->parseIteration();

				// refill outer iteration
				$tpl->refillIteration('iNestedOuter');

			}

			// parse Iteration
			$tpl->parseIteration('iNestedOuter');


	// Options Revisited: options in iterations

		// Single iteration with value and option

			// set iteration
			$tpl->setIteration('iSingleWithValueAndOption');

			// fill ten rows
			for ($i = 0; $i < 10; $i++) {

				// assign option
				if ($i%2 == 1) $tpl->assignIterationOption('oOdd');
				else $tpl->assignIterationOption('oEven');

				// assign $i
				$tpl->assignIteration('i', $i);

				// refill it!
				$tpl->refillIteration('');

			}

			// parse the iteration
			$tpl->parseIteration('');


		// Nested Iterations with options and value

			// array with values we are going to use
			$aNestedValues = array(
				'first' => array('1.1', '1.2', '1.3'),
				'second' => array(),
				'third' => array('3.1', '3.2', '3.3', '3.4')
			);

			// set iteration
			$tpl->setIteration('iNestedOuterWithOption');

			// loop values
			foreach ($aNestedValues as $nestedKey => $nestedValue) {

				// assign var in iteration
				$tpl->assignIteration('varInNestedOuter', $nestedKey);

				// assign option
				if (sizeof((array) $nestedValue) > 0) {

					// assign option in iteration
					$tpl->assignIterationOption('oHasSecondLevel');

					// set inner iteration
					$tpl->setIteration('iNestedInnerWithOption', 'iNestedOuterWithOption');

					// loop nested values
					foreach ($nestedValue as $innerValue) {

						// assign var in iteration
						$tpl->assignIteration('varInNestedInner', $innerValue);

						// if the value contains a two, assign option
						if (strpos($innerValue, '2') !== false) $tpl->assignIterationOption('oHasExtraInSecondLevel');

						// refill iteration
						$tpl->refillIteration();

					}

					// parse inner iteration
					$tpl->parseIteration();

				}

				// refill outer iteration
				$tpl->refillIteration('iNestedOuterWithOption');

			}

			// parse Iteration
			$tpl->parseIteration('iNestedOuterWithOption');



	// Output

		// output the content
		$tpl->display();


// EOF