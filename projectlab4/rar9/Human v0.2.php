<?php

abstract class Human {
    private $height;
    private $weight;
    private $age;

    public abstract function birthMessage();

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function birthChild() {
        $this->birthMessage();
    }
}

class Student extends Human {
    public function birthMessage() {
        echo "Студент: Вітаємо з народженням дитини!\n";
    }
}

class Programmer extends Human {
    public function birthMessage() {
        echo "Програміст: Вітаємо з народженням дитини!\n";
    }
}

// Перевірка роботи методів
$student = new Student();
$student->birthChild(); // Виведе: Студент: Вітаємо з народженням дитини!

$programmer = new Programmer();
$programmer->birthChild(); // Виведе: Програміст: Вітаємо з народженням дитини!
?>
