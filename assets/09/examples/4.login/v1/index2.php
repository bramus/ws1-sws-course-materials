<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// get user object from session
	$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>My login protected site</title>

	<meta charset="utf-8" />

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
	<?php if ($user) { ?>
		<li>You are logged in. Welcome, <?php echo htmlentities($user['username']); ?> (<a href="logout.php">log out</a>)</li>
	<?php } else { ?>
		<li>You are not logged in. Please <a href="login.php" title="log in">log in</a></li>
	<?php } ?>
	</ul>

	<h2>Navigation</h2>
	<ul>
		<li><a href="index.php">Page 1</a></li>
		<li><a href="index2.php" class="active">Page 2</a></li>
		<li><a href="index3.php">Page 3</a></li>
	</ul>

</body>
</html>