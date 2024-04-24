<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notecom";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Deleting the note from the database
    $id = $data['id'];
    $sql = "DELETE FROM notes WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Note deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
