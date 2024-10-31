<?php
/** @var PDO $pdo */
require $_SERVER['DOCUMENT_ROOT'] . '/admin/check_admin.php';

$article = $pdo->prepare("SELECT id, is_moderated FROM articles WHERE id = ?");
$article->execute([$_GET['id'] ?? '']);
$article = $article->fetch();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Модерировать</title>
</head>
<body>

<h1>Модерировать</h1>

<form action="/admin/articles/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <input type="checkbox" name="is_moderated" id="is_moderated" <?= $article['is_moderated'] ? 'checked' : '' ?>>
    <label for="is_moderated">Модерировано</label>
    <input type="submit" value="Изменить">
</form>

</body>
</html>