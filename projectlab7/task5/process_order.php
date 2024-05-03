<?php
session_start(); // Запускаємо сесію

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо дані з форми
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $product = $_POST['product'];

    // Зберігаємо дані у сесії
    $_SESSION['order_details'] = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'product' => $product
    ];

    // Встановлюємо статус-код 303
    http_response_code(303);

    // Перенаправлення користувача на сторінку підтвердження замовлення
    header("Location: confirmation.php");
    exit;
} else {
    // Якщо дані не відправлені методом POST, перенаправляємо користувача на сторінку з формою
    header("Location: index.html");
    exit;
}
?>
