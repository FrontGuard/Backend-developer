<?php
/**
 * Функція для автопідключення класів з урахуванням неймспейсів.
 *
 * @param string $className Ім'я класу, який необхідно підключити.
 */
function autoloadClasses($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';

    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = autoloadd . phpstr_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    $file = __DIR__ . DIRECTORY_SEPARATOR . $fileName;

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Class '$className' not found!";
    }
}

// Реєстрація функції автозавантаження класів
spl_autoload_register('autoloadClasses');
?>
