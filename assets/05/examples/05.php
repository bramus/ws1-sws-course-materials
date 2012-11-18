<?php

abstract class Animal {

	private $name;

	public function __construct($name) {
		$this->name = $name;
	}

	abstract public function doTrick();

}

class Dog extends Animal {
	
	private $tricks = array('jump', 'lay down', 'roll over', 'play dead');
	
	public function doTrick() {
		return $this->tricks[rand(0, sizeof($this->tricks) - 1)];
	}

}


$dog = new Dog('Sparky');
echo $dog->doTrick();