<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// define if we are logged in or not
	$loggedIn = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;

	// extract the name (if logged in)
	if ($loggedIn) $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>My login protected site</title>

	<meta charset="iso-8859-15" />

	<style>
		.note {
			background: #FFFF99;
		}

		.active {
			font-weight: 700;
		}
	</style>

</head>
<body>

	<h1>My login protected site</h1>

	<ul>
	<?php if ($loggedIn === true) { ?>
		<li>You are logged in. Welcome, <?php echo htmlentities($name); ?> (<a href="logout.php">log out</a>)</li>
	<?php } else { ?>
		<li>You are not logged in. Please <a href="login.php" title="log in">log in</a></li>
	<?php } ?>
	</ul>

	<h2>Navigation</h2>
	<ul>
		<li><a href="index.php" class="active">Page 1</a></li>
		<li><a href="index2.php">Page 2</a></li>
		<li><a href="index3.php">Page 3</a></li>
	</ul>

</body>
</html>