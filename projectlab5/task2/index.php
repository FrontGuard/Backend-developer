<?php
////try {
//////     Підключення до бази даних
////    $pdo = new PDO('mysql:host=localhost;dbname=labb5;charset=utf8', 'root', '');
////
//////     Встановлення режиму обробки виключень
////    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
////
//////     Додавання нового користувача з усіма правами
////    $sql = "CREATE USER 'homeuser'@'localhost' IDENTIFIED BY 'password';";
////    $pdo->exec($sql);
////    $sql = "GRANT ALL PRIVILEGES ON *.* TO 'homeuser'@'localhost';";
////    $pdo->exec($sql);
////
////    echo "Користувач homeuser успішно доданий з усіма правами.";
////} catch(PDOException $e) {
//////     Обробка виключень
////    echo "Помилка: " . $e->getMessage();
////}
//
//try {
//    $pdo = new PDO('mysql:host=localhost;dbname=labb5;charset=utf8', 'root', '');
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e) {
//    echo "Помилка підключення до бази даних: " . $e->getMessage();
//}
//
//// Додавання нової таблиці до бази даних
//try {
//    $sql = "CREATE TABLE IF NOT EXISTS tov (
//        id INT(11) AUTO_INCREMENT PRIMARY KEY,
//        name VARCHAR(255) NOT NULL
//    )";
//    $pdo->exec($sql);
//    echo "Таблиця 'tov' успішно створена або вже існує.";
//} catch (PDOException $e) {
//    echo "Помилка при створенні таблиці: " . $e->getMessage();
//}
//
//// Додавання 10 записів до таблиці tov
//try {
//    $products = [
//        "Книга",
//        "Мобільний телефон",
//        "Ноутбук",
//        "Футбольний м'яч",
//        "Кавоварка",
//        "Телевізор",
//        "Фітнес трекер",
//        "Стіл",
//        "Стілець",
//        "Ліжко"
//    ];
//
//    $sql = "INSERT INTO tov (name) VALUES (:name)";
//    $stmt = $pdo->prepare($sql);
//
//    foreach ($products as $product) {
//        $stmt->execute(['name' => $product]);
//    }
//
//    echo "Дані успішно додані до таблиці 'tov'.";
//} catch (PDOException $e) {
//    echo "Помилка при додаванні даних: " . $e->getMessage();
//}
//
//// Виведення всіх записів з таблиці tov
//try {
//    $sql = "SELECT * FROM tov";
//    $stmt = $pdo->query($sql);
//
//    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        echo "<p>" . $row['id'] . " | " . $row['name'] . "</p>";
//    }
//} catch (PDOException $e) {
//    echo "Помилка при вибірці даних: " . $e->getMessage();
//}
//?>
