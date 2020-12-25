<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
class Auth_sess {

    public function isAuth() {
        if (isset($_SESSION["auth"])) {
        return $_SESSION["auth"];
    }
         return false;
    }


    public function auth($login, $pass) {
        $link = null;
        include "getDbCon.php";
        $hash = md5($pass);
        $query = "SELECT * FROM users WHERE login='$login' and password ='$hash'";
        $res = mysqli_query($link, $query);
        if ($res->num_rows > 0) {
            $_SESSION["auth"] = true;
            $_SESSION["login"] = $login;
            $_SESSION["user_id"] = $res->fetch_all()[0][0];
            return true;
        }
        else {
            $_SESSION["auth"] = false;
            return "Пользователь не найден";
        }
    }

    public function get_login() {
        if ($this->isAuth()) {
            return $_SESSION["login"];
        }
    }

    public function get_id() {
        if ($this->isAuth()) {
            return $_SESSION["user_id"];
        }
    }

    public function close() {
       $_SESSION['auth'] = false;
    }
}