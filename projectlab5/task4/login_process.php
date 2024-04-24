<?php
session_start();

// Підключення до бази даних
$mysqli = new mysqli("localhost", "root", "", "labb5");

// Перевірка з'єднання
if ($mysqli->connect_error) {
    die("Помилка підключення до бази даних: " . $mysqli->connect_error);
}

// Отримання даних з форми входу
$username = $_POST['username'];
$password = $_POST['password'];

// Перевірка чи існує користувач з введеним логіном та паролем
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    // Користувач аутентифікований, створюємо сесію
    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $username;

    // Перенаправлення на сторінку редагування профілю
    header("Location: edit_profile.php");
    exit;
} else {
    echo "Неправильний логін або пароль.";
}

// Закриття з'єднання з базою даних
$mysqli->close();
?>
