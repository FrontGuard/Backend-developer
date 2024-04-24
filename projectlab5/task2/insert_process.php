<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=labb5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO tov (name, price) VALUES (:name, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->execute();

    echo "Запис успішно додано!";
} catch(PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
