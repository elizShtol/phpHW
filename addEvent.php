<?php
include 'Controllers/auth.php';
$auth = new Auth_sess();
if (!$auth->isAuth())
    header('Location: authorization.php');
if (isset($_POST['out'])) {
    $auth->close();
    header('Location: authorization.php');
}
if (isset($_POST['add']) and isset($_POST['name']) and isset($_POST['date'])) {
    $link = null;
    include "Controllers/getDbCon.php";
    $name = $_POST['name'];
    $date = $_POST['date'];
    $descr = $_POST['descr'];
    if ($_POST['publ'] == '1')
        $publ = 1;
    else
        $publ = 0;
    $user = $auth->get_id();
    $query = "INSERT INTO `events` (`id`, `name`, `description`, `date`, `user_id`, `isPublic`) 
VALUES (NULL, '$name', '$descr', '$date', '$user', '$publ');";
    $res = mysqli_query($link, $query);
}
?>
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
<div class="content">
    <?php require 'menu.php'; ?>
    <div class="eventForm">
        <form method="post" class="addForm">
            <label for="name">Название</label>
            <input class="inputText" type="text" id="name" name="name">
            <label for="date">Дата и время</label>
            <input type="datetime-local" id="date" name="date" class="inputText">
            <label for="descr">Описание</label>
            <input type="text" id="descr" name="descr" class="inputDescr">
            <div class="check">
                <input type="checkbox" id="publ" name="publ" value="1">
                <label for="publ"> Публичное событие </label><br>
            </div>
            <div class="buttons">
                <input type="submit" name="add" class="addButton" value="Добавить"/>
            </div>
        </form>
    </div>
</div>
<?php require 'footer.php';
?>
</html>
