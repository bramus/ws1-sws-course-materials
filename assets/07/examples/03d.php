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
	
	// Connect to database server "localhost" with username "root" and password "Azerty123" + select the DB "fotofactory"
	$dbhandler = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME_FF) or showDbError('connect');
	
	// A simple select
	$query = 'SELECT id, name FROM collections WHERE user_id = 2';
	
	// Execute query
	$result = @mysqli_query($dbhandler, $query) or showDbError('query');
	
	// Process result
	if ($result !== false) { // Yes, we have one or more rows returned
		
		echo '<p>Got ' . mysqli_num_rows($result) . ' rows returned from query:</p>';
		
		while ($row = mysqli_fetch_object($result)) {
			echo '<p>' . $row->id . '-' . $row->name . '</p>'; // Outputs <p>id - name</p>
		}
		
	}
	
	// Close connection
	@mysqli_close($dbhandler);

//EOF