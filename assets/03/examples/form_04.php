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

				<dt><label for="field1">Disabled field</label></dt>
				<dd class="text"><input type="text" id="field1" name="field1" value="disabled" class="input-text" disabled="disabled" /></dd>

				<dt class="full clearfix" id="lastrow">
					<input type="submit" id="btnSubmit1" name="btnSubmit1" value="Send1" />
					<input type="submit" id="btnSubmit2" name="btnSubmit2" value="Send2" />
					<input type="submit" id="btnSubmit3" name="btnSubmit3" value="Send3" />
				</dt>

			</dl>

		</fieldset>

	</form>

</body>
</html>