<?php

	// Include config
	require_once 'config.php';

	// Connect to database server "localhost" with username "root" and password "Azerty123"
	$dbhandler = @mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die ('Could not connect to database server');
		
	// If connection succeeded, we end up here. If not, the die() above gets interpreted
	echo 'Connected';
	
	// Select database "fotofactory"
	@mysqli_select_db($dbhandler, DB_NAME_FF) or die ('Could not select database');
	
	echo ' and selected the DB';
	
	// ... your query magic here

//EOF