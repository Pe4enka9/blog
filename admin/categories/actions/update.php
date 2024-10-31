<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
$stmt->execute([
    $_POST['name'],
    $_POST['id']
]);

header('Location: /admin/categories/');