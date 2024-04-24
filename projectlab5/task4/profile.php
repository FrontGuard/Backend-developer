<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль користувача</title>
</head>
<body>
<h2>Профіль користувача</h2>
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

// Запит до бази даних для отримання інформації про користувача
$query = "SELECT * FROM users WHERE username='$username'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $date_of_birth = $row['date_of_birth'];
    $gender = $row['gender'];

    // Виведення інформації про користувача
    echo "<p>Ім'я: $first_name</p>";
    echo "<p>Прізвище: $last_name</p>";
    echo "<p>Дата народження: $date_of_birth</p>";
    echo "<p>Стать: $gender</p>";
} else {
    echo "Помилка: користувач не знайдений.";
}

// Закриття з'єднання з базою даних
$mysqli->close();
?>

<form action="edit_profile.php">
    <input type="submit" value="Редагувати акаунт">
</form>

<form action="logout.php">
    <input type="submit" value="Вийти з акаунту">
</form>

<form action="delete_profile.php" method="POST">
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Видалити акаунт">
</form>
</body>
</html>
