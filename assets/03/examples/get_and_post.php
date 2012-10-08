<!DOCTYPE html>
<html>
<head>
	<title>Get and Post</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

	<form action="form_process.php?foo=getfoo&amp;bar=getbar" method="post">

		<fieldset>

			<h2>Get and Post</h2>

			<dl class="clearfix">

				<dt><label for="foo">Foo?</label></dt>
				<dd class="text"><input type="text" id="foo" name="foo" value="" class="input-text" /></dd>

				<dt><label for="baz">Baz?</label></dt>
				<dd class="text"><input type="text" id="baz" name="baz" value="" class="input-text" /></dd>

				<dt class="full clearfix" id="lastrow">
					<input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
				</dt>

			</dl>

		</fieldset>

	</form>

</body>
</html>