<?php
	$args = getopt('ab:c::'); 
	# nothing = don't accept any value (why? WHYYYY?)
	# trailing : = required
	# trailing :: = optional
	var_dump($args);