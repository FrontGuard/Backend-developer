<?php

class Human {
    private $height;
    private $weight;
    private $age;

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
}

class Student extends Human {
    private $university;
    private $course;

    public function getUniversity() {
        return $this->university;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function moveNextCourse() {
        $this->course++;
    }
}

class Programmer extends Human {
    private $programmingLanguages = [];
    private $experience;

    public function getProgrammingLanguages() {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages($programmingLanguages) {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function addProgrammingLanguage($language) {
        $this->programmingLanguages[] = $language;
    }
}

// Перевірка роботи класів
$student = new Student();
$student->setHeight(170);
$student->setWeight(65);
$student->setAge(20);
$student->setUniversity("Example University");
$student->setCourse(2);

echo "Студент: Зріст - " . $student->getHeight() . ", Маса - " . $student->getWeight() . ", Вік - " . $student->getAge() . "\n";
echo "Університет: " . $student->getUniversity() . ", Курс: " . $student->getCourse() . "\n";

$student->moveNextCourse();
echo "Студент після переведення на наступний курс: Курс - " . $student->getCourse() . "\n";

$programmer = new Programmer();
$programmer->setHeight(180);
$programmer->setWeight(70);
$programmer->setAge(25);
$programmer->setExperience("5 years");
$programmer->addProgrammingLanguage("PHP");
$programmer->addProgrammingLanguage("JavaScript");

echo "Програміст: Зріст - " . $programmer->getHeight() . ", Маса - " . $programmer->getWeight() . ", Вік - " . $programmer->getAge() . "\n";
echo "Досвід роботи: " . $programmer->getExperience() . "\n";
echo "Мови програмування: " . implode(", ", $programmer->getProgrammingLanguages()) . "\n";

$programmer->addProgrammingLanguage("Python");
echo "Програміст після додавання нової мови програмування: " . implode(", ", $programmer->getProgrammingLanguages()) . "\n";
?>
