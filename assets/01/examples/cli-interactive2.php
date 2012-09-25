<?php
	
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
	$city = getInput('Where to you live?');
	echo 'Hello ' . $name . ' from ' . $city . PHP_EOL;