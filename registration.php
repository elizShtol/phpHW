<?php
session_start();
include 'Controllers/registr.php';
$reg = new Reg_sess();
if (isset($_POST["login"]) and isset($_POST["password"]) and isset($_POST["password1"]) and isset($_POST["reg"])) {
    $regRes = $reg->reg($_POST["login"], $_POST["password"], $_POST["password1"]);
    if ($regRes === true) {
        header('Location: allEvents.php');
        exit;
    } else {
        echo "<div class='message'>$regRes</div>";
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
<div class="authBox">
    <div class="authText">
        Регистрация
    </div>
    <div>
        <form method="post">
            <label for="login">Email</label>
            <input type="text" id="login" class="inputDescr" name="login">
            <label for="password">Пароль</label>
            <input type="password" id="password" class="inputDescr" name="password">
            <label for="password1">Подтвердите пароль</label>
            <input type="password" id="password1" class="inputDescr" name="password1">
            <div class="buttons">
                <a href="authorization.php" class="button"> Уже есть аккаунт
                </a>
                <input type="submit" name="reg" class="button" value="Зарегистрироваться"/>
            </div>
        </form>
    </div>
</div>
</html>