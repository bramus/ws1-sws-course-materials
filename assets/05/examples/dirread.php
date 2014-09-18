<?php

/**
 * List the contents of a directory (files only)
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	// Our base dir
	$myBaseDir = __DIR__;

	// open base directory
	$dp = opendir($myBaseDir) or die('Error reading ' . $myBaseDir);

	// read base directory
	while (($file = readdir($dp)) !== false) {

		// exclude . and ..
		if ($file == '.') continue;
		if ($file == '..') continue;

		// we don't want directories
		if (is_dir($myBaseDir . '/' . $file)) continue;

		// output the filename
		echo $file . '<br />' . PHP_EOL;

	}

	// close base directory pointer
	closedir($dp);

// EOF