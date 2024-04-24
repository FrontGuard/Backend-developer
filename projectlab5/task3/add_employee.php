<?php
// Підключення до бази даних
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Обробка додавання нового працівника
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->execute([$name, $position, $salary]);

    echo "Новий працівник успішно доданий!";
}
?>

<!-- HTML-форма для додавання нового працівника -->
<h2>Додати нового працівника</h2>
<form action="add_employee.php" method="post">
    Ім'я: <input type="text" name="name"><br>
    Посада: <input type="text" name="position"><br>
    Зарплата: <input type="text" name="salary"><br>
    <input type="submit" value="Додати працівника">
</form>
