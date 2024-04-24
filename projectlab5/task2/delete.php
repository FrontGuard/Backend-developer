<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вилучити запис</title>
</head>
<body>
<h2>Вилучити запис</h2>
<form action="delete_process.php" method="post">
    <label for="record_id">Підтвердіть ID запису для видалення:</label>
    <input type="text" id="record_id" name="record_id"><br><br>
    <input type="submit" value="Вилучити запис">
</form>
</body>
</html>
