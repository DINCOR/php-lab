<?php
function snakeToCamel($string) {
    //Разделяем строку по символу подчеркивания
    $parts = explode('_', $string);
    //Приводим каждую часть к нижнему регистру и убираем подчеркивание
    //Первую часть оставляем в нижнем регистре, остальные - с заглавной буквы
    $camelCaseString = strtolower(array_shift($parts)); //первая часть в нижнем регистре

    foreach ($parts as $part) {
        $camelCaseString .= ucfirst(strtolower($part)); //первая буква каждой следующей части - заглавная
    }

    return $camelCaseString;
}

//пример
$inputString = 'this_is_string';
$outputString = snakeToCamel($inputString);
echo "Преобразованная строка: " . $outputString;



session_start();

// Инициализация счетчика посещений
if (!isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] = 0;
}

// Обработка авторизации
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        if ($_POST['login'] === 'admin' && $_POST['password'] === '1234') {
            $_SESSION['auth'] = true; // Установка сессии аутентификации
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = 'Неверные данные!';
        }
    } elseif (isset($_POST['logout'])) {
        unset($_SESSION['auth']); // Удаление сессии аутентификации
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Увеличение счетчика посещений
if (isset($_SESSION['auth'])) {
    $_SESSION['visit_count']++;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и Счетчик Посещений</title>
</head>
<body>
    <h2>Добро пожаловать!</h2>

    <?php if (isset($_SESSION['auth'])): ?>
        <p>Вы вошли в систему.</p>
        <p>Количество посещений: <?= $_SESSION['visit_count'] ?></p>
        <form action="" method="POST">
            <input type="submit" name="logout" value="Выход">
        </form>
    <?php else: ?>
        <h3>Авторизация</h3>
        <?php if (isset($error)): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required><br>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Войти">
        </form>
    <?php endif; ?>
    <br><a href="index.php">Назад</a>
</body>
</html>


