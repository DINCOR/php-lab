<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $organization = $_POST['organization'];
    $stations = (int)$_POST['stations'];
    $distance = (float)$_POST['distance'];
    $speed = (float)$_POST['speed'];

    $Q = $stations * $distance;     // Класс 1 уровня
    $Qp = $Q * $speed;              // Класс 2 уровня
    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Результат</title>
    </head>
    <body>
    <h2>Результаты расчёта</h2>

    <p><b>Организация:</b> <?= htmlspecialchars($organization) ?></p>
    <p><b>Число станций:</b> <?= $stations ?></p>
    <p><b>Среднее расстояние между станциями:</b> <?= $distance ?> м</p>
    <p><b>Скорость передачи данных:</b> <?= $speed ?> Мб/с</p>

    <hr>

    <p><b>Q (1 уровень):</b> <?= $Q ?></p>
    <p><b>Qp (2 уровень):</b> <?= $Qp ?></p>

    <br>
    <a href="index.php">Назад</a>
    </body>
    </html>

    <?php
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Расчёт параметров сети</title>
</head>
<body>

<h2>Введите данные для расчёта</h2>

<form method="post">
    <label>Название организации:<br>
        <input type="text" name="organization" required>
    </label><br><br>

    <label>Число рабочих станций:<br>
        <input type="number" name="stations" required>
    </label><br><br>

    <label>Среднее расстояние между станциями (м):<br>
        <input type="number" name="distance" required>
    </label><br><br>

    <label>Скорость передачи данных (Мб/с):<br>
        <input type="number" name="speed" required>
    </label><br><br>

    <button type="submit">Рассчитать</button>
</form>
<br><a href="index.php">Назад</a>
</body>
</html>

