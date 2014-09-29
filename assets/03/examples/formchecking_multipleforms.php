<?php

	/**
	 * Main Code
	 */

		// initial values
		$name = isset($_POST['name']) ? (string) $_POST['name'] : '';
		$age = isset($_POST['age']) ? (string) $_POST['age'] : '';
		$moduleAction = isset($_POST['moduleAction']) ? (string) $_POST['moduleAction'] : '';
		$msgName = '*';
		$msgAge = '*';

		// form is sent: perform formchecking!
		if ($moduleAction == 'processName') {

			$allOk = true;

			// name not empty
			if (trim($name) == '') {
				$msgName = 'Please enter your name';
				$allOk = false;
			}

			// end of form check. If $allOk still is true, then the form was sent in correctly
			if ($allOk === true) {
				header('Location: formchecking_thanks.php?name=' . urlencode($name));
			}

		}

		// form is sent: perform formchecking!
		if ($moduleAction == 'processAge') {

			$allOk = true;

			// age not empty
			if ((trim($age) == '') || ((int) $age == 0)) {
				$msgAge = 'Please enter your age';
				$allOk = false;
			}

			// end of form check. If $allOk still is true, then the form was sent in correctly
			if ($allOk === true) {
				header('Location: formchecking_thanks.php?age=' . urlencode($age));
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

			<h2>Testform #1</h2>

			<dl class="clearfix">

				<dt><label for="name">Name</label></dt>
				<dd class="text">
					<input type="text" id="name" name="name" value="<?php echo htmlentities($name); ?>" class="input-text" />
					<span class="message error"><?php echo $msgName; ?></span>
				</dd>

				<dt class="full clearfix" id="lastrow">
					<input type="hidden" name="moduleAction" value="processName" />
					<input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
				</dt>

			</dl>

		</fieldset>

	</form>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		<fieldset>

			<h2>Testform #2</h2>

			<dl class="clearfix">

				<dt><label for="name">Age</label></dt>
				<dd class="text">
					<input type="number" id="age" name="age" value="<?php echo htmlentities($age); ?>" class="input-text" />
					<span class="message error"><?php echo $msgAge; ?></span>
				</dd>

				<dt class="full clearfix" id="lastrow">
					<input type="hidden" name="moduleAction" value="processAge" />
					<input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
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