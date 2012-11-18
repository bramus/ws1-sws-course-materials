<?php

class Animal {

	private $name;

	public function __construct($name) {
		$this->name = $name;
	}

	final function getName() {
		echo $this->name;
	}

}

class Dog extends Animal {
	
	public function __construct($name) {
		echo 'Yo dawg!' . '<br />' . PHP_EOL;
		parent::__construct($name);
	}

}


$dog = new Dog('Sparky');
echo $dog->getName() . '<br />' . PHP_EOL;