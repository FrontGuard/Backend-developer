<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товари</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Товари</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Назва товару</th>
        <th>Ціна</th>
    </tr>
    <?php
    try {
        // Підключення до бази даних
        $pdo = new PDO('mysql:host=localhost;dbname=labb5;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Вибірка даних з таблиці tov
        $stmt = $pdo->query('SELECT * FROM tov');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "</tr>";
        }
    } catch(PDOException $e) {
        echo "Помилка: " . $e->getMessage();
    }
    ?>
</table>

<form action="insert.php" method="post">
    <input type="submit" value="Додати запис">
</form>

<form action="delete.php" method="post">
    <label for="record_id">Номер запису для видалення:</label>
    <input type="text" id="record_id" name="record_id">
    <input type="submit" value="Вилучити запис">
</form>

</body>
</html>
