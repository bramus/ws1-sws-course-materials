<?php

	error_reporting(E_ALL); // set error reporting on

	define('HOST', 'http://www.myhost.com/');

	function absUrl($relUrl) {
		return HOST . $relUrl;
	}

	echo absUrl('files/uploads/me.jpg');