<?php
// include_once('../includes/connect_net.php');
$pageName = "Login";
$topic = "Login";

include_once('../includes/sub-header.php');
?>

<div class="container">
    <div class="form__box-container shadow">
        <!-- <div class="col-md-5 col-sm-5 p-4 "> -->
               
                 <div class="image__box-container shadow">
                 <!-- <img src="../assets/images/bg_index.png"  class= "site-img" alt="login-img"> -->
                 
                 </div>
         
                <div class="form-box" id="loginForm">
                <form class="frm-login" method="post">
                    <h3 class="text-center display-6">Login Here</h3> 
                    <hr>
                    <p class="response text-center"></p>
                    <div class="form-group">
                        <label for="username" class="form-label"><strong>Username</strong></label>
                        <input type="text" name="lgn-username" class="form-control-lg lgn-username" id="lgn-username" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label" class="form-label"><strong>Password</strong></label>
                        <input type="password" name="lgn-password" class="form-control-lg lgn-password" id="lgn-password" placeholder="Enter Password">
                    </div>
                      
                    <div class="action-box">
                        <label for="remember" class="form-label"> <input type="checkbox" name="remember" id="remember"> Remember</label>
                        <label class="form-label"><a href="#" class="forgotten-pass">Forgotten Password?</a></label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg">Login</button>
                    </div>

                    <p class="text-center">I don't have Account? <a href="#" class="button-register"> Register</a></p>
                </form>
                </div>
                
            <!-- </fieldset> -->

            <!-- div -->
            <div class="form-box" id="forgotPwdForm">
                <form action="" class="frm-forgot-pwd" id="frm-forgot-pwd">
                    <h3 class="text-center display-5">Forgotten Password</h3> 
                    <hr>
                    <p class="response text-center"></p>
                    <div class="form-group">
                        <label for="username" class="form-label"><strong>Username</strong></label>
                        <input type="text" class="form-control-lg fg-username" id="fg-username" placeholder="Username | Email">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg button-fgt-continue">Continue</button>
                    </div>
                </form>
                </div>
            <!-- div -->

             <!-- div -->
             <div class="form-box" id="forgotPasswordForm">
                <form action="" class="frm-fg-pwd" id="frm-fg-pwd" >
                    <h3 class="text-center">Reset Password</h3> 
                    <hr>
                    <p class="response text-center"></p>
                    <div class="form-group">
                        <label for="password" class="form-label"><strong>Password</strong></label>
                        <input type="text" class="form-control-lg forgotten-password" id="forgotten-password" placeholder="Enter Password">
                    </div>
                    
                    <div class="form-group">
                            <label for="confirm-forgotten-password" class="form-label"><strong>Confimr Password</strong></label>
                            <input type="password" class="form-control-lg confirm-forgotten-password" id="confirm-forgotten-password" placeholder="Confirm Password">
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg">Reset Password</button>
                    </div>
                </form>
                </div>
            <!-- div -->

            <!-- Register -->
            <div class="form-box" id="registerForm">
                <form class="frm-register col-9" method="post">
                    <h3 class="text-center display-6">Register Here</h3> 
                    <hr>
                    <?php
                      if(isset($_GET['error'])){?>
                      <div class="alert alert-danger" role="alert"><?=stripcslashes($_GET['error']);?></div>
                      <?php } ?>

                      <?php
                      if(isset($_GET['success'])){ ?>
                      <div class="alert alert-success" role="alert"><?=stripcslashes($_GET['success']); ?></div>
                      <?php } ?>

                    <p class="hintmsg text-center"></p>
                    <div class="form-group">
                        <label for="username" class="form-label"><strong>Username</strong></label>
                        <input type="text" name="username" class="form-control-lg username" id="username" placeholder="Username">
                    </div>

                     <div class="form-group d-flex justify-content-between gap-2">
                        <label for="lastname" class="form-label">
                            <b>LastName</b>
                            <input type="text" name="last_name" class="form-control form-control-lg last-name" placeholder="LastName" id="last-name">
                        </label>
                         <label for="firstname" class="form-label">
                            <b>FirstName</b>
                            <input type="text" name="first_name" class="form-control form-control-lg first-name" placeholder="FirstName" id="first-name">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label"><strong>Email-ID</strong></label>
                        <input type="text" name="email" class="form-control-lg email" id="email" placeholder="Email-ID">
                    </div>

                    <div class="form-group d-flex gap-2">
                        <label for="password" class="form-label"><strong>Password</strong>
                        <input type="password" class="form-control-lg password" name="password" id="password" placeholder="Enter Password"></label>

                         <label for="confirm-password" class="form-label"><strong>Confirm Password</strong>
                        <input type="password" class="form-control-lg confirm-password w-full" name="confirm_password" id="confirm-password" placeholder="Confrim Password"></label>
                    </div>

                    <div class="form-group">
                       
                    </div>
                    <div class="form-group">
                        <button type="submit" name="registerButton" class="btn btn-dark btn-lg">Register</button>
                    </div>

                    <p class="text-center">Already have Account? <a href="#" class="button-login"> Login</a></p>
                </form>
                </div>
             <!-- Register -->
         </div>
    </div>
</div>

    
<?php include_once('../includes/sub-footer.php'); ?>