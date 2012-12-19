<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// define if we are logged in or not
	$loggedIn = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;

	// already logged in!
	if ($loggedIn === true) {
		header('location: index.php');
		exit();
	}

	// var to tell if we have a login error
	$formError = false;

	// form submitted
	if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'login')) {

		// extract sent in username & password
		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? trim($_POST['password']) : '';

		// username & password are valid
		if (($username != '') && ($username === $password)) {

			// set loggedin state & username
			$_SESSION['loggedin'] = true;
			$_SESSION['name'] = $username;

			// redirect to index
			header('location: index.php');
			exit();

		}

		// username & password are not valid
		else {
			$formError = true;
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

		if ($formError === true) echo '<p class="error">Invalid login credentials</p>';

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