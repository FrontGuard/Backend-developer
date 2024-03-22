<?php
// Перевірка, чи були передані дані POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Відкриття файлу для запису (якщо файл не існує, він буде створений)
    $file = fopen("comments.txt", "a");

    // Запис даних у файл
    fwrite($file, $name . "|" . $comment . "\n");

    // Закриття файлу
    fclose($file);
}

// Виведення поточних коментарів з файлу
if (file_exists("comments.txt")) {
    $file = fopen("comments.txt", "r");
    echo "<h2>Поточні коментарі:</h2>";
    echo "<table border='1'>";
    while (!feof($file)) {
        $line = fgets($file);
        if ($line != "") {
            list($name, $comment) = explode("|", $line);
            echo "<tr><td><b>$name:</b></td><td>$comment</td></tr>";
        }
    }
    echo "</table>";
    fclose($file);
} else {
    echo "<p>Поки що немає коментарів.</p>";
}
?>
