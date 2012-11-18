<?php

class BasicClass {

	private $var1;
	protected $var2;
	public $var3;

	public function __construct($var) {
		$this->var1 = $var;
		$this->var2 = $var;
		$this->var3 = $var;
	}
	
	public function doubleVar3() {
		$this->var3 = $this->var3 . ' ' . $this->var3;
	}

	public function getVar1() {
		return $this->var1;
	}

}

$inst = new BasicClass('foo');
echo $inst->getVar1() . '<br />' . PHP_EOL;
$inst->doubleVar3();
echo $inst->var3;