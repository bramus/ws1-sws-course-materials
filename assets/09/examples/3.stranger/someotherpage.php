<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// get the name from the session
	$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'stranger';

	// output the name
	echo 'Hello ' . $name; // outputs "Hello Bramus!" if somepage.php has been visited before

// EOF