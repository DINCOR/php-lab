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

function Minimum($x, $y) {      //функц для нахождения мин между двумя числами
    return ($x < $y) ? $x : $y; //возвращаем меньшее из двух чисел
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {  //проверка была ли форма отправлена методом POST


    $a = (float)$_POST['a'];      //получаем знач a из формы и преобразуем в число с плавающей точкой


    $b = (float)$_POST['b'];   //олучаем значение b из формы и преобразуем в число с плавающей точкой


    $firstMin = Min(2 * $a, $b + $a);  //вычисление min(2a, b + a)


    $secondMin = Min(2 * $a - $b, $b); //вычисление min(2a - b, b)


    $result = $firstMin + $secondMin; //складываем два мин значения


    echo "<h2>Результат вычисления:</h2>"; //вывод результата
    echo "min(2 * $a, $b + $a) = $firstMin<br>";     //вывод первого мин
    echo "min(2 * $a - $b, $b) = $secondMin<br>";    //вывод второго мин
    echo "Общее значение: $result";                  //итог сумма
}
?>

<br>

<a href="index.php">Назад</a>

</body>
</html>
