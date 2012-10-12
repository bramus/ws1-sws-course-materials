<?php

	/**
	 * Helper functions
	 */

		/**
		 * Disable php's magic quotes (yuck!)
		 *
		 * @return	void
		 */
		function disableMagicQuotes() {
			$_POST 		= array_map('stripPostSlashes', $_POST);
			$_GET		= array_map('stripPostSlashes', $_GET);
			$_COOKIE 	= array_map('stripPostSlashes', $_COOKIE);
			$_REQUEST 	= array_map('stripPostSlashes', $_REQUEST);
		}

		/**
		 * Guaranteed no slashes (if magic_quot	es is on, it strips the slashes)
		 *
		 * @param string $string The string to remove the slashes from
		 * @return string
		 */
		function stripPostSlashes($string) {
			return (get_magic_quotes_gpc() || get_magic_quotes_runtime()) ? stripslashes($string) : $string;
		}


	/**
	 * Main code
	 */

		// Disable Magic Quotes
		disableMagicQuotes();

		// Get default values
		$name = isset($_GET['name']) ? (string) $_GET['name'] : '';
		$pass = isset($_GET['pass']) ? (string) $_GET['pass'] : '';
		$gender = isset($_GET['gender']) ? (string) $_GET['gender'] : '';
		$cont = isset($_GET['cont']) ? (int) $_GET['cont'] : 0;
		$meals = isset($_GET['meals']) ? (array) $_GET['meals'] : array();
		$remark = isset($_GET['remark']) ? (string) $_GET['remark'] : '';


?><!DOCTYPE html>
<html>
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

		<fieldset>

			<h2>Testform</h2>

			<dl class="clearfix">

				<dt><label for="name">Name</label></dt>
				<dd class="text"><input type="text" id="name" name="name" value="<?php echo htmlentities($name); ?>" class="input-text" /></dd>

				<dt><label for="pass">Password</label></dt>
				<dd class="text"><input type="password" id="pass" name="pass" value="<?php echo htmlentities($pass); ?>" class="input-text" /></dd>

				<dt><label>Gender</label></dt>
				<dd>
					<label for="gender_male"><input type="radio" class="option" name="gender" id="gender_male" value="male"<?php if ($gender == 'male') { echo ' checked="checked"'; } ?> />Male</label>
					<label for="gender_female"><input type="radio" class="option" name="gender" id="gender_female" value="female"<?php if ($gender == 'female') { echo ' checked="checked"'; } ?> />Female</label>
				</dd>

				<dt><label for="cont">Continent</label></dt>
				<dd>
					<select name="cont" id="cont">
						<option value="0"<?php if ($cont === 0) { echo ' selected="selected"'; } ?>>Please select...</option>
						<option value="1"<?php if ($cont === 1) { echo ' selected="selected"'; } ?>>Africa</option>
						<option value="2"<?php if ($cont === 2) { echo ' selected="selected"'; } ?>>America</option>
						<option value="3"<?php if ($cont === 3) { echo ' selected="selected"'; } ?>>Antarctica</option>
						<option value="4"<?php if ($cont === 4) { echo ' selected="selected"'; } ?>>Asia</option>
						<option value="5"<?php if ($cont === 5) { echo ' selected="selected"'; } ?>>Europe</option>
						<option value="6"<?php if ($cont === 6) { echo ' selected="selected"'; } ?>>Oceania</option>
					</select>
				</dd>

				<dt><label>Meals</label></dt>
				<dd>
					<label for="meal0"><input type="checkbox" class="option" name="meals[]" id="meal0" value="breakfast"<?php if (in_array('breakfast', $meals)) { echo ' checked="checked"'; } ?> />breakfast</label>
					<label for="meal1"><input type="checkbox" class="option" name="meals[]" id="meal1" value="lunch"<?php if (in_array('lunch', $meals)) { echo ' checked="checked"'; } ?> />lunch</label>
					<label for="meal2"><input type="checkbox" class="option" name="meals[]" id="meal2" value="dinner"<?php if (in_array('dinner', $meals)) { echo ' checked="checked"'; } ?> />dinner</label>
				</dd>

				<dt><label for="remark">Remark</label></dt>
				<dd class="text"><textarea name="remark" id="remark" rows="5" cols="40"><?php echo htmlentities($remark); ?></textarea></dd>

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

		// dump $_GET
		dump($_GET);

?>
		
	</div>

</body>
</html>