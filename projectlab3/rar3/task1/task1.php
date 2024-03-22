<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма коментарів</title>
</head>
<body>
<h2>Форма коментарів</h2>
<form action="process_comments.php" method="post">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="comment">Коментар:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br><br>
    <input type="submit" value="Надіслати">
</form>
</body>
</html>
