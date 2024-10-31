<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$stmt = $pdo->prepare("INSERT INTO articles (name, text, category_id, user_id) VALUES (:name, :text, :category_id, :user_id)");
$stmt->execute([
    'name' => $_POST['name'],
    'text' => $_POST['text'],
    'category_id' => $_POST['category'],
    'user_id' => $_SESSION['user_id']
]);

header('Location: /personal/articles/');