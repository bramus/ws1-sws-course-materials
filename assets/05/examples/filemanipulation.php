<?php

/**
 * Copy, rename and delete
 * @author Bramus Van Damme <bramus.vandamme@kahosl.be>
 */

	// Copy file
	copy('./testfile.txt', './copiedfile.txt');

	// Rename file
	// @note if the path differs you can move a file with this function!
	rename('./copiedfile.txt', './testfile2.txt');

	// Delete file
	unlink('./testfile2.txt');

	echo 'The demo was done';

// EOF