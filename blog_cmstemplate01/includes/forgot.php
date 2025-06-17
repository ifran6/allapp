<?php
require 'User.php';
if ($_POST) {
    (new User())->sendReset($_POST['email']);
    echo "Reset link sent!";
}
?>
<form method="post">
  <input name="email" type="email" required><br>
  <button>Send Reset Link</button>
</form>