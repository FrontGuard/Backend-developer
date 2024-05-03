<?php
// Підключення до бази даних
$conn = mysqli_connect("localhost", "root", "", "lab7");

// Перевірка підключення до бази даних
if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

// Функція для отримання даних для меню з бази даних
function getMenuItems($conn) {
    $sql = "SELECT * FROM menu_items";
    $result = mysqli_query($conn, $sql);

    $menu_items = array(); // Масив для зберігання пунктів меню

    // Перевірка наявності результату запиту
    if (mysqli_num_rows($result) > 0) {
        // Отримання кожного рядка результату запиту як асоціативний масив
        while ($row = mysqli_fetch_assoc($result)) {
            $menu_items[] = $row; // Додавання рядка до масиву пунктів меню
        }
    }

    return $menu_items; // Повертаємо масив пунктів меню
}

// Функція для генерації HTML-коду меню на основі отриманих даних
function generateMenu($menu_items) {
    $menu_html = '<ul>';
    foreach ($menu_items as $item) {
        $menu_html .= '<li><a href="' . $item['url'] . '">' . $item['title'] . '</a></li>';
    }
    $menu_html .= '</ul>';
    return $menu_html;
}

// Отримання даних для меню з бази даних
$menu_items = getMenuItems($conn);

// Початок буферизації виведення
ob_start();

// Генерація HTML-коду меню на основі отриманих даних
$menu_html = generateMenu($menu_items);
echo $menu_html; // Виведення згенерованого HTML-коду меню

// Збереження вмісту буфера у кешованому файлі
file_put_contents('cached_menu.html', ob_get_contents());

// Очищення буфера виведення
ob_clean();

// Виведення HTML-коду меню
echo $menu_html;
?>
