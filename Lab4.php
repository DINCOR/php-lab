<?php
function snakeToCamel($string) {
    //Разделяем строку по символу подчеркивания
    $parts = explode('_', $string);

    //Приводим каждую часть к нижнему регистру и убираем подчеркивание
    //Первую часть оставляем в нижнем регистре, остальные - с заглавной буквы
    $camelCaseString = strtolower(array_shift($parts)); //первая часть в нижнем регистре

    foreach ($parts as $part) {
        $camelCaseString .= ucfirst(strtolower($part)); //первая буква каждой следующей части - заглавная
    }

    return $camelCaseString;
}

// Пример использования функции
$inputString = 'this_is_string';
$outputString = snakeToCamel($inputString);
echo "Преобразованная строка: " . $outputString; // вывод: thisisString
?>
