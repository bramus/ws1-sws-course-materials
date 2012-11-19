<?php

	// Include config
	require_once 'config.php';

	// Connect to database server "localhost" with username "root" and password "Azerty123" + select the DB "fotofactory"
	$dbhandler = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME_FF) or die ('Could not connect to database server or access database');
		
	// If connection succeeded, we end up here. If not, the die() above gets interpreted
	echo 'Connected and selected the DB (in one go)';
	
	// ... your query magic here

//EOF