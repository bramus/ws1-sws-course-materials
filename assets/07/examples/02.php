<?php

	// Include config
	require_once 'config.php';

	// Connect to database server "localhost" with username "root" and a faulty password
	$dbhandler = mysqli_connect(DB_HOST, DB_USER, 'wrongpass');

//EOF