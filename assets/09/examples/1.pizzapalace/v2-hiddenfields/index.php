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

	<script>
		window.addEventListener('load', function(e) {

			document.getElementsByTagName('input')[0].focus();

			document.forms[0].addEventListener('submit', function(e) {

				e.preventDefault();
				e.stopPropagation();

				var formValid = document.getElementById('style_normal').checked || document.getElementById('style_calzone').checked ||  document.getElementById('style_deeppan').checked

				if (!formValid) {
					alert('Please choose a pizza style');
					document.getElementsByTagName('input')[0].focus();
				} else {
					document.forms[0].submit();
				}

			});

		});
	</script>

</head>
<body>

	<h1>PizzaPalace (1/4)</h1>

	<p>Welcome to the PizzaPalace. Order your pizza now:</p>

	<form action="topping.php" method="post">
		<fieldset>
			<legend>Pizza style</legend>
			<label><input type="radio" name="style" value="normal" id="style_normal">Normal</label>
			<label><input type="radio" name="style" value="calzone" id="style_calzone">Calzone</label>
			<label><input type="radio" name="style" value="deeppan" id="style_deeppan">Deep Pan</label>
			<label><input type="submit" name="btnSubmit" value="Choose toppings &gt;" /></label>
		</fieldset>
	</form>

</body>
</html>