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
           
                  <div class="form-box-container p-4 bg-light m-4 shadow">
                      <form class="form py-4 px-4 frm-add-multiproduct" method="POST">
                    <h3 class="text-center display-7">Add Product Bulky</h3>
                     <div class="err__msg text-center "></div>

                    <div class="form-group d-flex justify-content-between gap-2">
                        <label for="product_description" class="form-label mb-2">
                            <b>Decription</b>
                            <input type="text" name='product_description' class="form-control form-control-lg product_description" placeholder="Product Description" id="product_description">
                        </label>
                       
                    </div>
                     <div class="form-group">
                         <label for="product_image" class="form-label">
                            <b>Image</b>
                            <input type="file" name='product_image' class="form-control form-control-lg product_image" placeholder="Upload Image" id="product_image">
                        </label>
                    </div>


                    <div class="btn-group">
                       <button type="submit" name="button_multiProduct" class="btn btn-lg btn-dark">Add Product</button>

                        <a href="welcome.php" class=' btn btn-lg btn-primary mx-2 p-2 text-center'>Back</a>
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