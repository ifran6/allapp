<?php
require 'User.php';
$token = $_GET['token'] ?? '';
if ($_POST) {
    (new User())->resetPassword($token, $_POST['newpass']);
    echo "Password updated!";
}
?>
<form method="post">
  <input name="newpass" type="password" required><br>
  <button>Reset</button>
</form>