<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$articles = $pdo->query("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles
    JOIN categories ON articles.category_id = categories.id
    JOIN users ON articles.user_id = users.id
    WHERE articles.is_moderated IS TRUE")->fetchAll();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>Главная</title>
</head>

<body>

<header>
    <nav>
        <a href="/">Главная</a>
        <a href="/personal/">Профиль</a>
        <a href="/personal/articles/">Мои статьи</a>
    </nav>
</header>

<div class="container">
    <h1>Главная</h1>

    <article class="catalog">
        <?php foreach ($articles as $article): ?>
            <div class="card">
                <div class="card__content">
                    <h2><?= $article['name'] ?></h2>
                    <div><?= $article['category'] ?></div>
                    <div>Автор: <?= $article['user'] ?></div>
                </div>
                <p><?= $article['text'] ?></p>
                <div class="more">
                    <a href="/article.php?id=<?= $article['id'] ?>">Подробнее</a>
                </div>
                <time datetime="<?= $article['created_at'] ?>"><?= $article['created_at'] ?></time>
            </div>
        <?php endforeach; ?>
    </article>
</div>

</body>
</html>