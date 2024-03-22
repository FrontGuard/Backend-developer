<?php
// Функція для отримання рядків з файлу і розділення їх на слова
function getWordsFromFile($filename) {
    $content = file_get_contents($filename);
    return explode(" ", $content);
}

// Функція для знаходження рядків, які зустрічаються тільки в одному файлі
function uniqueLines($file1, $file2) {
    $words1 = getWordsFromFile($file1);
    $words2 = getWordsFromFile($file2);

    $uniqueWords = array_diff($words1, $words2);

    return implode(" ", $uniqueWords);
}

// Функція для знаходження рядків, які зустрічаються в обох файлах
function commonLines($file1, $file2) {
    $words1 = getWordsFromFile($file1);
    $words2 = getWordsFromFile($file2);

    $commonWords = array_intersect($words1, $words2);

    return implode(" ", $commonWords);
}

// Функція для знаходження рядків, які зустрічаються в кожному файлі більше двох разів
function moreThanTwoOccurrences($file1, $file2) {
    $words1 = getWordsFromFile($file1);
    $words2 = getWordsFromFile($file2);

    $allWords = array_merge($words1, $words2);
    $wordCount = array_count_values($allWords);

    $resultWords = [];
    foreach ($wordCount as $word => $count) {
        if ($count > 2) {
            $resultWords[] = $word;
        }
    }

    return implode(" ", $resultWords);
}

// Перевірка існування переданих файлів
$file1 = "file1.txt";
$file2 = "file2.txt";
if (file_exists($file1) && file_exists($file2)) {
    // Створення нових файлів з відповідними рядками
    $uniqueFile = "unique.txt";
    $commonFile = "common.txt";
    $moreThanTwoFile = "more_than_two.txt";

    file_put_contents($uniqueFile, uniqueLines($file1, $file2));
    file_put_contents($commonFile, commonLines($file1, $file2));
    file_put_contents($moreThanTwoFile, moreThanTwoOccurrences($file1, $file2));

    echo "Файли успішно створені.";
} else {
    echo "Файли file1.txt або file2.txt не існують.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Головна сторінка</title>
</head>
<body>
<h2>Лабораторна робота №3</h2>
<p>Натисніть кнопку нижче, щоб перейти до форми видалення файлу:</p>
<a href="delete_file_form.php"><button>Перейти до форми видалення файлу</button></a>
</body>
</html>
