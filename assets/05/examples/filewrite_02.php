<?php

/**
 * Write data into a file
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

	file_put_contents(__DIR__ . '/testfile2.txt', 'hello!' . PHP_EOL, FILE_APPEND);

	echo 'The file contents were adjusted, check via Finder/explorer';

// EOF