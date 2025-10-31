<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вычисление значения</title>
</head>
<body>
<h1>Вычисление выражения</h1>

<form method="post" action="">
    <label for="a">Введите значение a:</label>
    <input type="number" id="a" name="a" required>
    <br><br>
    <label for="b">Введите значение b:</label>
    <input type="number" id="b" name="b" required>
    <br><br>
    <input type="submit" value="Вычислить">
</form>

<?php
function Minimum($x, $y) {
    return ($x < $y) ? $x : $y;
}

//отправление данных формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //значения a и b из формы
    $a = (float)$_POST['a'];
    $b = (float)$_POST['b'];

    //вычисление min(2a, b + a)
    $firstMin = Min(2 * $a, $b + $a);

    //вычисление min(2a - b, b)
    $secondMin = Min(2 * $a - $b, $b);

    //сумма
    $result = $firstMin + $secondMin;

    //результат
    echo "<h2>Результат вычисления:</h2>";
    echo "min(2 * $a, $b + $a) = $firstMin<br>";
    echo "min(2 * $a - $b, $b) = $secondMin<br>";
    echo "Общее значение: $result";
}
?>
<br><a href="index.php"> Назад </a>
</body>
</html>
