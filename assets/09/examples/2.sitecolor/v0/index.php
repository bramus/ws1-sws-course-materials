<?php

	// @TODO - make this dynamic!
	$color = '#FFFFFF';

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Color my site</title>

	<meta charset="utf-8" />

	<style>
		body {
			background-color: <?php echo htmlentities($color); ?>;
		}
	</style>

</head>
<body>

	<h1>Color my site</h1>

	<p>Change the color of this page!</p>

	<form action="#" method="post">
		<fieldset>
			<input type="text" name="color" id="color" value="<?php echo htmlentities($color); ?>" />
			<input type="submit" name="btnSubmit" value="Change color" />
		</fieldset>
	</form>

</body>
</html>