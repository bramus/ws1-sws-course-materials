<?php

	error_reporting(E_ALL); // set error reporting on
	
	function divide($numerator, $denominator) {
		return $numerator / $denominator;
	}
	
	echo divide(1, 2) . '<br />' . PHP_EOL;	// 0.5
	echo divide(1, 0) . '<br />' . PHP_EOL;	// "Warning: Division by zero"
	echo @divide(1, 0) . '<br />' . PHP_EOL;	// (suppressed)
	echo divide(1, 2) . '<br />' . PHP_EOL;	// 0.5