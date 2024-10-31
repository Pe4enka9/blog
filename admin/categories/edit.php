<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$category = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$category->execute([$_GET['id'] ?? '']);
$category = $category->fetch();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изменить категорию</title>
</head>
<body>

<h1>Изменить категорию</h1>

<form action="/admin/categories/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <input type="text" name="name" value="<?= $category['name'] ?>">
    <input type="submit" value="Изменить">
</form>

</body>
</html>