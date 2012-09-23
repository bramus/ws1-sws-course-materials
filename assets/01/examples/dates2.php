<?php
	// Assuming today is March 10th, 2001, 5:16:18 pm, and that we are in the
	// Mountain Standard Time (MST) Time Zone
	date_default_timezone_set('America/Phoenix'); // = MST
	$today = mktime(17,16,18,3,10,2001);

	echo date('F j, Y, g:i a', $today) . '<br />'; // March 10, 2001, 5:16 pm
	echo date('m.d.y', $today) . '<br />'; // 03.10.01
	echo date('j, n, Y', $today) . '<br />'; // 10, 3, 2001
	echo date('Ymd', $today) . '<br />'; // 20010310
	echo date('h-i-s, j-m-y, it is', $today) . '<br />'; // 05-16-18, 10-03-01, 1631 1618
	echo date('\i\t \i\s \t\h\e jS \d\a\y.', $today) . '<br />'; // it is the 10th day.
	echo date('D M j G:i:s T Y', $today) . '<br />'; // Sat Mar 10 17:16:18 MST 2001
	echo date('H:m:s \m \i\s\ \m\o\n\t\h', $today) . '<br />'; // 17:03:18 m is month
	echo date('H:i:s', $today) . '<br />'; // 17:16:18