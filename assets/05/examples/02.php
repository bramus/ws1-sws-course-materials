<?php

class BasicClass {
	
	const CLASS_CONSTANT = 12.7;

	public function multiply($x) {
		return $x * self::CLASS_CONSTANT;
	}

}

echo BasicClass::CLASS_CONSTANT . '<br />' . PHP_EOL;

$inst = new BasicClass();
echo $inst->multiply(3) . '<br />' . PHP_EOL;