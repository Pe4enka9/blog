<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit();
}

$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$user->execute([$_SESSION['user_id']]);
$user = $user->fetch();

if (!$user['is_admin']) {
    header('Location: /');
    exit();
}