<?php

	// the form was sent, process it
	if (isset($_POST['btnSubmit'])) {

		// @TODO: insert PHP formchecking here!

		// set the cookie (expiration time within one week)
		setcookie('color', (string) $_POST['color'], time() + (24*60*60*7));

	}

	// define the color
	$color = (string) isset($_COOKIE['color']) ? $_COOKIE['color'] : '#FFFFFF';

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Color my site</title>

	<meta charset="iso-8859-15" />

	<style>
		body {
			background-color: <?php echo htmlentities($color); ?>;
		}
	</style>

	<script>
		var isColor = function(input) {
			var regexp = /^\#?[0-9A-F]{6}$/i;
			return regexp.test(input.toUpperCase());
		}

		window.addEventListener('load', function(e) {

			document.getElementsByTagName('input')[0].focus();

			document.forms[0].addEventListener('submit', function(e) {

				e.preventDefault();
				e.stopPropagation();

				var formValid = isColor(document.getElementById('color').value);

				if (!formValid) {
					alert('Please enter a hex-color, such as #123ABC');
					document.getElementById('color').select();
				} else {
					document.forms[0].submit();
				}

			});

		});
	</script>

</head>
<body>

	<h1>Color my site</h1>

	<p>Change the color of this page!</p>

	<form action="#" method="post">
		<fieldset>
			<input type="text" name="color" id="color" value="<?php echo htmlentities($color); ?>" maxlength="7" />
			<input type="submit" name="btnSubmit" value="Change color" />
		</fieldset>
	</form>

</body>
</html>