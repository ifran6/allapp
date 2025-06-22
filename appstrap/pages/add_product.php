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
           
                  <div class="form-box-container p-4 bg-light m-4 box_wrapper" id="add__product">
                      <form class="form py-4 px-4 frm-add-product" method="POST" >
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
                                <option value="none">Select Category</option>
                                <option value="1">Male</option>
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

                    <div class="btn-group d-flex">
                       <button type="submit" name="button_single_product" class="btn btn-md btn-dark w-50">Add Product</button>
                        <a href="#" class=' btn btn-md btn-secondary mx-2 p-2 text-center w-50 batch_product'>Batch Upload</a>
                        <a href="welcome.php" class=' btn btn-md btn-primary mx-2 p-2 text-center w-50'>Back</a>
                    </div>
                </form>
            </div>

                <!-- multiple -->
                    <div class="form-box-container p-4 bg-light m-4 box_wrapper" id="add_product_byBatch">
                    <form class="form py-4 px-4 frm-add-multiproduct" method="POST" >
                    <h3 class="text-center display-7">Add Product Bulky</h3>
                     <div class="err-msg text-center "></div>

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


                    <div class="btn-group d-flex">
                       <button type="submit" name="button_multiProduct" class="btn btn-md btn-dark w-50 batch__products">Add Product</button>
                        <a href="#" class=' btn btn-md btn-secondary mx-2 p-2 text-center w-50 individual_product' id="individual_product">Single Add</a>
                        <a href="welcome.php" class=' btn btn-md btn-primary mx-2 p-2 text-center w-50'>Back</a>
                    </div>
                </form>
                <!-- multipble -->
                  </div>
                <?php
                }?>
            </div>
           
        </div>
    </div>
</div>
<?php include_once('../includes/sub-footer.php'); ?>