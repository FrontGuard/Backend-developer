<?php

class FileHandler {
    public static $dir = "text";

    public static function readFromFile($filename) {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($filepath)) {
            return file_get_contents($filepath);
        } else {
            return "File not found";
        }
    }

    public static function writeToFile($filename, $content) {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($filepath, $content, FILE_APPEND);
    }

    public static function clearFile($filename) {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($filepath, "");
    }
}

// Створення текстових файлів
$files = ['file1.txt', 'file2.txt', 'file3.txt'];
foreach ($files as $file) {
    $filepath = FileHandler::$dir . DIRECTORY_SEPARATOR . $file;
    if (!file_exists($filepath)) {
        touch($filepath);
    }
}

// Приклад використання
FileHandler::writeToFile('file1.txt', "Ура аийшло\n");
echo FileHandler::readFromFile('file1.txt');

// Очищення вмісту файлу
FileHandler::clearFile('file1.txt');
echo FileHandler::readFromFile('file1.txt');
