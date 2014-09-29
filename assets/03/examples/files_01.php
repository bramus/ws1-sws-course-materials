<!DOCTYPE html>
<html>
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">


		<fieldset>

			<h2>Testform</h2>

			<dl class="clearfix">

				<dt><label for="image">Image</label></dt>
				<dd class="text"><input type="file" id="image" name="image" value="" class="input-text" /></dd>

				<dt class="full clearfix" id="lastrow">
					<input type="hidden" name="moduleAction" value="processUpload" />
					<input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
				</dt>

			</dl>

		</fieldset>

	</form>

	<div id="debug">
	    <h2>Contents of $_FILES</h2>
<?php

	/**
	 * Helper Functions
	 * ========================
	 */

	    /**
	     * Dumps a variable
	     * @param mixed $var
	     * @return
	     */
	    function dump($var) {
		    echo '<pre>';
		    var_dump($var);
		    echo '</pre>';
	    }


	/**
	 * Main Program Code
	 * ========================
	 */

	    // dump $_FILES
	    dump($_FILES);

?>
	</div>

</body>
</html>