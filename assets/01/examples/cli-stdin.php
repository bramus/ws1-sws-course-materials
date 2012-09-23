<?php
	while(!feof(STDIN)) {
		$line = trim(fgets(STDIN));
		if(strlen($line) > 0) {
			echo strrev($line).PHP_EOL;
		}
	}