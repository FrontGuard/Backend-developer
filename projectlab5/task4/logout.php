<?php
session_start();

// Знищення усіх даних сесії
session_unset();

// Знищення сесії
session_destroy();

// Перенаправлення на головну сторінку або іншу потрібну
header("Location: index.php");
exit;
?>
