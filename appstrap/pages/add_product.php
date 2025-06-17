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
                      <form class="form py-4 px-4 frm-add-product" method="POST">
                    <h3 class="text-center display-7">Create Product</h3>
                     <div class="err__msg text-center "></div>
                    <div class="form-group d-flex gap-2">
                        <label for="product_name" class="form-label">
                            <b>ProductName</b>
                            <input type="text" name='product_name' class="form-control form-control-lg product_name" placeholder="ProductName" id="product_name">
                        </label>

                         <label for="product_name" class="form-label">
                            <b>Category</b>
                            <select name="product_category" class="form-control-lg product_category" id="product_category">
                                <option value="">Select Category</option>
                                <option value="0">Male</option>
                                <option value="1">Kids-Male</option>
                                <option value="2">Female</option>
                                <option value="3">Kids-Female</option>
                            </select>
                        </label>
                    </div>

                    <div class="form-group d-flex justify-content-between gap-2">
                        <label for="product_desc" class="form-label">
                            <b>Product Description</b>
                            <input type="text" name='product_desc' class="form-control form-control-lg product_desc" placeholder="Product Description" id="product_desc">
                        </label>
                        
                    </div>

                    <div class="form-group d-flex gap-2">
                        <label for="product_qty" class="form-label">
                        <b>Quantity</b>
                        <input type="text" name="product_qty" class="form-control form-control-lg product_qty" placeholder="Quantity" id="product_qty">
                        </label>

                         <label for="product_price" class="form-label">
                        <b>Product Price</b>
                        <input type="text" name="product_price" class="form-control form-control-lg product_price" placeholder="Price" id="product_price">
                        </label>
                    </div>

                    <div class="btn-group">
                       <button type="submit" name="button_single_product" class="btn btn-lg btn-dark">Add Product</button>

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