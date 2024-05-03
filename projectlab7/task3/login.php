<?php
// Перевірка наявності сесії користувача
session_start();
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_session'])) {
    // Встановлення сесії за допомогою ідентифікатора з куки
    session_id($_COOKIE['user_session']);
    session_start();
}

// Перевірка наявності сесії користувача
if (isset($_SESSION['user_id'])) {
    // Якщо користувач вже авторизований, перенаправлення на сторінку блогу
    header("Location: blog.php");
    exit();
}

// Підключення до бази даних
$conn = mysqli_connect("localhost", "root", "", "lab7");

// Перевірка підключення до бази даних
if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

// Обробка даних форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Запит до бази даних для перевірки наявності користувача з введеною електронною поштою та паролем
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Авторизація успішна, зберігаємо ідентифікатор користувача у сесії
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];

        // Збереження ідентифікатора сесії у куці
        setcookie("user_session", session_id(), time() + (86400 * 30), "/"); // Кука дійсна на 30 днів

        // Перенаправлення на сторінку блогу
        header("Location: blog.php");
        exit();
    } else {
        echo "Неправильна електронна пошта або пароль";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід</title>
</head>
<body>
<h2>Вхід</h2>
<form action="" method="post">
    <label for="email">Електронна пошта:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Увійти">
</form>
</body>
</html>
