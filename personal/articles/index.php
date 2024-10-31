<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$articles = $pdo->query("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles
JOIN categories ON articles.category_id = categories.id
JOIN users ON articles.user_id = users.id")->fetchAll();
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

    table {
        margin-top: 10px;
    }
</style>

<body>

<a href="/personal/">Назад</a>

<h1>Статьи</h1>

<a href="/personal/articles/create.php">Добавить статью</a>

<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Содержание</th>
        <th>Дата создание</th>
        <th>Категория</th>
        <th>Пользователь</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article['name'] ?></td>
        <td><?= $article['text'] ?></td>
        <td><?= $article['created_at'] ?></td>
        <td><?= $article['category'] ?></td>
        <td><?= $article['user'] ?></td>
        <?php if ($article['user_id'] == $_SESSION['user_id']): ?>
        <td><a href="/personal/articles/edit.php?id=<?= $article['id'] ?>">Изменить</a></td>
        <td><a href="/personal/articles/actions/delete.php?id=<?= $article['id'] ?>">Удалить</a></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>