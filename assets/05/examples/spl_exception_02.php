<?php

	try {
		$di = new DirectoryIterator('/this/path/does/not/exist');
	} catch (Exception $e) {
		echo 'There was an error: <br />' . $e->getMessage();
	}

// EOF