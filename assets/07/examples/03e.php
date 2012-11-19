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
	// A simple update (also usable for DELETE amongst others)
	$query = 'UPDATE collections SET user_id = ROUND(RAND()*10) WHERE id != 2';
	
	// Execute query
	$result = @mysqli_query($dbhandler, $query) or showDbError('query');
	
	// Process result
	if ($result !== false) { // Yes, the query succeeded
		
		echo '<p>' . mysqli_affected_rows($dbhandler) . ' were affected by the query</p>';
		
	}
	
	// Close connection
	@mysqli_close($dbhandler);

//EOF