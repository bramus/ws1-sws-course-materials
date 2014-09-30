<!DOCTYPE html>
<html>
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

	<form action="form_process.php" method="get">


		<fieldset>

			<h2>Testform</h2>

			<dl class="clearfix">

				<dt><label for="field1">Field with name attribuut</label></dt>
				<dd class="text"><input type="text" id="field1" name="field1" value="" class="input-text" /></dd>

				<dt><label for="field2">Field without name attribuut</label></dt>
				<dd class="text"><input type="text" id="field2" name="" value="" class="input-text" /></dd>

				<dt class="full clearfix" id="lastrow">
					<input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
				</dt>

			</dl>

		</fieldset>

	</form>

</body>
</html>