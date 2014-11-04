<?php

	// @TODO

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>PizzaPalace</title>

	<meta charset="utf-8" />

</head>
<body>

	<h1>PizzaPalace (3/4)</h1>

	<p>You're about to order a {$style} with {$toppings}.</p>
	<p>Please fill in the form below to confirm and place your order</p>

	<form action="thanks.php" method="post">
		<fieldset>
			<legend>Your information</legend>
			<dl>
				<dt><label for="name">Name</label></dt>
				<dd><input type="text" name="name" id="name" value="" /></dd>
				<dt><label for="address">Address</label></dt>
				<dd><input type="text" name="address" id="address" value="" /></dd>
			</dl>
			<label><input type="submit" name="btnSubmit" value="Place order &gt;" /></label>
		</fieldset>
	</form>

</body>
</html>