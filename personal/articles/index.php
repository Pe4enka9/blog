<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$articles = $pdo->prepare("SELECT articles.*, categories.name AS category
FROM articles
JOIN categories ON articles.category_id = categories.id
WHERE articles.user_id = ?");
$articles->execute([$_SESSION['user_id']]);
$articles = $articles->fetchAll();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мои статьи</title>
</head>

<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }

    table {
        margin-top: 10px;
    }
</style>

<body>

<a href="/personal/">Назад</a>

<h1>Мои статьи</h1>

<a href="/personal/articles/create.php">Добавить статью</a>

<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Содержание</th>
        <th>Дата создания</th>
        <th>Категория</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article['name'] ?></td>
        <td><?= $article['text'] ?></td>
        <td><?= $article['created_at'] ?></td>
        <td><?= $article['category'] ?></td>
        <td><a href="/personal/articles/edit.php?id=<?= $article['id'] ?>">Изменить</a></td>
        <td><a href="/personal/articles/actions/delete.php?id=<?= $article['id'] ?>">Удалить</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>