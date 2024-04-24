<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if title and content are not empty
    if (empty($_POST['title']) || empty($_POST['content'])) {
        http_response_code(400); // Bad Request
        echo "Please fill out both title and content fields.";
        exit();
    }

    // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notecom";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Getting data from the form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Inserting data into the database
    $sql = "INSERT INTO notes (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Note added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
