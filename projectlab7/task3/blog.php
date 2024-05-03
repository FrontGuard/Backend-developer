<?php
// Перевірка наявності сесії користувача
session_start();
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_session'])) {
    // Встановлення сесії за допомогою ідентифікатора з куки
    session_id($_COOKIE['user_session']);
    session_start();
}

// Перевірка наявності сесії користувача
if (!isset($_SESSION['user_id'])) {
    // Якщо користувач не авторизований, перенаправлення на сторінку входу
    header("Location: login.php");
    exit(); // Важливо викликати exit(), щоб пересилати коректно
}

// Підключення до бази даних
$conn = mysqli_connect("localhost", "root", "", "lab7");

// Перевірка підключення до бази даних
if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

// Витягуємо всі записи з бази даних
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Відображення записів
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['comment'] . "</p>";
        echo "<p>Автор: User ID " . $row['user_id'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "Поки що немає записів.";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
</head>
<body>
<h1>Блог</h1>
<!-- Кнопка для переходу на note.html -->
<button onclick="window.location.href='note.html'">Перейти до записів</button>
</body>
</html>
