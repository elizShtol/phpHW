<?php
include 'auth.php';

class Reg_sess
{

    public function reg($login, $pass, $pass1)
    {
        if (!($this->validation($login, $pass) === true)){
            return $this->validation($login, $pass);}
        if (!($pass === $pass1)){
            return 'Пароли не совпадают';}
        $link = null;
        include "getDbCon.php";
        $query = "SELECT * FROM users WHERE login='$login'";
        $hash = md5($pass);
        $insertQuery = "INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$hash')";
        $res = mysqli_query($link, $query);
        if ($res->num_rows > 0) return "Пользователь существует";
        else {
            $res = mysqli_query($link, $insertQuery);
            if ($res) {
                $auth = new Auth_sess();
                return $auth->auth($login, $pass);
            } else {
                return "Ошибка сервера";
            }
        }
    }

    private function validation($login, $pass)
    {
        if (!filter_var($login, FILTER_VALIDATE_EMAIL))
            return 'Некорректный email';
        if (strlen($pass) < 6)
            return "Введите пароль не менее 6 символов";
        return true;
    }
}