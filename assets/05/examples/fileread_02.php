<?php

/**
 * Get contents of a file into a string (per 20 bytes)
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	$handle = fopen(__DIR__ . '/testfile.txt', 'r');

	if ($handle) {
		while (!feof($handle)) {
			$buffer = fgets($handle, 20);
			echo $buffer . '<br />' . PHP_EOL;
		}
		fclose($handle);
	}

// EOF