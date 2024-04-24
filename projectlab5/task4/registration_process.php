<?php
// Підключення до бази даних
$mysqli = new mysqli("localhost", "root", "", "labb5");

// Перевірка з'єднання
if ($mysqli->connect_error) {
    die("Помилка підключення до бази даних: " . $mysqli->connect_error);
}

// Отримання даних з форми реєстрації
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];

// Перевірка чи користувач з таким логіном або email вже існує
$query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "Користувач з таким логіном або email вже існує.";
} else {
    // Додавання нового користувача до бази даних
    $query = "INSERT INTO users (username, email, password, first_name, last_name, date_of_birth, gender) 
              VALUES ('$username', '$email', '$password', '$first_name', '$last_name', '$date_of_birth', '$gender')";

    if ($mysqli->query($query) === TRUE) {
        echo "Користувач успішно зареєстрований.";
    } else {
        echo "Помилка при реєстрації користувача: " . $mysqli->error;
    }
}

// Закриття з'єднання з базою даних
$mysqli->close();
header("Location: login.php");
exit; // Після перенаправлення необхідно вийти з поточного скрипту
?>
