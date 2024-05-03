<?php
session_start();

// Перевірка наявності повідомлень у сесії
if (isset($_SESSION['messages'])) {
    echo "<h1>Ваші повідомлення:</h1>";
    foreach ($_SESSION['messages'] as $message) {
        echo "<p>$message</p>";
    }
    // Очищення масиву повідомлень після їх виведення
    unset($_SESSION['messages']);
} else {
    echo "<p>Немає нових повідомлень.</p>";
}
?>
