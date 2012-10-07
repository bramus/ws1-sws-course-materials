<?php

	$gun = 'smith&wesson';
	header('Location: redirect_process.php?gun=' . $gun);
	exit(0); // do not forget to exit after redirect

//EOF