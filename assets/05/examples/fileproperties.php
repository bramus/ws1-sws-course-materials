<?php

/**
 * Read file info
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	$filename = __DIR__ . '/testfile.txt';

	echo '<p>The file ' . $filename . (file_exists($filename) ? 'exists' : 'does not exist') . '</p>' . PHP_EOL;
	echo '<p>The file ' . $filename . ' was last modified on ' . date('Y-m-d H:i:s', filemtime($filename)) . '</p>' . PHP_EOL;
	echo '<p>The file ' . $filename . ' is ' . (is_dir($filename) ? '' : 'not') . ' a directory</p>' . PHP_EOL;
	echo '<p>The file ' . $filename . ' is ' . (is_file($filename) ? '' : 'not') . ' a file</p>' . PHP_EOL;
	echo '<p>The file ' . $filename . ' is ' . (is_link($filename) ? '' : 'not') . ' a shortcut</p>' . PHP_EOL;

// EOF