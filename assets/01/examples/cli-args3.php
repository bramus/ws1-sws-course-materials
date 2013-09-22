<?php

	if (php_sapi_name() != 'cli') exit('Please run this file from the CLI');

	$args = getopt('', array('a', 'b:', 'c::'));
	# nothing = don't accept any value (why? WHYYYY?)
	# trailing : = required
	# trailing :: = optional
	var_dump($args);