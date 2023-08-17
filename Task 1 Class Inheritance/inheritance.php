<?php

class Shape {
    protected $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function calculateArea() {
        // This method will be overridden by subclasses
    }
}

class Circle extends Shape {
    private $radius;
    
    public function __construct($name, $radius) {
        parent::__construct($name);
        $this->radius = $radius;
    }
    
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;
    
    public function __construct($name, $width, $height) {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }
    
    public function calculateArea() {
        return $this->width * $this->height;
    }
}

// Create instances of shapes
$circle = new Circle("Circle", 2);
$rectangle = new Rectangle("Rectangle", 4, 6);

// Calculate and display areas
echo $circle->getName() . " Area: " . $circle->calculateArea() . "\n";
echo $rectangle->getName() . " Area: " . $rectangle->calculateArea() . "\n";
