<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=labb5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $record_id = $_POST['record_id'];

    $sql = "DELETE FROM tov WHERE id = :record_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':record_id', $record_id, PDO::PARAM_INT);
    $stmt->execute();

    echo "Запис успішно видалено!";
} catch(PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
