<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Четные и Нечетные Числа</title>
</head>
<body>
<h1>Определение количества четных и нечетных чисел</h1>

<?php
//массив 20 случайных чисел от 1 до 100
$array = [];
for ($i = 0; $i < 20; $i++) {
    $array[] = rand(1, 100);
}

//количество четных и нечетных чисел
$evenCount = 0;
$oddCount = 0;

foreach ($array as $number) {
    if ($number % 2 == 0) {
        $evenCount++;
    } else {
        $oddCount++;
    }
}

//результаты
echo "<h2>Сгенерированный массив:</h2>";
echo "<pre>" . print_r($array, true) . "</pre>";

echo "<h2>Результаты:</h2>";
echo "Количество четных чисел: $evenCount<br>";
echo "Количество нечетных чисел: $oddCount<br>";

//каких чисел больше
if ($evenCount > $oddCount) {
    echo "Больше четных чисел.";
} elseif ($oddCount > $evenCount) {
    echo "Больше нечетных чисел.";
} else {
    echo "Количество четных и нечетных чисел одинаково.";
}
?>
<br> <a href="index.php"> Назад </a>
</body>
</html>

