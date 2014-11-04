<?php

	// extract style from post
	$style = (string) isset($_POST['style']) ? $_POST['style'] : '';

	// @TODO: insert PHP formchecking here!
		// style not empty and within range?
		// referrer is index.php?

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

	<script>
		window.addEventListener('load', function(e) {

			document.getElementsByTagName('input')[0].focus();

			document.forms[0].addEventListener('submit', function(e) {

				e.preventDefault();
				e.stopPropagation();

				var formValid = document.getElementById('topping_cheese').checked || document.getElementById('topping_pepper').checked ||  document.getElementById('topping_onion').checked

				if (!formValid) {
					alert('Please choose at least one topping');
					document.getElementsByTagName('input')[0].focus();
				} else {
					document.forms[0].submit();
				}

			});

		});
	</script>

</head>
<body>

	<h1>PizzaPalace (2/4)</h1>

	<p>Choose the toppings for your <?php echo htmlentities($style); ?> Pizza:</p>

	<form action="overview.php" method="post">
		<fieldset>
			<legend>Toppings</legend>
			<label><input type="checkbox" name="toppings[]" value="cheese" id="topping_cheese">Cheese</label>
			<label><input type="checkbox" name="toppings[]" value="pepper" id="topping_pepper">Pepper</label>
			<label><input type="checkbox" name="toppings[]" value="onion" id="topping_onion">Onion</label>
			<label><input type="submit" name="btnSubmit" value="Review order &gt;" /></label>
		</fieldset>
		<fieldset style="display: none">
			<input type="hidden" name="style" value="<?php echo htmlentities($style); ?>" />
		</fieldset>
	</form>

</body>
</html>