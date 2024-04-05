<?php
/**
 * Функція для автопідключення класів.
 *
 * @param string $className Ім'я класу, який необхідно підключити.
 */
function autoloadClasses($className) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

// Реєстрація функції автозавантаження класів
spl_autoload_register('autoloadClasses');
?>
