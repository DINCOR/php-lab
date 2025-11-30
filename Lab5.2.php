<?php

//класс-родитель для двух чисел
class NumberPair {
    protected float $a; //первое число
    protected float $b; //второе число

    //конструктор, сюда передаём a и b
    public function __construct(float $a, float $b) {
        $this->a = $a; //запомнили a
        $this->b = $b; //запомнили b
    }

    //делаем строку с инфой
    public function info(): string {
        return "A = {$this->a}, B = {$this->b}"; //склеиваем строку
    }

    //считаем полу-разность
    public function halfDifference(): float {
        return ($this->a - $this->b) / 2; //формула
    }
}

//класс-потомок, тут уже три числа
class ExtendedNumberPair extends NumberPair {
    private float $c; //третье число

    //конструктор потомка
    public function __construct(float $a, float $b, float $c) {
        parent::__construct($a, $b); //берём a и b у родителя
        $this->c = $c; //а это новое число
    }

    //строка для трёх чисел
    public function info(): string {
        return "A = {$this->a}, B = {$this->b}, C = {$this->c}"; //делаем строку для 3х
    }

    //тут считаем полуразность * c
    public function compute(): float {
        return $this->halfDifference() * $this->c; //берём формулу родителя и умножаем
    }
}


//основные переменнные для вывода
$parentInfo = "";   //текст про родителя
$parentResult = ""; //результат родителя
$childInfo = "";    //текст про потомка
$childResult = "";  //результат потомка

//если нажали кнопку отправить
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $a = floatval($_POST["a"]); //берём a
    $b = floatval($_POST["b"]); //берём b
    $c = floatval($_POST["c"]); //берём c

    //создаём объект родителя
    $parent = new NumberPair($a, $b);
    $parentInfo  = $parent->info();         //получаем текст
    $parentResult = $parent->halfDifference(); //полуразность

    //создаём объект потомка
    $child = new ExtendedNumberPair($a, $b, $c);
    $childInfo  = $child->info();     //инфа про три числа
    $childResult = $child->compute(); //итог вычисления
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Класс-родитель и класс-потомок</title>
</head>
<body>

<h2>Ввод данных</h2>

<form method="post">
    <label>A:</label><br>
    <input type="text" name="a" required><br><br>

    <label>B:</label><br>
    <input type="text" name="b" required><br><br>

    <label>C:</label><br>
    <input type="text" name="c" required><br><br>

    <button type="submit">Вычислить</button>
</form>

<?php if ($parentInfo): ?>
    <h3>Класс-родитель</h3>
    <p><?= $parentInfo ?></p>
    <p>Полу-разность: <?= $parentResult ?></p>

    <h3>Класс-потомок</h3>
    <p><?= $childInfo ?></p>
    <p>Результат (полу-разность × c): <?= $childResult ?></p>
<?php endif; ?>

</body>
</html>
