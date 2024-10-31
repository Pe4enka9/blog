<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
$stmt->execute([
    $_POST['login'],
    $_POST['password']
]);

$_SESSION['user_id'] = $pdo->lastInsertId();

header('Location: /personal/');