<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Підключення до бази даних
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notecom";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Отримання даних для оновлення
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $title = $data['title'];
    $content = $data['content'];

    // Оновлення замітки в базі даних
    $sql = "UPDATE notes SET title='$title', content='$content' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Note updated successfully";
    } else {
        echo "Error updating note: " . $conn->error;
    }

    $conn->close();
}
?>
