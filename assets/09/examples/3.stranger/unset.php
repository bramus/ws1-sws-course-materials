<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// unset the name var from the session
	unset($_SESSION['name']);

// EOF