<?php

	// vars we'll need
	$type = isset($_GET['type']) ? $_GET['type'] : 'unknown';	$detail= isset($_GET['detail']) ? $_GET['detail'] : 'unknown';
	
	// decide what error message to show
	switch($type) {
		
		case 'db':
			switch ($detail) {

				case 'connect': 	
					$msgErr = 'Alas, it seems like our database server is overloaded and is not responding. Our team of administrators is on it.';
					break;

				case 'query':
					$msgErr = 'There was an error while processing your request. Please go back and retry.';
					break;

				default:
					$msgErr = 'Alas, there was an error communicating with our database server.; Please retry';
			}	
			break;
			
		default:
			$msgErr = 'An unknown error occured whilst processing your request.';

	}

?><!DOCTYPE html>
<html>
	<head>
		<title>Now this is embarrassing!</title>
		<link rel="stylesheet" media="screen" href="/path/to/my/fancy/stylesheet.css" />
	</head>
	<body>
		<h1><a href="#" title="My Website">My website</a></h1>
		<h2>Now this is embarrassing!</h2>
		<?php
			echo '<p>' . $msgErr . '</p>';
		?>
	</body>
</html>