<?php
// Підключення до бази даних
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Запит для вибірки всіх записів з таблиці "employees"
$stmt = $pdo->query('SELECT * FROM employees');

// Виведення результатів у вигляді HTML-таблиці
echo "<h2>Список працівників</h2>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Ім'я</th>
<th>Посада</th>
<th>Зарплата</th>
</tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['position'] . "</td>";
    echo "<td>" . $row['salary'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
