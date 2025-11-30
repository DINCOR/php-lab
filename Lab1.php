<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вычисление периода колебания маятника</title>
</head>
<body>

<h1>Вычисление периода колебания маятника</h1>

<form method="post">
    <label for="length">Введите длину маятника (в метрах):</label>

    <input type="number" id="length" name="length" step="0.01" required>

    <input type="submit" value="Вычислить">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //проверяю что форма правда отправилась постом


    $length = floatval($_POST['length']); //беру длину маятника из формы и превращаю в число


    $g = 9.81; //ускорение свободного падения в м/с²


    $T = 2 * pi() * sqrt($length / $g); //рассчитываю период колебания по формуле T = 2π * √(L / g)


    echo "<h2>Результат:</h2>"; //вывод
    echo "Для длины маятника $length м период колебания T = " . round($T, 2) . " секунд.";
}
?>

<br>
<a href="index.php">Назад</a>

</body>
</html>
