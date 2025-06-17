<?php
require 'User.php';
if ($_POST) {
    (new User())->register($_POST['name'], $_POST['email'], $_POST['pass']);
    echo "Check email to verify.";
}
?>
