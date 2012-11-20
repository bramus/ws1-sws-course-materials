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
	$query 	= @mysqli_prepare($dbhandler, 'INSERT INTO statuses (name, status, datum) VALUES (?, ?, FROM_UNIXTIME(?))');
	@mysqli_stmt_bind_param($query, 'ssi', $name, $status, $datetime);

	// Insert it and close the statement
	@mysqli_stmt_execute($query) or showDbError('query');
	@mysqli_stmt_close($query);
					
	// A select
	$query 	= @mysqli_prepare($dbhandler, 'SELECT * FROM statuses WHERE name = ? AND datum <= FROM_UNIXTIME(?) ORDER BY id DESC');
	@mysqli_stmt_bind_param($query, 'si', $name, $datetime);
	
	// Run the query and bind the results
	@mysqli_stmt_execute($query) or showDbError('query');
	@mysqli_stmt_bind_result($query, $r_id, $r_name, $r_status, $r_datum);
	@mysqli_stmt_store_result($query);
	
	// Process result
	if (@mysqli_stmt_num_rows($query) > 0) { // Yes, we have one or more rows returned
		
		echo '<p>Got ' . mysqli_stmt_num_rows($query) . ' rows returned from query:</p>';
		
		echo '<dl>';
		
		while ($row = mysqli_stmt_fetch($query)) {
			echo '<dt>' . $r_id . ' - ' . $r_name . ' - ' . date('d/m/Y H:i:s', strtotime($r_datum)) . '</dt><dd>' . $r_status . '</dd>';
		}
		
		echo '</dl>';
		
	}
	
	// Close select statement
	@mysqli_stmt_close($query);
	
	// Close connection
	@mysqli_close($dbhandler);

//EOF