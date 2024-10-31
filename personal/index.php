<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Профиль</title>
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

    a:not(table a) {
        margin-bottom: 10px;
        display: block;
    }
</style>

<body>

<h1>Профиль</h1>

<a href="/">Главная</a>
<a href="/personal/articles/">Статьи</a>

<a href="/auth/logout.php">Выйти</a>

</body>
</html>