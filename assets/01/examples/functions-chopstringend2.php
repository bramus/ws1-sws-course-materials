<?php

	// Out chopStringEnd function
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