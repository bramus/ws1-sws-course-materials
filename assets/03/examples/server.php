<!DOCTYPE html>
<html>
<head>
	<title>Process</title>
	<meta charset="UTF-8" />
</head>
<body>
<?php


	/**
	 * Helper Functions
	 * ========================
	 */

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


	/**
	 * Main Program Code
	 * ========================
	 */

		// dump $_SERVER
		echo '<h2>Contents of $_SERVER</h2>' . PHP_EOL;
		dump($_SERVER);

?>	
</body>
</html>