// dashboard.php

<?php
session_start();

// Перевірка, чи відбувся вхід користувача
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Виведення особистої інформації користувача
echo "<h2>Ласкаво просимо, " . $_SESSION['user']['username'] . "!</h2>";

// Виведення збережених повідомлень (використання збережених даних)
echo "<h3>Збережені повідомлення:</h3>";
echo ob_get_contents(); // Виведення збережених даних
ob_end_clean(); // Очищення буфера виведення
?>
