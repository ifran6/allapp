<?php
require 'User.php';
if ($_GET['token']) {
    (new User())->verify($_GET['token']);
    echo "Email verified!";
}
?>