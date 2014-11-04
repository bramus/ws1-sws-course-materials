<!DOCTYPE html>
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

	<h1>PizzaPalace (1/4)</h1>

	<p>Welcome to the PizzaPalace. Order your pizza now:</p>

	<form action="topping.php" method="post">
		<fieldset>
			<legend>Pizza style</legend>
			<label><input type="radio" name="style" value="normal">Normal</label>
			<label><input type="radio" name="style" value="calzone">Calzone</label>
			<label><input type="radio" name="style" value="deeppan">Deep Pan</label>
			<label><input type="submit" name="btnSubmit" value="Choose toppings &gt;" /></label>
		</fieldset>
	</form>

</body>
</html>