<?php
// Підключення до бази даних
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Запит для виведення середньої зарплати всіх працівників
$stmt = $pdo->query('SELECT AVG(salary) AS avg_salary FROM employees');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Середня зарплата всіх працівників: " . $row['avg_salary'];

// Запит для виведення кількості працівників на кожній посаді
$stmt = $pdo->query('SELECT position, COUNT(*) AS count FROM employees GROUP BY position');
echo "<h2>Статистика по посадах</h2>";
echo "<table border='1'>
<tr>
<th>Посада</th>
<th>Кількість працівників</th>
</tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['position'] . "</td>";
    echo "<td>" . $row['count'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
