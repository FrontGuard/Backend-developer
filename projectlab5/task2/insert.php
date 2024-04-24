<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати запис</title>
</head>
<body>
<h2>Додати новий запис</h2>
<form action="insert_process.php" method="post">
    <label for="name">name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="price">price:</label>
    <input type="text" id="price" name="price"><br><br>
    <input type="submit" value="Додати запис">
</form>
</body>
</html>
