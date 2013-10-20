<?php

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

?><!doctype html>
<html>
<head>
  <title><?php echo htmlentities($title); ?></title>
</head>
<body>
  Hi there <?php echo htmlentities($userName); ?>, the weather today is <?php echo htmlentities($weatherToday); ?>.
</body>
</html>