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
	
	// Connect to database server "localhost" with username "root" and password "Azerty123" + select the DB "status"
	$dbhandler = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME_STATUS) or showDbError('connect');
	
	// Variables
	$name = 'bramus';
	$status = 'Just received the trophy "Marksman of the year"';
	$datetime = time();

	// @note: Also possible: $datetime = date('Y-m-d H:i:s'); + in that case don't use FROM_UNIXTIME() in query
	
	// A simple insert
	$query 	= 'INSERT INTO statuses (name, status, datum) '
			. 'VALUES ('
				. '"' . 	mysqli_real_escape_string($dbhandler, (string) $name) . '", '
				. '"' . 	mysqli_real_escape_string($dbhandler, (string) $status) . '", '
	    			. 'FROM_UNIXTIME(' . mysqli_real_escape_string($dbhandler, (int) $datetime) . ')'
			.')';
	
	// Insert it
	@mysqli_query($dbhandler, $query) or showDbError('query');
	
	// A select
	$query = 'SELECT * FROM statuses WHERE name = "' . mysqli_real_escape_string($dbhandler, (string) $name) . '"' .
			' AND datum <= FROM_UNIXTIME(' . mysqli_real_escape_string($dbhandler, (int) $datetime) . ') ORDER BY id DESC';
	
	// Execute Query
	$result = @mysqli_query($dbhandler, $query) or showDbError('query');
	
	// Process result
	if ($result !== false) { // Yes, we have one or more rows returned
		
		echo '<p>Got ' . mysqli_num_rows($result) . ' rows returned from query:</p>';
		
		echo '<dl>';
		
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<dt>' . $row['id'] . ' - ' . $row['name'] . ' - ' . date('d/m/Y H:i:s', strtotime($row['datum'])) . '</dt><dd>' . $row['status'] . '</dd>';
		}
		
		echo '</dl>';
		
	}
	
	// Close connection
	@mysqli_close($dbhandler);

//EOF