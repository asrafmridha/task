<?php

class Animal
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function makeSound(){}
}

class Dog extends Animal
{
    public function makeSound()
    {
        return "Ghew! Ghew!";
    }
}

class Cat extends Animal
{
    public function makeSound()
    {
        return "Meow!";
    }
}

class Cow extends Animal
{
    public function makeSound()
    {
        return "Hamba!";
    }
}

// Creating instances
$dog = new Dog("Lemon");
$cat = new Cat("Pishu");
$cow = new Cow("Lalu");

$animals = [$dog, $cat, $cow];

foreach ($animals as $animal) {
    echo $animal->name . " makes sound: " . $animal->makeSound() . "\n";
}
