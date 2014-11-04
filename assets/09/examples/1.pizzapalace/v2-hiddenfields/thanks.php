<?php

	// extract style & toppings & name from post
	$style = (string) isset($_POST['style']) ? $_POST['style'] : '';
	$toppings = (string) isset($_POST['toppings']) ? $_POST['toppings'] : array();
	$name = (string) isset($_POST['name']) ? $_POST['name'] : '';
	$address = (string) isset($_POST['address']) ? $_POST['address'] : '';

	// @TODO: insert PHP formchecking here!
		// style not empty and within range?
		// toppings not empty and within range?
		// name not empty?
		// address not empty?
		// referrer is overview.php?

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>PizzaPalace</title>

	<meta charset="utf-8" />

</head>
<body>

	<h1>PizzaPalace (4/4)</h1>

	<p>Thank you <?php echo htmlentities($name); ?> for ordering a <?php echo htmlentities($style); ?> pizza with <?php echo $toppings; ?>.</p>
	<p>Your pizza will be delivered soon.</p>

	<p><a href="index.php" title="Order a new pizza">&larr; Order a new pizza</a></p>

</body>
</html>