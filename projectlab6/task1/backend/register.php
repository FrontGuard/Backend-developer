<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab6";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// Отримання даних з POST-запиту
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$email = $data['email'];
$password = $data['password'];

// Додавання користувача до бази даних
$sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array('message' => 'Користувача успішно зареєстровано.'));
} else {
    echo json_encode(array('message' => 'Помилка при реєстрації користувача: ' . $conn->error));
}

$conn->close();
?>
