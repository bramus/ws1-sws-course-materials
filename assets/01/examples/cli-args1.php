<?php
	echo 'Number of arguments ' . $argc . PHP_EOL;
	foreach ($argv as $key => $value) {
		echo 'Argument #' . $key . ' : ' . $value . PHP_EOL;
	}