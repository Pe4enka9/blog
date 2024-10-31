<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$article = $pdo->prepare("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles
JOIN categories ON articles.category_id = categories.id
JOIN users ON articles.user_id = users.id
WHERE articles.id = ?");
$article->execute([$_GET['id'] ?? '']);
$article = $article->fetch();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $article['name'] ?></title>
</head>
<body>

<a href="/">На главную</a>

<h1><?= $article['name'] ?></h1>

<p><?= $article['text'] ?></p>

<div>Категория: <?= $article['category'] ?></div>
<div>Автор: <?= $article['user'] ?></div>

</body>
</html>