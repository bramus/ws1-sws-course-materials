<?php

	if (php_sapi_name() != 'cli') exit('Please run this file from the CLI');

	/**
	 * Cross-platform input on the command line
	 *
	 * @param string $question The question to ask
	 *
	 * @return string
	 */
	function getInput($question = '') {
		if (!function_exists('readline')) {
			echo $question . ' ';
			return stream_get_line(STDIN, 1024, PHP_EOL);
		} else {
			return readline($question . ' ');
		}
	}

	$name = getInput('What is your name?');
	$city = getInput('Where do you live?');
	echo 'Hello ' . $name . ' from ' . $city . PHP_EOL;