<?php

function checkIfImage($file) {
    // Перевірка чи файл є зображенням
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        echo "Файл є зображенням - " . $check["mime"] . ".";
        return true;
    } else {
        echo "Файл не є зображенням.";
        return false;
    }
}

function checkExistingFile($file) {
    // Перевірка чи файл існує вже на сервері
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    if (file_exists($targetFile)) {
        echo "Вибачте, файл з таким ім'ям вже існує.";
        return false;
    }
    return true;
}

function checkFileSize($file) {
    // Перевірка розміру файлу
    if ($file["size"] > 500000) {
        echo "Вибачте, ваш файл завеликий.";
        return false;
    }
    return true;
}

function checkFileType($file) {
    // Перевірка типу файлу
    $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Вибачте, тільки файли з розширенням JPG, JPEG, PNG та GIF дозволені.";
        return false;
    }
    return true;
}

function uploadFile($file) {
    // Завантаження файлу
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        echo "Файл " . htmlspecialchars(basename($file["name"])) . " успішно завантажено.";
    } else {
        echo "Виникла помилка при завантаженні файлу.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];
    $uploadOk = 1;

    // Виклик функцій для перевірки
    $uploadOk = $uploadOk && checkIfImage($file);
    $uploadOk = $uploadOk && checkExistingFile($file);
    $uploadOk = $uploadOk && checkFileSize($file);
    $uploadOk = $uploadOk && checkFileType($file);

    // Завантаження файлу, якщо всі перевірки пройдені успішно
    if ($uploadOk) {
        uploadFile($file);
    }
} else {
    echo "Некоректний запит.";
}

?>
