<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$categories = $pdo->query("SELECT * FROM categories");
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить статью</title>
</head>

<style>
    input, textarea, select {
        margin-bottom: 10px;
        display: block;
        resize: vertical;
    }
</style>

<body>

<h1>Добавить статью</h1>

<form action="/personal/articles/actions/store.php" method="post">
    <input type="text" name="name" placeholder="Название">
    <textarea name="text" placeholder="Описание"></textarea>
    <select name="category">
        <option value="select" selected hidden>Выбрать категорию</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Добавить">
</form>

</body>
</html>