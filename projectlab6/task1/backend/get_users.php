<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab6";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

$sql = "SELECT username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo json_encode(array());
}

$conn->close();
?>
