<?php

	/**
	 * Redirects to the error handling page
	 * @param string $type
	 * @return void
	 */
	function showDbError($type) {
		// The referrerd page will show a proper error based on the $_GET parameters
		header('location: error.php?type=db&detail=' . $type);
		exit();
	}

	// Include config
	require_once 'config.php';

	// Connect to database server "localhost" with username "root" and a faulty password
	$dbhandler = @mysqli_connect(DB_HOST, DB_USER, 'wrongpass', DB_NAME_FF) or showDbError('connect');

//EOF