<?php
include 'Controllers/auth.php';
$auth = new Auth_sess();
if (!$auth->isAuth())
    header('Location: authorization.php');
if (isset($_POST['out'])) {
    $auth->close();
    header('Location: authorization.php');
}
if (isset($_POST['save'])) {
    $updId = $_POST['event_id'];
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
    $query = "UPDATE events SET `name` = '$name', `description` = '$descr', `date` = '$date', 
 `isPublic` = '$publ' WHERE id = '$updId';";
    $res = mysqli_query($link, $query);
    header('Location: myEvents.php');
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
    <?php require 'menu.php';
    require 'getEvent.php';
    getEventToUpdate($_SESSION['updId']); ?>
</div>
<?php require 'footer.php';
?>
</html>

