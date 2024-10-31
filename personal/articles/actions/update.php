<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE articles SET name = :name, text = :text, category_id = :category_id WHERE id = :id");
$stmt->execute([
    'name' => $_POST['name'],
    'text' => $_POST['text'],
    'category_id' => $_POST['category'],
    'id' => $_POST['id']
]);

header('Location: /personal/articles/');