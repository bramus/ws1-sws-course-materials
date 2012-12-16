<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// Best practice: unset all session vars before stopping the session
	foreach ($_SESSION as $key => $value) unset($_SESSION[$key]);
	
	// destroy the session
	session_destroy();

// EOF