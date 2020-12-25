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
<div class="navigation-menu">
    <div class="links-navigation">
        <a href="allEvents.php" class="link-navigation">Публичные события</a>
        <a href="myEvents.php" class="link-navigation">Мои события</a>
        <a href="addEvent.php" class="link-navigation">Добавить событие</a>
    </div>
    <div class="goout">
        <div class="login"><?php
            $auth = new Auth_sess();
            echo $auth->get_login() ?>
        </div>
        <form method="post">
            <input type="submit" name="in" class="button" value="Войти"/>
            <input type="submit" name="out" class="button" value="Выйти"/>
        </form>
    </div>
</div>
