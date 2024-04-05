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

    private function distance($x1, $y1, $x2, $y2) {
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }

    public function intersects(Circle $otherCircle) {
        $distance = $this->distance($this->x, $this->y, $otherCircle->getX(), $otherCircle->getY());
        return $distance < ($this->radius + $otherCircle->getRadius());
    }
}

// Створення об'єктів кол та перевірка їх перетину
$circle1 = new Circle(5, 5, 10);
$circle2 = new Circle(-5, -5, 1);

echo $circle1->intersects($circle2) ? "Кола перетинаються\n" : "Кола не перетинаються\n"; // Виведе: Кола перетинаються
