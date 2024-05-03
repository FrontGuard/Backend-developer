<?php
// Підключення до бази даних
$servername = "localhost"; // Адреса сервера бази даних
$username = "root"; // Ім'я користувача бази даних
$password = ""; // Пароль користувача бази даних
$dbname = "lab7"; // Назва бази даних

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Отримання даних з форми
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Вставка даних в базу даних
$sql = "INSERT INTO task4 (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    // Успішна реєстрація, перенаправлення користувача
    header("Location: personal_page.php"); // Замініть "personal_page.php" на URL вашої особистої сторінки

    // Встановлення HTTP-заголовків для запобігання кешування
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Проістек час.

    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
