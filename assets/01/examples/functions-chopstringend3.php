<?php

	/**
	 * Chops a string at the given length with the given ending
	 *
	 * @param	string 	$str 	The initial String
	 * @param	int 	$len 	The length to chop off at
	 * @param	string 	$ending	The ending to add
	 *
	 * @return	string 	The circumcised up string
	 */
	function chopStringEnd($str, $len = 30, $ending = '---') {
		if (strlen($str) < $len)
			return $str;
		else
			return substr($str, 0, $len - strlen($str)) . $ending;
	}

	// Our variables
	$origStr = '/Users/bramus/Dropbox/Kaho/Lesactiviteiten/Webscripting1';
	$cutoffLength = 40;
	$endStr = '...';

	// Go!
	echo chopStringEnd($origStr, $cutoffLength, $endStr) . '<br />' . PHP_EOL;
	echo chopStringEnd($origStr, $cutoffLength) . '<br />' .PHP_EOL;
	echo chopStringEnd($origStr);