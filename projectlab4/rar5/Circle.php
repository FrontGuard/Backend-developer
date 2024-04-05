<?php

class Circle {
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function getX() {
        return $this->x;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function getY() {
        return $this->y;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function __toString() {
        return "Коло з центром в ($this->x, $this->y) і радіусом $this->radius";
    }
}

// Створення об'єкта класу Circle і виклик методів для перевірки
$circle = new Circle(5, 5, 10);
echo $circle . "\n"; // Виведе: Коло з центром в (5, 5) і радіусом 10
echo "X: " . $circle->getX() . "\n"; // Виведе: X: 5
echo "Y: " . $circle->getY() . "\n"; // Виведе: Y: 5
echo "Radius: " . $circle->getRadius() . "\n"; // Виведе: Radius: 10

$circle->setX(10);
$circle->setY(15);
$circle->setRadius(20);

echo $circle . "\n"; // Виведе: Коло з центром в (10, 15) і радіусом 20
