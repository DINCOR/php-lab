<?php


class NumberPair {
    protected float $a; 
    protected float $b; 

   
    public function __construct(float $a, float $b) {
        $this->a = $a; 
        $this->b = $b; 
    }

    
    public function info(): string {
        return "A = {$this->a}, B = {$this->b}"; 
    }

    
    public function halfDifference(): float {
        return ($this->a - $this->b) / 2; 
    }
}


class ExtendedNumberPair extends NumberPair {
    private float $c; 

    
    public function __construct(float $a, float $b, float $c) {
        parent::__construct($a, $b); 
        $this->c = $c; 
    }

    
    public function info(): string {
        return "A = {$this->a}, B = {$this->b}, C = {$this->c}"; 
    }

  
    public function compute(): float {
        return $this->halfDifference() * $this->c; 
    }
}



$parentInfo = "";   
$parentResult = ""; 
$childInfo = "";    
$childResult = "";  


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $a = floatval($_POST["a"]); 
    $b = floatval($_POST["b"]); 
    $c = floatval($_POST["c"]); 


    $parent = new NumberPair($a, $b);
    $parentInfo  = $parent->info();        
    $parentResult = $parent->halfDifference(); 

    
    $child = new ExtendedNumberPair($a, $b, $c);
    $childInfo  = $child->info();     
    $childResult = $child->compute(); 
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
