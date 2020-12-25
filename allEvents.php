<?php
include 'Controllers/auth.php';
$auth = new Auth_sess();
if (isset($_POST['out']) and $auth->isAuth()) {
    $auth->close();
    header('Location: allEvents.php');
    exit;
}
if (isset($_POST['in'])) {
    header('Location: authorization.php');
    exit;
}
?>
<!doctype html>
<div lang="en">
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
        <?php require 'menu.php';
        require 'getEvent.php';
        getPublicEvents(); ?>
    </div>
    <?php require 'footer.php';
    ?>

    </body>


