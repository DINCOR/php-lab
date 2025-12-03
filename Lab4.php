<?php
function snakeToCamel($string) {            

    $parts = explode('_', $string);        
    $camelCaseString = strtolower(array_shift($parts));  

    foreach ($parts as $part) {            
        $camelCaseString .= ucfirst(strtolower($part)); 
    }

    return $camelCaseString;               
}


$inputString = 'this_is_string';          
$outputString = snakeToCamel($inputString); 
echo "Преобразованная строка: " . $outputString; 



session_start();                           


if (!isset($_SESSION['visit_count'])) {     
    $_SESSION['visit_count'] = 0;          
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

    if (isset($_POST['login']) && isset($_POST['password'])) { 

       
        if ($_POST['login'] === 'admin' && $_POST['password'] === '1234') {
            $_SESSION['auth'] = true;        
            header('Location: ' . $_SERVER['PHP_SELF']); 
            exit();                           
        } else {
            $error = 'Неверные данные!';      
        }

    } elseif (isset($_POST['logout'])) {       
        unset($_SESSION['auth']);              
        header('Location: ' . $_SERVER['PHP_SELF']); 
        exit();                               
    }
}


if (isset($_SESSION['auth'])) {               
    $_SESSION['visit_count']++;                
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
<h1>Добро пожаловать!</h1>

<?php if (isset($_SESSION['auth'])): ?>
    <p>Вы авторизованы. Количество посещений: <?php echo $_SESSION['visit_count']; ?></p>
    <form method="post">
        <button type="submit" name="logout">Выйти</button>
    </form>
<?php else: ?>
    <form method="post">
        <label for="login">Логин:</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Войти</button>
    </form>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>
