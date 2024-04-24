<?php
session_start();

// Перевірка, чи користувач аутентифікований
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Якщо користувач не аутентифікований, перенаправлення на сторінку входу
    header("Location: login.php");
    exit;
}

// Підключення до бази даних
$mysqli = new mysqli("localhost", "root", "", "labb5");

// Перевірка з'єднання
if ($mysqli->connect_error) {
    die("Помилка підключення до бази даних: " . $mysqli->connect_error);
}

$username = $_SESSION['username'];

// Отримання даних профілю користувача з бази даних
$query = "SELECT * FROM users WHERE username='$username'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $date_of_birth = $row['date_of_birth'];
    $gender = $row['gender'];
} else {
    echo "Помилка: користувач не знайдений.";
}

// Закриття з'єднання з базою даних
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування профілю</title>
</head>
<body>
<h2>Редагування профілю</h2>
<form action="update_profile.php" method="POST">
    <label for="first_name">Ім'я:</label><br>
    <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>"><br><br>

    <label for="last_name">Прізвище:</label><br>
    <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>"><br><br>

    <label for="date_of_birth">Дата народження:</label><br>
    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>"><br><br>

    <label for="gender">Стать:</label><br>
    <select id="gender" name="gender">
        <option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Чоловік</option>
        <option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Жінка</option>
        <option value="Other" <?php if ($gender === 'Other') echo 'selected'; ?>>Інше</option>
    </select><br><br>

    <input type="submit" value="Зберегти зміни">
</form>
</body>
</html>
