<?php

	// extract style & toppings from post
	$style = (string) isset($_POST['style']) ? $_POST['style'] : '';
	$toppings = (array) isset($_POST['toppings']) ? $_POST['toppings'] : array();

	// @TODO: insert PHP formchecking here!
		// style not empty and within range?
		// toppings not empty and within range?
		// referrer is topping.php?

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>PizzaPalace</title>

	<meta charset="utf-8" />

	<script>
		window.addEventListener('load', function(e) {

			document.getElementsByTagName('input')[0].focus();

			document.forms[0].addEventListener('submit', function(e) {

				e.preventDefault();
				e.stopPropagation();

				var formValid = (document.getElementById('name').value != '') && (document.getElementById('address').value != '');

				if (!formValid) {
					alert('Please enter your information');
					document.getElementsByTagName('input')[0].focus();
				} else {
					document.forms[0].submit();
				}

			});

		});
	</script>

</head>
<body>

	<h1>PizzaPalace (3/4)</h1>

	<p>You're about to order a <?php echo htmlentities($style); ?> with <?php echo implode(', ', $toppings); ?>.</p>
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
		<fieldset style="display: none">
			<input type="hidden" name="style" value="<?php echo htmlentities($style); ?>" />
			<input type="hidden" name="toppings" value="<?php echo htmlentities(implode(', ', $toppings)); ?>" />
		</fieldset>
	</form>

</body>
</html>