<?php
/** @var PDO $pdo */
$pdo = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
$stmt->execute([$_POST['name']]);

header('Location: /admin/categories/');