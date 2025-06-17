<?php include_once('./includes/header.php')?>
<div class="container">
     <div class="col-6">
        <div class="form-box">
        <form method="post">
        <input name="email" value="<?= $email ?>" required><br>
        <input name="pass" type="password" value="<?= $pass ?>" required><br>
        <input type="checkbox" name="remember"> Remember Me<br>
        <button>Login</button>
        </form>

        <form method="post">
            <input name="name" required><br>
            <input name="email" type="email" required><br>
            <input name="pass" type="password" required><br>
            <input name="confirm_pass" type="password" required><br>
            <button>Register</button>
            </form>
        </div>
     </div>
</div>
<?php include_once('./includes/footer.php')?>