<?php

	error_reporting(E_ALL); // set error reporting on

	$host = 'http://www.myhost.com/';

	function absUrl($relUrl) {
		global $host;
		return $host.$relUrl;
	}

	echo absUrl('files/uploads/me.jpg');