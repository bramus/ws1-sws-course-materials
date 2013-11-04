<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// already logged in!
	if (isset($_SESSION['user'])) {
		header('location: index.php');
		exit();
	}

	// var to tell if we have a login error
	$formErrors = array();

	// form submitted
	if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'login')) {

		// extract sent in username & password
		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? trim($_POST['password']) : '';

		// username & password are valid
		// @note: this will most likely be the result of a query
		if (($username != '') && ($username === $password)) {

			// store user (usually returned from database) in session
			$_SESSION['user'] = array(
				'username' => $username
			);

			// redirect to index
			header('location: index.php');
			exit();

		}

		// username & password are not valid
		else {
			$formErrors[] = 'Invalid login credentials';
		}

	}

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>My login protected site</title>

	<meta charset="iso-8859-15" />

	<style>
		.note {
			background: #FFFF99;
		}

		.error {
			background: #FF9999;
		}
	</style>

	<script>
		window.addEventListener('load', function(e) {

			document.getElementsByTagName('input')[0].focus();

			document.forms[0].addEventListener('submit', function(e) {

				e.preventDefault();
				e.stopPropagation();

				var formValid = (document.getElementById('username').value != '') && (document.getElementById('password').value != '');

				if (!formValid) {
					alert('Please enter your login credentials');
					document.getElementsByTagName('input')[0].focus();
				} else {
					document.forms[0].submit();
				}

			});

		});
	</script>

</head>
<body>

	<h1>My login protected site</h1>

	<?php

		if (sizeof($formErrors) > 0) {
			echo '<p>Error while logging in:</p>';
			echo '<ul>' . PHP_EOL;
			foreach ($formErrors as $error) {
				echo '<li>' . $error . '</li>';
			}
			echo '</ul>' . PHP_EOL;
		}

	?>

	<form action="login.php" method="post">
		<fieldset>
			<legend>Please log in</legend>
			<dl>
				<dt><label for="username">Username</label></dt>
				<dd><input type="text" name="username" id="username" value="" /></dd>
				<dt><label for="password">Password</label></dt>
				<dd><input type="password" name="password" id="password" value="" /></dd>
			</dl>
			<input type="hidden" name="moduleAction" id="moduleAction" value="login" />
			<input type="submit" name="btnSubmit" value="Log in &gt;" />
		</fieldset>
	</form>

	<p class="note">Use the same username and password to log in. Any username and password can be used.</p>

</body>
</html>