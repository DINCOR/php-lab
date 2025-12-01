<?php

class NumberPair {
    //тут будут лежать a и b
    private float $a;
    private float $b;

    //когда создаём объект — записываем в него числа
    public function __construct(float $a, float $b) {
        $this->a = $a; //запоминаем a
        $this->b = $b; //запоминаем b
    }

    //возвращает текст с числами
    public function info(): string {
        return "Число A = {$this->a}, Число B = {$this->b}"; //делаем строку
    }

    //считает полу-разность чисел
    public function halfDifference(): float {
        return ($this->a - $this->b) / 2; //формула 
    }
}

//переменные для вывода на экран
$info = "";   //сюда положим текст
$result = ""; //сюда результат

//если форма была отправлена
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = floatval($_POST["a"]); //берём a из формы
    $b = floatval($_POST["b"]); //берём b из формы

    $obj = new NumberPair($a, $b); //создаём объект с числами

    $info = $obj->info();             //получаем текст про объект
    $result = $obj->halfDifference(); //считаем полуразность 
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Полу-разность чисел</title>
</head>
<body>

<form method="post">
    <label>Число A:</label><br>
    <input type="text" name="a" required><br><br>

    <label>Число B:</label><br>
    <input type="text" name="b" required><br><br>

    <button type="submit">Вычислить</button>
</form>

<?php if ($info): ?>
    <p><b>Объект:</b> <?= $info ?></p>
    <p><b>Полу-разность:</b> <?= $result ?></p>
<?php endif; ?>

</body>
</html>
