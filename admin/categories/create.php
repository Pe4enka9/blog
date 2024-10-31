<?php
require $_SERVER['DOCUMENT_ROOT'] . '/admin/check_admin.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить категорию</title>
</head>

<style>
    input {
        margin-bottom: 10px;
        display: block;
    }
</style>

<body>

<h1>Добавить категорию</h1>

<form action="/admin/categories/actions/store.php" method="post">
    <input type="text" name="name" placeholder="Название">
    <input type="submit" value="Добавить">
</form>

</body>
</html>