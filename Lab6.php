<?php

$filename = "text.txt"; 

$defaultPerPage = 300;  //сколько символов на страничку по умолчанию

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; //смотрит передали ли номер страницы если нет то делает 1
$perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : $defaultPerPage; //берет сколько символов показывать если не дали то берет стандарт

if ($page < 1) $page = 1; //если кто-то ввёл страницу меньше 1 то оно исправляет чтобы не сломалось

if (!file_exists($filename)) { //проверяет есть ли вообще файл 
    die("Файл не найден!"); //уведомляет о том что файл не найден
}

$text = file_get_contents($filename); //загружает весь текст файла внутрь переменной
$totalChars = strlen($text); //считает сколько там символов всего 

$totalPages = ceil($totalChars / $perPage); //узнает сколько страниц будет исходя из длины
$start = ($page - 1) * $perPage; //начало текста которое надо показывать на этой странице

$pageText = mb_substr($text, $start, $perPage, 'UTF-8'); //отрезает кусочек текста для текущей страницы чтобы не показывать всё сразу
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр файла</title>
</head>
<body>

<h2>Просмотр текста по страницам</h2>

<form method="get">
    <label>Символов на страницу:
        <input type="number" name="perPage" value="<?= $perPage ?>" min="10">
    </label>
    <button type="submit">Обновить</button>
</form>

<hr>

<div style="white-space: pre-wrap; font-family: monospace; border: 1px solid #ccc; padding: 10px;">
    <?= htmlspecialchars($pageText) ?>
</div>

<hr>

<div style="font-size: 18px;">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>&perPage=<?= $perPage ?>">Предыдущая</a>
    <?php endif; ?>

    &nbsp; Страница <?= $page ?>из<?= $totalPages ?> &nbsp;

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>&perPage=<?= $perPage ?>">Следующая</a>
    <?php endif; ?>
</div>
<br><a href="index.php">Назад</a>
</body>
</html>

