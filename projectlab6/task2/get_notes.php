<?php
// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notecom";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Getting notes from the database
$sql = "SELECT id, title, content FROM notes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='note' data-id='" . $row['id'] . "'>";
        echo "<h3 class='noteTitle'>" . $row['title'] . "</h3>";
        echo "<p class='noteContent'>" . $row['content'] . "</p>";
        // Add update button for each note
        echo "<button class='updateButton'>Update</button>";
        // Add delete button for each note
        echo "<button class='deleteButton' data-id='" . $row['id'] . "'>Delete</button>";
        echo "</div>";
    }
} else {
    echo "No notes available";
}

$conn->close();
?>
