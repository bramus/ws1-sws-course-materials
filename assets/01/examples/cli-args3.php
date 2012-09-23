<?php
	$args = getopt('', array('a', 'b:', 'c::'));
	# nothing = don't accept any value (why? WHYYYY?)
	# trailing : = required
	# trailing :: = optional
	var_dump($args);