<?php

class NumberPair {
    private float $a;
    private float $b;

    public function __construct(float $a, float $b) {
        $this->a = $a; 
        $this->b = $b; 
    }

    public function info(): string {
        return "Число A = {$this->a}, Число B = {$this->b}"; 
    }

 
    public function halfDifference(): float {
        return ($this->a - $this->b) / 2;  
    }
}


$info = "";   
$result = ""; 


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = floatval($_POST["a"]); 
    $b = floatval($_POST["b"]); 

    $obj = new NumberPair($a, $b); 

    $info = $obj->info();             
    $result = $obj->halfDifference();  
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
