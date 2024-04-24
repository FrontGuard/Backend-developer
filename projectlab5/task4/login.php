<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Увійти</title>
</head>
<body>
<h2>Форма входу</h2>
<form action="login_process.php" method="POST">
    <label for="username">Логін:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Увійти">
</form>

<p>Не маєте облікового запису? <a href="registration_form.php">Зареєструйтесь тут</a></p>
</body>
</html>
