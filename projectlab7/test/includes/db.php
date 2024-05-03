<?php
// Параметри підключення до бази даних
$host = 'localhost';
$dbname = 'lab7';
$username = 'root';
$password = '';

// Спроба підключення до бази даних
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Встановлення режиму помилок та вивіду помилок PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // У разі невдачного підключення виводимо помилку
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
?>
