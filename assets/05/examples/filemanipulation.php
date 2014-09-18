<?php

/**
 * Copy, rename and delete
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	// Copy file
	copy(__DIR__ . '/testfile.txt', __DIR__ . '/copiedfile.txt');

	// Rename file
	// @note if the path differs you can move a file with this function!
	rename(__DIR__ . '/copiedfile.txt', __DIR__ . '/testfile2.txt');

	// Delete file
	unlink(__DIR__ . '/testfile2.txt');

	echo 'The demo was done';

// EOF