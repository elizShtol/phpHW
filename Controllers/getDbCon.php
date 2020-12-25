<?php
$link = new mysqli("hw", "root", "root", "php_hw");

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}