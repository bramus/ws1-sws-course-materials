<?php

/**
 * Basic file upload example
 * @author Bramus Van Damme <bramus.vandamme@kahosl.be>
 */

	// a file was uploaded
	if (isset($_FILES['avatar'])) {

		// get file info
		echo '<p>Uploaded file: ' . $_FILES['avatar']['name'] . '</p>' . PHP_EOL;
		echo '<p>Temp location: ' . $_FILES['avatar']['tmp_name'] . '</p>' . PHP_EOL;
		echo '<p>Size: ' . $_FILES['avatar']['size'] . '</p>' . PHP_EOL;

		// check file extension
		if (!in_array((new SplFileInfo($_FILES['avatar']['name']))->getExtension(), array('jpeg', 'jpg', 'png', 'gif'))) {
			exit('<p>Invalid file extension. Only .jpeg, .jpg, .png or .gif allowed</p>');
		}

		// store file in this folder
		@move_uploaded_file(
			$_FILES['avatar']['tmp_name'],
			__DIR__ . DIRECTORY_SEPARATOR . $_FILES['avatar']['name']
		) or die('<p>Error while saving file in the uploads folder</p>');

		// show image
		echo '<p><img src=' . $_FILES['avatar']['name'] . ' alt="" /><p>';
	}

?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" >
	<label for="avatar">Avatar: </label>
	<input type="file" name="avatar" id="avatar" /><br />
	<input type="submit" />
</form>