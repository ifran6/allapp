<?php
require 'User.php';
$email = $_COOKIE['email'] ?? '';
$pass = $_COOKIE['pass'] ?? '';

if ($_POST) {
    if (isset($_POST['remember'])) {
        setcookie('email', $_POST['email'], time()+86400*30);
        setcookie('pass', $_POST['pass'], time()+86400*30);
    }
    echo (new User())->login($_POST['email'], $_POST['pass']);
}
?>
