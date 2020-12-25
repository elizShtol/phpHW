<?php
include 'Controllers/auth.php';
$auth = new Auth_sess();
if(!$auth->isAuth())
    header('Location: authorization.php');
if(isset($_POST['out'])){
    $auth->close();
    header('Location: authorization.php');
}
if(isset($_POST['del'])){
    $id = $_POST['event_id'];
    $query = "DELETE FROM `events` WHERE `events`.`id` = '$id'";
    $link = null;
    include "Controllers/getDbCon.php";
    $res = mysqli_query($link, $query);
    header('Location: myEvents.php');
}

if(isset($_POST['upd'])){
    $updId= $_POST['event_id'];
    $query = "SELECT FROM `events` WHERE `events`.`id` = '$updId'";
    $link = null;
    include "Controllers/getDbCon.php";
    $res = mysqli_query($link, $query);
    $_SESSION['updId'] = $updId;
    header('Location: updEvent.php');
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
        <?php require 'menu.php' ;
        require 'getEvent.php';
        getMyEvents();?>
    </div>
    <?php require 'footer.php';
    ?>
</html>
