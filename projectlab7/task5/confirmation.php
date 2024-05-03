<?php
session_start(); // Починаємо сесію

// Перевіряємо, чи є дані у сесії
if(isset($_SESSION['order_details'])) {
    $order_details = $_SESSION['order_details'];
} else {
    // Якщо даних немає, перенаправляємо користувача на сторінку з формою
    header("Location: order.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Підтвердження замовлення</title>
</head>
<body>
<h2>Підтвердження замовлення</h2>
<p>Ваше замовлення успішно оформлено! Дякуємо за покупку.</p>

<h3>Деталі замовлення:</h3>
<ul>
    <li><strong>Ім'я:</strong> <?php echo $order_details['name']; ?></li>
    <li><strong>Email:</strong> <?php echo $order_details['email']; ?></li>
    <li><strong>Адреса доставки:</strong> <?php echo $order_details['address']; ?></li>
    <li><strong>Товар:</strong> <?php echo $order_details['product']; ?></li>
</ul>
</body>
</html>
