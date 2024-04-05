<?php

interface HouseCleaning {
    public function cleanRoom();
    public function cleanKitchen();
}

abstract class Human implements HouseCleaning {
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

    public function cleanRoom() {
        echo "Студент прибирає кімнату\n";
    }

    public function cleanKitchen() {
        echo "Студент прибирає кухню\n";
    }
}

class Programmer extends Human {
    public function birthMessage() {
        echo "Програміст: Вітаємо з народженням дитини!\n";
    }

    public function cleanRoom() {
        echo "Програміст прибирає кімнату\n";
    }

    public function cleanKitchen() {
        echo "Програміст прибирає кухню\n";
    }
}

// Перевірка роботи методів
$student = new Student();
$student->cleanRoom(); // Виведе: Студент прибирає кімнату
$student->cleanKitchen(); // Виведе: Студент прибирає кухню

$programmer = new Programmer();
$programmer->cleanRoom(); // Виведе: Програміст прибирає кімнату
$programmer->cleanKitchen(); // Виведе: Програміст прибирає кухню
?>
