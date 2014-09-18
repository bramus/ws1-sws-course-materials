<?php

/**
 * Open a file and show its contents
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	// path to file (relative from this PHP file)
	$filename = __DIR__ . '/testfile.txt';

	// open the file in read mode
	// @see http://php.net/fopen for other modes (r, r+, w, w+, a, a+, ...)
	$handle = fopen($filename, 'r');

	// file was opened, read in the contents
	if ($handle) {
		$contents = fread($handle, filesize($filename));
	}

	// file not opened (file might not exist, or no permissions to open it)
	else {
		$contents = 'Error while opening file!';
	}

	// close the filehandle
	fclose($handle);

	// output the fetched contents
	echo $contents;

// EOF