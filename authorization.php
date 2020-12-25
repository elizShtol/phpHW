<?php
include 'Controllers/auth.php';
$auth = new Auth_sess();
if (isset($_POST["login"]) and isset($_POST["password"]) and isset($_POST["auth"])) {
    $authRes = $auth->auth($_POST["login"], $_POST["password"]);
    if ($authRes === true) {
        header('Location: allEvents.php');
        exit;
    } else {
        echo "<div class='message'>$authRes</div>";
    }
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='styles.css'>
    <title>Document</title>
</head>
<body>
<a href="allEvents.php" class="button">Публичные события</a>
<div class="authBox  ">
    <div class="authText">
        Авторизация
    </div>
    <form method="post">
        <label for="login">Email</label>
        <input type="text" id="login" class="inputDescr" name="login">
        <label for="password">Пароль</label>
        <input type="password" id="password" class="inputDescr" name="password">
        <div class="buttons">
            <input type="submit" name="auth" class="button" value="Войти"/>
            <a href="registration.php" class="button"> Зарегистрироваться
            </a>
        </div>
    </form>
</div>
</html>

