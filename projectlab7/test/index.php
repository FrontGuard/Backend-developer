<?php
// Підключення файлу з функціями та з'єднанням з базою даних
require_once 'includes/functions.php';
require_once 'includes/db.php';

// Ініціалізація сесії
session_start();

// Перевірка, чи користувач вже авторизований, якщо так, перенаправлення на особисту сторінку
if (isset($_SESSION['user_id'])) {
    header("Location: personal_page.php");
    exit;
}

// Обробка форми входу
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Перевірка, чи існує користувач з введеним іменем користувача та паролем
    $user = login($username, $password);

    if ($user) {
        // Успішний вхід, збереження ідентифікатора користувача в сесії
        $_SESSION['user_id'] = $user['id'];
        // Перенаправлення на особисту сторінку
        header("Location: personal_page.php");
        exit;
    } else {
        // Неуспішний вхід, виведення повідомлення про помилку
        $error_message = "Неправильне ім'я користувача або пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Увійти</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Увійти</h2>
    <?php if (isset($error_message)) { ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php } ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="username">Ім'я користувача:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Увійти</button>
    </form>
</div>
</body>
</html>
