<?php
// Підключення до бази даних
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Обробка редагування існуючого працівника
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("UPDATE employees SET name=?, position=?, salary=? WHERE id=?");
    $stmt->execute([$name, $position, $salary, $id]);

    echo "Інформація про працівника оновлена!";
}
?>

<!-- HTML-форма для редагування працівника -->
<h2>Редагувати існуючого працівника</h2>
<form action="edit_employee.php" method="post">
    ID запису для редагування: <input type="text" name="id"><br>
    Нове ім'я: <input type="text" name="name"><br>
    Нова посада: <input type="text" name="position"><br>
    Нова зарплата: <input type="text" name="salary"><br>
    <input type="submit" value="Зберегти зміни">
</form>
