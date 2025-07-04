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
            <?php if(isset($_GET['ads_edit_id'])){
                $adsId = $_GET['ads_edit_id'];

            $select_user_byId_query = "SELECT * FROM ads_tab WHERE id = '$adsId' LIMIT 1";
            $result = $conn->query($select_user_byId_query);
            if($result){
                while($row = mysqli_fetch_assoc($result)){?>
                  <div class="form-box-container p-4 bg-light m-4">
                      <form class="form py-4 px-4 ads_update-form" method="POST">
                    <h3 class="text-center display-7">Update ADs</h3>
                    <p class='error_msg text-center'></p>
                    <input type="hidden" name="ads_update_id" value="<?=$row['id']?>">

                    <div class="form-group">
                        <label for="ads_title_update">
                            <b>ADs Title</b>
                            <input type="text" name='ads_title_update' class="form-control form-control-lg ads_title_update" value="<?=$row['ads_title']?>" id="ads_title_update">
                        </label>
                         
                       
                    </div>


                     <div class="form-group">
                         <label for="ads_descr_update">
                            <b>Descritpions</b>
                            <textarea name="ads_descr_update" class="form-control form-control-lg ads_descr_update" rows="4" cols="15" value="<?=$row['ads_description']?>" id="ads_descr_update" placeholder="Descriptions"><?=$row['ads_description']?></textarea>
                        </label>

                        
                    </div>

                     <div class="form-group d-flex gap-2">
                        <label for="ads_category_update">
                            <b>Category</b>
                            <select name="ads_category_update" class="form-control-lg ads_category_update" id="ads_category_update">
                                <option value="" >Select Category</option>
                                <option value="0" <?=($row['ads_category'] == 0)?'selected':''?>>Non-Technology</option>
                                <option value="1" <?=($row['ads_category'] == 1)?'selected':''?>>Technology</option>
                            </select>
                        </label>

                        <label for="ads_statu_update">
                            <b>Statu</b>
                            <select name="ads_statu_update" class="form-control-lg ads_statu_update" id="ads_statu_update">
                                <option value="">Change Statu</option>
                                <option value="0" <?=$row['is_active'] == 0 ? 'selected' : ''?>>Pending</option>
                                <option value="1" <?=$row['is_active'] == 1 ? 'selected' : ''?>>Approved</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                         <label for="ads_file" class="form-label">
                        <b>Image</b>
                        <input type="file" name="adsUpload" class="form-control form-control-lg ads_file" placeholder="Upload" id="ads_file">
                        </label>
                    </div>

                    <div class="btn-group d-flex gap-2">
                        <button type="submit" name="update_ads_Button" class="btn btn-lg btn-dark btn-lg update_ads_button w-50" ><i class='fa fa-arrow-up'></i> Update</button>
                        <a href="welcome.php" class=' btn btn-primary btn-lg  text-center w-50'><i class='fa fa-arrow-right'></i> Back</a>
                    </div>
                    <div class='text-dark text-center mt-3 d-flex justify-content-center gap-2'><strong>Statu: </strong> <?=($row['is_active'] == 1)?"<i class='text-success text-center'>Aproved </p>":"<p class='text-danger text-center'> Pending </i>" ?></div>
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
                             <option value="0">Admin</option>
                            <option value="1">Staff</option>
                          </select>
                        </label>
                    </div>

                    <div class="btn-group">
                        <button type="submit" name="addRoleButton" class="btn btn-lg btn-dark btn-lg addRoleButton" ><i class='fa fa-add'></i> Add Role</button>
                        <a href="welcome.php" class=' btn btn-primary btn-lg mx-2 p-2 text-center'> <i class='fa fa-arrow-right'></i>Back</a>
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

            }
                // ==================================================================================================
                // ===========================Product================================================================

                 if(isset($_GET['edit_id'])){
                $editId = $_GET['edit_id'];

            $select_user_byId_query = "SELECT * FROM product WHERE id = '$editId' LIMIT 1";
            $result = $conn->query($select_user_byId_query);
            if($result){
                while($row = mysqli_fetch_assoc($result)){?>
                  <div class="form-box-container p-4 bg-light m-4">
                      <form class="form py-4 px-4 product_update_form" method="POST">
                    <h3 class="text-center display-7 mb-3">Edit Product</h3>
                    <p class='update-Emsg text-center'></p>
                    <input type="hidden" name="product_edit_id" value="<?=$row['id']?>">

                    <div class="form-group">
                        <label for="product_name_update">
                            <b>Product</b>
                            <input type="text" name='product_name_update' class="form-control form-control-lg product_name_update" value="<?=$row['product_name']?>" id="product_name_update">
                        </label>
                         
                       
                    </div>


                     <div class="form-group">
                         <label for="product_description_update">
                            <b>Description</b>
                            <input type="text" name="product_description_update" class="form-control form-control-lg product_description_update" value="<?=$row['product_description']?>" id="product_description_update">
                        </label>

                       
                    </div>

                     <div class="form-group d-flex gap-2">
                         <label for="product_category_update">
                            <b>Category</b>
                            <input type="text" name="product_category_update" class="form-control form-control-lg product_category_update" value="<?=$row['category']?>" id="product_category_update">
                        </label>

                        <label for="product_qty_update">
                            <b>Quantity</b>
                            <input type="text" name="product_qty_update" class="form-control form-control-lg product_qty_updatee" value="<?=$row['qty']?>" id="product_qty_update" >
                        </label>
                    
                        <label for="product_price_update">
                        <b>Price Tag</b>
                        <input type="text" name="product_price_update" class="form-control form-control-lg product_price_update" value="<?=$row['price']?>" id="product_price_update">
                        </label>
                    </div>

                    <div class="btn-group mb-3">
                        <button type="submit" name="updateButton" class="btn btn-lg btn-dark btn-lg product_update_button" >Update</button>
                        <a href="welcome.php" class=' btn btn-primary btn-lg mx-2 p-2 text-center'>Back</a>
                    </div> <p class="text-center mb-3"><span>Price Tag: $</span><?=(($row['price'])/100)?></p>
                </form>
                  
                  </div>
                <?php
                }
            }
         } ?>
              
            </div>
           
        </div>
    </div>
</div>
<?php include_once('../includes/sub-footer.php'); ?>