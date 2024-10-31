<?php
/** @var PDO $pdo */
require $_SERVER['DOCUMENT_ROOT'] . '/admin/check_admin.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории</title>
</head>

<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }

    table {
        margin-top: 20px;
    }
</style>

<body>

<a href="/admin/">Назад</a>

<h1>Категории</h1>

<a href="/admin/categories/create.php">Добавить категорию</a>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td><a href="/admin/categories/edit.php?id=<?= $category['id'] ?>">Изменить</a></td>
            <td><a href="/admin/categories/actions/delete.php?id=<?= $category['id'] ?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>