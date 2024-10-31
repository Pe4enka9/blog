<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$articles = $pdo->query("SELECT articles.*, categories.name AS category
FROM articles JOIN categories
ON articles.category_id = categories.id")->fetchAll();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статьи</title>
</head>

<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }
</style>

<body>

<a href="/admin/">Назад</a>

<h1>Статьи</h1>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Содержимое</th>
        <th>Дата создания</th>
        <th>Модерировано</th>
        <th>Категория</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article['id'] ?></td>
        <td><?= $article['name'] ?></td>
        <td><?= $article['text'] ?></td>
        <td><?= $article['created_at'] ?></td>
        <td><?= $article['is_moderated'] ? 'Да' : 'Нет' ?></td>
        <td><?= $article['category'] ?></td>
        <td><a href="/admin/articles/edit.php?id=<?= $article['id'] ?>">Изменить</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>