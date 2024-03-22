<?php
if (isset($_GET['fontsize'])) {
    $fontsize = $_GET['fontsize'];

    setcookie('fontsize', $fontsize, time() + 3600, '/');
} elseif (isset($_COOKIE['fontsize'])) {
    $fontsize = $_COOKIE['fontsize'];
} else {
    $fontsize = 'medium';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Size Selector</title>
</head>
<body style="font-size: <?php echo $fontsize; ?>">
<h1>Font Size Selector</h1>
<p>Select a font size:</p>
<ul>
    <li><a href="?fontsize=large">Large Font</a></li>
    <li><a href="?fontsize=medium">Medium Font</a></li>
    <li><a href="?fontsize=small">Small Font</a></li>
</ul>
</body>
</html>
