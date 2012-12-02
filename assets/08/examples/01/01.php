<?php

	// define our vars (fixed or via calculations)
	$title = 'testpage';
	$userName = 'bramus';
	$weatherToday = 'cloudy';

?><html>
<head>
  <title><?php echo $title; ?></title>
</head>
<body>
  Hi there <?php echo $userName; ?>, the weather today is <?php echo $weatherToday; ?>.
</body>
</html>