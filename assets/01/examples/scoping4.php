<?php

	error_reporting(E_ALL); // set error reporting on

	function absUrl($relUrl, $host = 'http://www.myhost.com/') {
		return $host.$relUrl;
	}

	echo absUrl('files/uploads/me.jpg');