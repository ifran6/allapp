<?php
include_once('../includes/connect.php');
$pageName = "Admin";
$topic = "Edit";

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
            <?php if(isset($_GET['update_id'])){
                $updateId = $_GET['update_id'];

            $select_user_byId_query = "SELECT * FROM user_tab WHERE user_id = '$updateId' LIMIT 1";
            $result = $conn->query($select_user_byId_query);
            if($result){
                while($row = mysqli_fetch_assoc($result)){?>
                  <div class="form-box-container p-4 bg-light m-4">
                      <form class="form py-4 px-4 update-form" method="POST">
                    <h3 class="text-center">Update User</h3>
                    <p class='update-Emsg text-center'></p>
                    <input type="hidden" name="update_id" value="<?=$row['user_id']?>">

                    <div class="form-group">
                        <label for="update_username">
                            <b>Username</b>
                            <input type="text" name='update_username' class="form-control form-control-lg update_username" value="<?=$row['username']?>" id="update_username">
                        </label>
                         
                       
                    </div>

                    <!-- <div class="form-group">
                       
                    </div> -->

                     <div class="form-group d-flex gap-2">
                         <label for="update-lname">
                            <b>LastName</b>
                            <input type="text" name="update_lname" class="form-control form-control-lg update_lname" value="<?=$row['last_name']?>" id="update-lname">
                        </label>

                        <label for="update-fname">
                            <b>FirstName</b>
                            <input type="text" name="update_fname" class="form-control form-control-lg update_fname" value="<?=$row['first_name']?>" id="update-fname">
                        </label>
                    </div>

                     <div class="form-group">
                        <label for="update_email">
                            <b>Email-iD</b>
                            <input type="text" name="update_email" class="form-control form-control-lg update_email" value="<?=$row['email']?>" id="update_email" disabled="true">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="update_pass">
                        <b>Password</b>
                        <input type="text" name="update_pass" class="form-control form-control-lg update_pass" value="<?=$row['password_hash']?>" id="update_pass">
                        </label>
                    </div>

                    <div class="btn-group">
                        <button type="submit" name="updateButton" class="btn btn-lg btn-dark btn-lg update_button" >Update</button>
                        <a href="welcome.php" class=' btn btn-primary btn-lg mx-2 p-2 text-center'>Back</a>
                    </div>
                </form>
                  </div>
                <?php
                }
            }
            }


            // =======================================================
            // =============Roles=====================================
                         if(isset($_GET['add_role_id'])){
                $add_role_id = $_GET['add_role_id'];

            $select__query = "SELECT * FROM user_tab WHERE user_id = '$add_role_id' LIMIT 1";
            $result = $conn->query($select__query);
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){?>
                  <div class="form-box-container p-4 bg-light m-4">
                      <form class="form py-4 px-4 add_role_form" method="POST">
                    <h3 class="text-center"><strong>Add User Role</strong></h3>
                    <p class='add_role_Emsg text-center'></p>
                    <input type="hidden" name="role_id" value="<?=$row['user_id']?>">

                    <div class="form-group">
                        <label for="add_role_username">
                            <b>Username</b>
                            <input type="text" name='add_role_username' class="form-control form-control-lg add_role_username" value="<?=$row['username']?>" id="add_role_username">
                        </label>  
                    </div>

                     <div class="form-group d-flex gap-2">
                         <label for="add_role_lname">
                            <b>LastName</b>
                            <input type="text" name="add_role_lname" class="form-control form-control-lg add_role_lname" value="<?=$row['last_name']?>" id="add_role_lname">
                        </label>

                        <label for="add_role_fname">
                            <b>FirstName</b>
                            <input type="text" name="add_role_fname" class="form-control form-control-lg add_role_fname" value="<?=$row['first_name']?>" id="add_role_fname">
                        </label>
                    </div>

                     <div class="form-group">
                        <label for="add_role_email">
                            <b>Email-iD</b>
                            <input type="text" name="add_role_email" class="form-control form-control-lg add_role_email" value="<?=$row['email']?>" id="add_role_email" disabled="true">
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="select_role">
                        <b>Add Role</b>
                          <select class='form-control-lg select_role' name="select_role" id="select_role">
                            <option value="">Give Role</option>
                             <option value="1">Admin</option>
                            <option value="2">Staff</option>
                          </select>
                        </label>
                    </div>

                    <div class="btn-group">
                        <button type="submit" name="addRoleButton" class="btn btn-lg btn-dark btn-lg addRoleButton" >Add Role</button>
                        <a href="welcome.php" class=' btn btn-primary btn-lg mx-2 p-2 text-center'>Back</a>
                    </div>
                    <div class="form-group text-right p-3"> 
                        <p class="text-center"><strong>Previous Role :</strong> <?=($row['role']== 0)? 'Staff':(($row['role']== 1)? 'Admin':'Officer') ?></p>
                    </div>
                </form>
                  </div>
                <?php
                }
            }
            }
            // =======================================================
            // =============Roles=====================================

            if(isset($_GET['delete_id'])){
                $deleteId = $_GET['delete_id'];
                ?>
                <div class="form-box-container p-4 bg-light my-4">
               <?php 
                  $delete_user_byId_query = "DELETE  FROM user_tab WHERE user_id = '$deleteId' LIMIT 1";
                  $result = $conn->query($delete_user_byId_query);
                 if($result){ 
                    echo ' <script>
                        alert("delete successfully!");
                        window.location.href = `welcome.php`;
                    </script>';
                    // header('location:welcome.php');
                    // exit();
                 }
                 else {
                    die(mysqli_error($result));
                }
                 ?> 
             <?php } ?>
              
            </div>
           
        </div>
    </div>
</div>
<?php include_once('../includes/sub-footer.php'); ?>