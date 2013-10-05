<?php

/**
 * Write data into a file
 * @author Bramus Van Damme <bramus.vandamme@kahosl.be>
 */

	file_put_contents('./testfile2.txt', file_get_contents('./testfile2.txt') . 'hello!' . PHP_EOL);

	echo 'The file contents were adjusted, check via Finder/explorer';