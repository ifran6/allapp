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

            if(isset($_GET['delete_id'])){
                $deleteId = $_GET['delete_id'];
                ?>
                <div class="form-box-container p-4 bg-light my-4">
               <?php 
                  $delete_user_byId_query = "DELETE  FROM user_tab WHERE user_id = '$deleteId' LIMIT 1";
                  $result = $conn->query($delete_user_byId_query);
                 if($result){ echo "<p class='text-success p-4'>".$deleteId." has been delete successfully!</p>"; }
                 else {
                    die(mysqli_error($result));
                }
                 ?> <a href="welcome.php" class=' btn btn-secondary mx-2 p-2 text-center'>Back</a>
             <?php } ?>
              
            </div>
           
        </div>
    </div>
</div>
<?php include_once('../includes/sub-footer.php'); ?>