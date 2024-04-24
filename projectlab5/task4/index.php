<?php
session_start();

// Перевірка, чи користувач аутентифікований
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Якщо користувач не аутентифікований, перенаправлення на сторінку входу
    header("Location: login.php");
    exit;
}

// Підключення до бази даних
$mysqli = new mysqli("localhost", "username", "password", "labb5");

// Перевірка з'єднання
if ($mysqli->connect_error) {
    die("Помилка підключення до бази даних: " . $mysqli->connect_error);
}

$username = $_SESSION['username'];

// Отримання даних профілю користувача з бази даних
$query = "SELECT * FROM users WHERE username='$username'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $date_of_birth = $row['date_of_birth'];
    $gender = $row['gender'];
} else {
    echo "Помилка: користувач не знайдений.";
}

// Закриття з'єднання з базою даних
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна сторінка</title>
</head>
<body>
<h2>Вітаємо, <?php echo $first_name . " " . $last_name; ?>!</h2>
<p>Дані вашого профілю:</p>
<p>Ім'я: <?php echo $first_name; ?></p>
<p>Прізвище: <?php echo $last_name; ?></p>
<p>Дата народження: <?php echo $date_of_birth; ?></p>
<p>Стать: <?php echo $gender; ?></p>

<p><a href="edit_profile.php">Змінити дані профілю</a></p>
<p><a href="logout.php">Вийти</a></p>
</body>
</html>
