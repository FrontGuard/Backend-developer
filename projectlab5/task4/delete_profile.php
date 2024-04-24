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

// Видалення профілю користувача з бази даних
$query = "DELETE FROM users WHERE username='$username'";

if ($mysqli->query($query) === TRUE) {
    // Якщо видалення успішне, знищення сесії та перенаправлення на головну сторінку
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
} else {
    echo "Помилка при видаленні профілю: " . $mysqli->error;
}

// Закриття з'єднання з базою даних
$mysqli->close();
?>
