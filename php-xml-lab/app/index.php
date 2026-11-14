<?php
header('Content-Type: text/html; charset=UTF-8');

$json = file_get_contents(__DIR__ . '/data/serials.json');
if ($json === false) {
    exit('Не удалось прочитать файл.');
}

$movies = json_decode($json, true);

if (!is_array($movies) || !array_is_list($movies)) {
    exit('Ожидался JSON-массив записей.');
}

if ($movies === []) {
    exit('Каталог пуст.');
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Каталог фильмов и сериалов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
    <h1>Каталог фильмов и сериалов</h1>
    <p>Всего записей: <?= count($movies) ?></p>
    <ol>
        <?php foreach ($movies as $movie): ?>
                        <li>
                <?= htmlspecialchars($movie['title_russian']) ?>
                (<?= htmlspecialchars($movie['title_original']) ?>),
                <?= $movie['year'] ?>
            </li>
        <?php endforeach; ?>
    </ol>
        </main>
</body>
</html>