<?php

	/**
	 * Dumps a variable
	 * @param mixed $var
	 * @return
	 */
	function dump($var) {
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}

	dump($_SERVER);