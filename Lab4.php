<?php
function snakeToCamel($string) {            
    //Разделяем строку по символу подчеркивания
    $parts = explode('_', $string);         //разбив строки на массив элементов по нижнему подчерк

    //приводим каждую часть к нижнему регистру и убираем подчерк
    //первую часть оставляем в нижнем регистре остальные с заглавной буквы
    $camelCaseString = strtolower(array_shift($parts));  //берем первую часть и приводим к нижнему регистру

    foreach ($parts as $part) {             //перебираем другие части строки
        $camelCaseString .= ucfirst(strtolower($part)); //делаем первую букву заглавной и добавляем к строке
    }

    return $camelCaseString;                //возвращаем готовую строку в camelCase
}


$inputString = 'this_is_string';            //исходная строка в snake_case
$outputString = snakeToCamel($inputString); //преобраз её функцией
echo "Преобразованная строка: " . $outputString; //ыывод



session_start();                            //запуск сесии для хранения данных между запросами

//счетчикик посещений
if (!isset($_SESSION['visit_count'])) {     //если счётчик ещё не создан
    $_SESSION['visit_count'] = 0;           //инициализируем его нулём
}

//обработка авторизации
if ($_SERVER['REQUEST_METHOD'] === 'POST') {    //проверка была ли отправлена форма пост

    if (isset($_POST['login']) && isset($_POST['password'])) { //если отправлены логин и пароль

        //проверка корректности данных
        if ($_POST['login'] === 'admin' && $_POST['password'] === '1234') {
            $_SESSION['auth'] = true;         //устанавливаем флаг авторизации
            header('Location: ' . $_SERVER['PHP_SELF']); //перезагрузка страницы
            exit();                            //завершение выполнения
        } else {
            $error = 'Неверные данные!';       //сообщение об ошибке
        }

    } elseif (isset($_POST['logout'])) {       //если нажата кнопка выход
        unset($_SESSION['auth']);              //удаление статусы авторизации
        header('Location: ' . $_SERVER['PHP_SELF']); //перезагрузки страницы
        exit();                                //останавлиеик выполнения
    }
}

//увеличение счетчика посещений
if (isset($_SESSION['auth'])) {                //если кто-то уже авторизован
    $_SESSION['visit_count']++;                //увеличиваем количество посещений
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
