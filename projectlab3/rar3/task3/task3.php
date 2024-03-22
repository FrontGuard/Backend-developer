<?php
// Зчитування слів з файлу та їх сортування
$words = file_get_contents("words.txt");
$words_array = explode(" ", $words);
sort($words_array);

// Запис відсортованих слів назад у файл
file_put_contents("sorted_words.txt", implode(" ", $words_array));

echo "Слова були впорядковані за алфавітом та збережені у файлі 'sorted_words.txt'.";
?>
