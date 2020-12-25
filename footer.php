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
<footer class="contacts">
    <div class="contacts-text">
        GitHub:
        <?php $gitHub = "";
        include 'config.php';
        echo $gitHub; ?>
    </div>
    <div class="contacts-text">
        <?php $city = "";
        $year = "";
        include 'config.php';
        echo $city;
        echo ', ';
        echo $year ?>
    </div>
    <div class="contacts-text">
        <?php $number = "";
        include 'config.php';
        echo $number; ?>
    </div>

</footer>