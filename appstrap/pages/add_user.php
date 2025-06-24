<?php
include_once('../includes/connect.php');
$pageName = "Admin";
$topic = "Add-User";

include_once('../includes/sub-header.php');
session_start();

if(!isset($_SESSION['user_email'])){ 
    header("Location:./user_action.php");
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 px-4">
            <?php if(isset($_SESSION['user_email'])){?>
           
                  <div class="form-box-container p-4 bg-light m-4">
                      <form class="form py-4 px-4 frm-add-user" method="POST">
                    <h3 class="text-center">Create User</h3>
                     <div class="err__msg text-center "></div>
                    <div class="form-group">
                        <label for="username">
                            <b>Username</b>
                            <input type="text" name='username' class="form-control form-control-lg username" placeholder="Username" id="username">
                        </label>
                    </div>

                    <div class="form-group d-flex justify-content-between gap-2">
                        <label for="lname">
                            <b>LastName</b>
                            <input type="text" name='lname' class="form-control form-control-lg lname" placeholder="LastName" id="lname">
                        </label>
                         <label for="fname">
                            <b>FirstName</b>
                            <input type="text" name='fname' class="form-control form-control-lg fname" placeholder="FirstName" id="fname">
                        </label>
                    </div>
                     <div class="form-group">
                        <label for="email">
                            <b>Email-iD</b>
                            <input type="text" name='usr__email' class="form-control form-control-lg email" placeholder="Email-ID" id="email" >
                        </label>
                    </div>

                    <div class="form-group d-flex gap-2">
                        <label for="pass">
                        <b>Password</b>
                        <input type="password" name="pass" class="form-control form-control-lg pass" placeholder="Password" id="pass">
                        </label>

                         <label for="confirm-pass">
                        <b>Confirm Password</b>
                        <input type="password" name="confirm-pass" class="form-control form-control-lg confirm-pass" placeholder="Confirm Password" id="confirm-pass">
                        </label>
                    </div>

                    <div class="btn-group d-flex gap-2">
                       <button type="submit" name="button_adduser" class="btn btn-lg btn-dark w-50"><i class='fa fa-user-plus'></i> Add User</button>

                        <a href="welcome.php" class=' btn btn-lg btn-primary mx-2 p-2 text-center w-50'><i class='fa fa-arrow-right'></i> Back</a>
                    </div>
                </form>
                  </div>
                <?php
                }?>
            </div>
           
        </div>
    </div>
</div>
<?php include_once('../includes/sub-footer.php'); ?>