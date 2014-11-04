<?php

	// @TODO

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
		<li>You are not logged in. Please <a href="login.php" title="log in">log in</a></li>
		<li>You are logged in. Welcome, {$user} (<a href="logout.php">log out</a>)</li>
	</ul>

	<p class="note">Note: only one of the two messages above will be shown</p>

	<h2>Navigation</h2>
	<ul>
		<li><a href="index.php">Page 1</a></li>
		<li><a href="index2.php">Page 2</a></li>
		<li><a href="index3.php" class="active">Page 3</a></li>
	</ul>

</body>
</html>