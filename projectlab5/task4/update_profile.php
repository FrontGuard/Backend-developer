<?php
session_start();

// Перевірка, чи користувач аутентифікований
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Якщо користувач не аутентифікований, перенаправлення на сторінку входу
    header("Location: login.php");
    exit;
}

// Підключення до бази даних
$mysqli = new mysqli("localhost", "root", "", "labb5");

// Перевірка з'єднання
if ($mysqli->connect_error) {
    die("Помилка підключення до бази даних: " . $mysqli->connect_error);
}

$username = $_SESSION['username'];

// Отримання даних з форми редагування профілю
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];

// Оновлення даних профілю користувача в базі даних
$query = "UPDATE users SET first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', gender='$gender' WHERE username='$username'";

if ($mysqli->query($query) === TRUE) {
    // Виведення повідомлення про успішне оновлення
    echo "Дані профілю успішно оновлені.";
} else {
    echo "Помилка при оновленні даних профілю: " . $mysqli->error;
}

// Закриття з'єднання з базою даних
$mysqli->close();

// Перенаправлення на сторінку профілю користувача
header("Location: profile.php");
exit;
?>
