<?php

class BasicClass {
	
	const CLASS_CONSTANT = 12.7;
	
	public static function staticFunction($ohai) {
		echo $ohai;
	}

	public function multiply($x) {
		return $x * self::CLASS_CONSTANT;
	}

}

$inst = new BasicClass('foo');
echo $inst->multiply(3) . '<br />' . PHP_EOL;
echo BasicClass::CLASS_CONSTANT . '<br />' . PHP_EOL;
BasicClass::staticFunction('O Hi');