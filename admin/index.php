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
    <title>Главная</title>
</head>
<body>

<a href="/auth/logout.php">Выйти</a>

<h1>Главная</h1>

<a href="/admin/categories/">Категории</a>
<a href="/admin/articles/">Статьи</a>

</body>
</html>