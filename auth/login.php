<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
$stmt->execute([$_POST['login']]);
$user = $stmt->fetch();

if (!$user || $_POST['password'] !== $user['password']) {
    header('Location: /login.php');
    exit();
}

$_SESSION['user_id'] = $user['id'];

header('Location: /personal/');