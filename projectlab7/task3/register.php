<?php
// Підключення до бази даних
$conn = mysqli_connect("localhost", "root", "", "lab7");

// Перевірка підключення до бази даних
if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

// Обробка даних форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Вставка нового користувача в базу даних
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        // Успішна реєстрація, перенаправлення на note.html
        header("Location: note.html");
        exit(); // Важливо викликати exit(), щоб пересилати коректно
    } else {
        echo "Помилка: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
