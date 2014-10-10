<?php

	/**
	 * Redirects to the error handling page
	 * @param string $type
	 * @return void
	 */
	function showDbError($type, $msg) {
		file_put_contents(__DIR__ . '/error_log_mysql', PHP_EOL . (new DateTime())->format('Y-m-d H:i:s') . ' : ' . $msg, FILE_APPEND);
		header('location: error.php?type=db&detail=' . $type);
		exit();
	}

	// Include config
	require_once 'config.php';

	// Make Connection
	try {
		$db = new PDO('mysql:host=' . DB_HOST .';dbname=' . DB_NAME_FF . ';charset=utf8mb4', DB_USER, DB_PASS);
	} catch (Exception $e) {
		showDbError('connect', $e->getMessage());
	}

	$stmt = $db->query('SELECT * FROM collections WHERE user_id = 2');
	var_dump($stmt);

	// Handle result here ....

//EOF