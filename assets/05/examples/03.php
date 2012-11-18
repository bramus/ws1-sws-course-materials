<?php

class Animal {

	private $name;

	public function __construct($name) {
		$this->name = $name;
	}

	protected function say($what) {
		return $what;
	}

}

class Dog extends Animal {
		
	public function bark() {
		echo $this->say('WOOF!');
	}

}

$dog = new Dog('Sparky');
$dog->bark();