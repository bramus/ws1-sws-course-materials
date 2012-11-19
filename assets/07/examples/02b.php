<?php

	// Include config
	require_once 'config.php';

	// Connect to database server "localhost" with username "root" and a faulty password + select the DB "fotofactory"
	$dbhandler = @mysqli_connect(DB_HOST, DB_USER, 'wrongpass', DB_NAME_FF) or die ('Could not connect to database server or access database');

//EOF