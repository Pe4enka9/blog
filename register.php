<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>

<style>
    input {
        display: block;
        margin-bottom: 10px;
    }
</style>

<body>

<h1>Регистрация</h1>

<form action="/auth/register.php" method="post">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="submit" value="Зарегистрироваться">

    <a href="/login.php">Авторизоваться</a>
</form>

</body>
</html>