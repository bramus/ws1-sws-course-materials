<?php

	/**
	 * Helper functions
	 */

		/**
		 * Guaranteed slashes (if magic_quotes is off, it adds the slashes)
		 *
		 * @param string $string The string to add the slashes to
		 * @return string
		 */
		function addPostSlashes($string) {
			return ((get_magic_quotes_gpc() == 1) || (get_magic_quotes_runtime() == 1)) ? $string : addslashes($string);
		}

		/**
		 * Guaranteed no slashes (if magic_quot	es is on, it strips the slashes)
		 *
		 * @param string $string The string to remove the slashes from
		 * @return string
		 */
		function stripPostSlashes($string) {
			return ((get_magic_quotes_gpc() == 1) || (get_magic_quotes_runtime() == 1)) ? stripslashes($string) : $string;
		}


	/**
	 * FORMCHECKING
	 */

		// initial values
		$msgName = '*';

		// form is sent
		if (isset($_POST['btnSubmit'])) {

			$allOk = true;

			// name not set, or empty
			if (!isset($_POST['name']) || ((string) $_POST['name'] === '')) {
				$msgName = 'Please enter your name';
				$allOk = false;
			}

			// end of form check. If $allOk still is true, then the form was sent in correctly
			if ($allOk === true) {
				header('location: formchecking_thanks.php?name=' . urlencode(stripPostSlashes($_POST['name'])));
			}

		}

?><<!DOCTYPE html>
<html>
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		<fieldset>

			<h2>Testform</h2>

			<dl class="clearfix">

				<dt><label for="name">Name</label></dt>
				<dd class="text">
					<input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlentities(stripPostSlashes($_POST['name'])) : '' ?>" class="input-text" />
					<span class="message error"><?php echo $msgName; ?></span>
				</dd>

				<dt class="full clearfix" id="lastrow">
					<input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
					<input type="submit" id="btnCancel" name="btnCancel" value="Cancel" />
				</dt>

			</dl>

		</fieldset>

	</form>

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

		// dump $_POST
		dump($_POST);

?>

	</div>

</body>
</html>