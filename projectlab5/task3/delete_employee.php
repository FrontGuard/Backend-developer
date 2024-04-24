<?php
// Підключення до бази даних
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Обробка видалення працівника
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM employees WHERE id=?");
    $stmt->execute([$id]);

    echo "Працівник видалений!";
}
?>

<!-- HTML-форма для видалення працівника -->
<h2>Видалити працівника</h2>
<form action="delete_employee.php" method="post">
    ID запису для видалення: <input type="text" name="id"><br>
    <input type="submit" value="Видалити працівника">
</form>
