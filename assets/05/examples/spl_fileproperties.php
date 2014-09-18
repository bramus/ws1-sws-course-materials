<?php

/**
 * Read file info
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	$filename = __DIR__ . '/testfile.txt';
	$fi = new SplFileInfo($filename);

	echo '<p>The file ' . $fi->getFileName() . ' was last modified on ' . date('Y-m-d H:i:s', $fi->getMTime()) . '</p>' . PHP_EOL;
	echo '<p>The file ' . $fi->getFileName() . ' is ' . ($fi->isDir() ? '' : 'not') . ' a directory</p>' . PHP_EOL;
	echo '<p>The file ' . $fi->getFileName() . ' is ' . ($fi->isFile() ? '' : 'not') . ' a file</p>' . PHP_EOL;
	echo '<p>The file ' . $fi->getFileName() . ' is ' . ($fi->isLink() ? '' : 'not') . ' a shortcut</p>' . PHP_EOL;

// EOF