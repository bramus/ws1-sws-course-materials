<?php

	// @TODO

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>PizzaPalace</title>

	<meta charset="utf-8" />

	<style>
		label {
			display: block;
			height: 24px;
			line-height: 24px;
		}
	</style>

</head>
<body>

	<h1>PizzaPalace (2/4)</h1>

	<p>Choose the toppings for your {$type} Pizza:</p>

	<form action="overview.php" method="post">
		<fieldset>
			<legend>Toppings</legend>
			<label><input type="checkbox" name="toppings[]" value="cheese">Cheese</label>
			<label><input type="checkbox" name="toppings[]" value="pepper">Pepper</label>
			<label><input type="checkbox" name="toppings[]" value="onion">Onion</label>
			<label><input type="submit" name="btnSubmit" value="Review order &gt;" /></label>
		</fieldset>
	</form>

</body>
</html>