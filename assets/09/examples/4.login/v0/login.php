<?php

	// @TODO

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>My login protected site</title>

	<meta charset="utf-8" />

	<style>
		.note {
			background: #FFFF99;
		}
	</style>

</head>
<body>

	<h1>My login protected site</h1>

	<form action="index.php" method="post">
		<fieldset>
			<legend>Please log in</legend>
			<dl>
				<dt><label for="username">Username</label></dt>
				<dd><input type="text" name="username" id="username" value="" /></dd>
				<dt><label for="password">Password</label></dt>
				<dd><input type="password" name="password" id="password" value="" /></dd>
			</dl>
			<label><input type="submit" name="btnSubmit" value="Log in &gt;" /></label>
		</fieldset>
	</form>

	<p class="note">Use the same username and password to log in. Any username and password can be used.</p>

</body>
</html>