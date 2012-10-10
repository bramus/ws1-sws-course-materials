<?php

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
				header('Location: formchecking_thanks.php?name=' . urlencode($_POST['name']));
			}

		}

?><!DOCTYPE html>
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
					<input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlentities($_POST['name']) : '' ?>" class="input-text" />
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