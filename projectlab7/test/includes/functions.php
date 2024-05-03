<?php
// Функція для перевірки входу користувача
function login($username, $password) {
    // Підключення до бази даних
    require 'db.php';

    // Підготовка запиту для отримання користувача за іменем користувача та паролем
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    return $user;
}
?>
