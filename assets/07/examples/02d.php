<?php

	/**
	 * Redirects to the error handling page
	 * @param string $type
	 * @return void
	 */
	function showDbError($type, $msg) {

		// Log it (for the developer)
		file_put_contents(__DIR__ . '/error_log', PHP_EOL . (new DateTime())->format('Y-m-d H:i:s') . ' : ' . $msg, FILE_APPEND);

		// Redirect to nice error page (for the visitor)
		header('location: error.php?type=db&detail=' . $type);
		exit();

	}

	// Include config
	require_once 'config.php';

	// Make Connection
	try {
		$db = new PDO('mysql:host=' . DB_HOST .';dbname=does_not_exist;charset=utf8', DB_USER, DB_PASS);
	} catch (Exception $e) {
		showDbError('connect', $e->getMessage());
	}

	echo 'Connected to the database';

	// ... your query magic here

//EOF