<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// unset all session vars
	foreach ($_SESSION as $key => $v) unset($_SESSION[$key]);

	// destroy the session
	session_destroy();

	// redirect to index
	header('location: index.php');
	exit();

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>My login protected site</title>

	<meta charset="iso-8859-15" />

	<style>
		.note {
			background: #FFFF99;
		}
	</style>

</head>
<body>

	<h1>My login protected site</h1>

	<p>You are now logged out. <a href="index.php" title="Back to index">Back to index</a></p>

</body>
</html>