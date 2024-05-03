<?php
session_start();

// Перевірка, чи користувач авторизований
if (!isset($_SESSION['user_id'])) {
    // Якщо не авторизований, перенаправити на сторінку входу або виконати інші дії
    header("Location: login.php");
    exit();
}

// Підключення до бази даних
$conn = mysqli_connect("localhost", "root", "", "lab7");

// Перевірка підключення до бази даних
if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

// Обробка даних з форми коментаря
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Перевірка, чи існує ключ "comment" у масиві $_POST
    if(isset($_POST['comment'])) {
        $comment = $_POST['comment'];

        // Отримання user_id з сесії
        $user_id = $_SESSION['user_id'];

        // Збереження коментаря разом з user_id у базу даних
        $sql = "INSERT INTO posts (user_id, comment) VALUES ('$user_id', '$comment')";
        if (mysqli_query($conn, $sql)) {
            echo "Коментар успішно додано";
        } else {
            echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Поле коментаря не було відправлене.";
    }
}

mysqli_close($conn);
?>
