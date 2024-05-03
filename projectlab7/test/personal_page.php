<?php
// Підключення файлу з функціями та з'єднанням з базою даних
require_once 'includes/functions.php';
require_once 'includes/db.php';

// Ініціалізація сесії
session_start();

// Перевірка, чи користувач авторизований
if (!isset($_SESSION['user_id'])) {
    // Якщо користувач не авторизований, перенаправлення на сторінку входу
    header("Location: login.php");
    exit;
}

// Отримання даних про користувача з бази даних за його ідентифікатором
$user_id = $_SESSION['user_id'];
$user = getUserById($user_id);

// Функція для отримання даних про користувача за його ідентифікатором
function getUserById($id) {
    // Підключення до бази даних
    require 'db.php';

    // Підготовка запиту для отримання даних про користувача за його ідентифікатором
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    return $user;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Особиста сторінка</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Вітаємо, <?php echo $user['username']; ?>!</h2>
    <p>Ось ваша особиста інформація:</p>
    <ul>
        <li><strong>Ім'я користувача:</strong> <?php echo $user['username']; ?></li>
        <li><strong>Електронна пошта:</strong> <?php echo $user['email']; ?></li>
        <!-- Додайте інші дані, якщо потрібно -->
    </ul>
    <a href="logout.php">Вийти</a>
</div>
</body>
</html>
