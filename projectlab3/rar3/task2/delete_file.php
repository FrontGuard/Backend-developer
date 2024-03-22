<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];

    if (file_exists($filename)) {
        unlink($filename);
        echo "Файл $filename успішно видалений.";
    } else {
        echo "Файл $filename не існує.";
    }
}
?>
