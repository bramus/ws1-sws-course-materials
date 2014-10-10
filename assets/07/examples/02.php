<?php

	// Include config
	require_once 'config.php';

	// Make Connection
	$db = new PDO('mysql:host=' . DB_HOST .';dbname=does_not_exist;charset=utf8mb4', DB_USER, DB_PASS);

	echo 'Connected to the database';

	// ... your query magic here

//EOF