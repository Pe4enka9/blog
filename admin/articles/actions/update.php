<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt  = $pdo->prepare("UPDATE articles SET is_moderated = ? WHERE id = ?");
$stmt->execute([
    $_POST['is_moderated'] ? 1 : 0,
    $_POST['id']
]);

header('Location: /admin/articles/');