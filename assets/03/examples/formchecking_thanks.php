<?php

	/**
	 * Guaranteed slashes (if magic_quotes is off, it adds the slashes)
	 *
	 * @param string $string The string to add the slashes to
	 * @return string
	 */
	function addPostSlashes($string) {
		if ((get_magic_quotes_gpc()==1) || (get_magic_quotes_runtime()==1))
			return $string;
		else return addslashes($string);
	}

	/**
	 * Guaranteed no slashes (if magic_quotes is on, it strips the slashes)
	 *
	 * @param string $string The string to remove the slashes from
	 * @return string
	 */
	function stripPostSlashes($string) {
		if ((get_magic_quotes_gpc()==1) || (get_magic_quotes_runtime()==1))
			return stripslashes($string);
		else return $string;
	}

?><!DOCTYPE html>
<html>
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

<?php

	// Name completed
	if (isset($_GET['name'])) {
		echo '<p>Hello ' . htmlentities(stripPostSlashes($_GET['name'])). '</p>';
	}

	// Age completed
	else if (isset($_GET['age'])) {
		echo '<p>Hello, ' . htmlentities(stripPostSlashes($_GET['age'])). ' year old stranger</p>';
	}

	// Name not completed
	else {
		echo '<p>Hello, stranger</p>';
	}

?>

	<div id="debug">

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

		// dump $_GET
		dump($_GET);

?>

	</div>

</body>
</html>