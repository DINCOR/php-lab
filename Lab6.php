<?php

$filename = "text.txt";

$defaultPerPage = 300;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : $defaultPerPage;

if ($page < 1) $page = 1;

if (!file_exists($filename)) {
    die("Файл не найден!");
}

$text = file_get_contents($filename);
$totalChars = strlen($text);

$totalPages = ceil($totalChars / $perPage);
$start = ($page - 1) * $perPage;

$pageText = mb_substr($text, $start, $perPage, 'UTF-8');
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

