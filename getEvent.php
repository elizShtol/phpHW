<?php
function getPublicEvents()
{
    $link = null;
    include "Controllers/getDbCon.php";
    $query = "SELECT * FROM events WHERE isPublic=1 ORDER BY `date`";
    $res = mysqli_query($link, $query);
    foreach ($res->fetch_all() as $row) {
        $userQuery = "SELECT `login` FROM users WHERE id='$row[4]'";
        $userRes = mysqli_query($link, $userQuery);
        $userLogin = $userRes->fetch_all()[0][0];
        echo '<div class="eventForm">';
        getEvent($row[1], $row[3], $row[2], $userLogin);
        echo '</div>';
    }
}

function getMyEvents()
{
    $link = null;
    include "Controllers/getDbCon.php";
    $auth = new Auth_sess();
    $userId = $auth->get_id();
    $query = "SELECT * FROM events WHERE user_id='$userId' ORDER BY `date`";
    $res = mysqli_query($link, $query);
    foreach ($res->fetch_all() as $row) {
        echo '<div class="eventForm">';
        getEvent($row[1], $row[3], $row[2], $auth->get_login());
        echo '</div>';
        echo '<form method="post">';
        echo '<input type="hidden" name="event_id" value="';
        echo $row[0];
        echo '">';
        echo '<div class="buttons">';
        echo '<input type="submit" name="upd" class="updButton" value="Изменить"/>';
        echo '<input type="submit" name="del" class="updButton" value="Удалить"/>';
        echo '</div>';
        echo '</form>';
    }
}

function getEvent($name, $date, $descr, $user)
{
    echo ' <label for="name">Название</label>';
    echo '<div class="text-box">' . $name . ' </div>';
    echo ' <label for="date">Дата и время</label>';
    echo '<div class="text-box">' . $date . ' </div>';
    echo ' <label for="descr">Описание</label>';
    echo '<div class="text-box">' . $descr . ' </div>';
    echo ' <label for="author">Автор</label>';
    echo '<div class="text-box">' . $user . ' </div>';
}

function getEventToUpdate($id)
{
    $link = null;
    include "Controllers/getDbCon.php";
    $query = "SELECT * FROM events WHERE id='$id'";
    $res = mysqli_query($link, $query)->fetch_all();
    $date = date('Y-m-d\TH:i:s', strtotime($res[0][3]));
    $name = $res[0][1];
    $descr = $res[0][2];
    $publ = $res[0][5];
    echo '<div class="eventForm">';
    echo '<form method="post" class="addForm">
        <label for="name">Название</label>
        <input class="inputText" type="text" id="name" name="name" value="';
    echo $name;
    echo '">
        <label for="date">Дата и время</label>
        <input type="datetime-local" id="date" name="date" class="inputText" value="'
        . $date;
    echo '">
        <label for="descr">Описание</label>
        <input type="text" id="descr" name="descr" class="inputDescr" value="';
    echo $descr;
    if ($publ == 1)
        echo '">
            <div class="check">
        <input type="checkbox" id="publ" name="publ" value="1" checked="checked">
        <label for="publ"> Публичное событие </label><br>
            </div>';
    else
        echo '">
            <div class="check">
        <input type="checkbox" id="publ" name="publ" value="1">
        <label for="publ"> Публичное событие </label><br>
            </div>';
    echo '<div class="buttons">
                <input type="submit" name="save" class="addButton" value="Сохранить"/>
            </div>';
    echo '<input type="hidden" name="event_id" value="';
    echo $id;
    echo '">';
    echo '</form>';
    echo '</div>';
}