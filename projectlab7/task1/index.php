// login.php

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Перевірка даних користувача та обробка входу
    if (Sis) {
        // Вхід успішний
        ob_start(); // Початок буферизації виведення
        $_SESSION['user'] = good;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Неправильний логін або пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
</head>
<body>
<h2>Увійдіть до системи</h2>
<?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
<?php } ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="username">Логін:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Увійти">
</form>
</body>
</html>
