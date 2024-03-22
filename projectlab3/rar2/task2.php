<?php
session_start();

// Перевіряємо, чи вже користувач авторизований
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Якщо користувач вже авторизований, виводимо привітання
    echo "Добрий день, {$_SESSION['username']}!<br>";
    echo '<a href="logout.php">Вийти</a>';
} else {
    // Якщо користувач не авторизований, виводимо форму авторизації
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Обробляємо дані з форми
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Перевіряємо, чи введені дані вірні
        if ($username === 'Admin' && $password === 'password') {
            // Якщо дані вірні, створюємо сесію для користувача
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "Добрий день, {$_SESSION['username']}!<br>";
            echo '<a href="logout.php">Вийти</a>';
        } else {
            // Якщо дані не вірні, виводимо повідомлення про помилку
            echo "Невірний логін або пароль.";
        }
    } else {
        // Виводимо форму авторизації
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Авторизація</title>
        </head>
        <body>
        <h2>Форма авторизації</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Логін:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Пароль:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Увійти">
        </form>
        </body>
        </html>
        <?php
    }
}
?>
