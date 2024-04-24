<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація користувача</title>
</head>
<body>
<h2>Форма реєстрації</h2>
<form action="registration_process.php" method="POST">
    <label for="username">Логін:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <label for="first_name">Ім'я:</label><br>
    <input type="text" id="first_name" name="first_name"><br><br>

    <label for="last_name">Прізвище:</label><br>
    <input type="text" id="last_name" name="last_name"><br><br>

    <label for="date_of_birth">Дата народження:</label><br>
    <input type="date" id="date_of_birth" name="date_of_birth"><br><br>

    <label for="gender">Стать:</label><br>
    <select id="gender" name="gender">
        <option value="Male">Чоловік</option>
        <option value="Female">Жінка</option>
        <option value="Other">Інше</option>
    </select><br><br>

    <input type="submit" value="Зареєструватися">
</form>

<p>Вже зареєстровані? <a href="login.php">Увійдіть тут</a></p>
</body>
</html>
