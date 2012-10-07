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
			print_r($var);
			echo '</pre>';
		}


	/**
	 * Main Program Code
	 * ========================
	 */

		// dump $_GET
		echo '<h2>Contents of $_GET</h2>' . PHP_EOL;
		dump($_GET);
		echo PHP_EOL . '<hr />' . PHP_EOL . PHP_EOL;

		
		// dump $_POST
		echo '<h2>Contents of $_POST</h2>' . PHP_EOL;
		dump($_POST);
		echo PHP_EOL . '<hr />' . PHP_EOL . PHP_EOL;


		// dump $_REQUEST
		echo '<h2>Contents of $_REQUEST <small>(Do no ever use this!)</small></h2>' . PHP_EOL;
		dump($_REQUEST);
		echo PHP_EOL . '<hr />' . PHP_EOL;

?>	
</body>
</html>