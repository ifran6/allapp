<?php
include_once('../includes/connect.php');
$pageName = "Admin";
$topic = "Create ADs";

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
           
                  <div class="form-box-container p-4 bg-light m-4" id="add__ads" enctype="multipart/form-data">
                      <form class="form py-4 px-4 frm-create-ads" method="POST" >
                    <h3 class="text-center display-7">Create ADs </h3>
                     <div class="ads_err__msg text-center "></div>
                    <div class="form-group d-flex gap-2">
                        <label for="ads_name" class="form-label">
                            <b>ADsName</b>
                            <input type="text" name='ads_name' class="form-control form-control-lg ads_name" placeholder="Name" id="ads_name">
                        </label>

                         <label for="ads_name" class="form-label">
                            <b>Category</b>
                            <select name="ads_category" class="form-control-lg ads_category" id="ads_category">
                                <option value="">Select Category</option>
                                <option value="0">Non-Tech</option>
                                <option value="1">Technology</option>
                               
                            </select>
                        </label>
                    </div>

                    <div class="form-group d-flex justify-content-between gap-2">
                        <label for="ads_desc" class="form-label">
                            <b>ADs Description</b>
                            <input type="text" name='ads_desc' class="form-control form-control-lg ads_desc" placeholder="ADs Description" id="ads_desc">
                        </label>
                        
                    </div>

                    <div class="form-group">
                         <label for="ads_file" class="form-label">
                        <b>Image</b>
                        <input type="file" name="adsUpload" class="form-control form-control-lg ads_file" placeholder="Upload" id="ads_file">
                        </label>
                    </div>

                    <div class="btn-group d-flex">
                       <button type="submit" name="ads_upload" class="btn btn-md btn-dark w-50"><i class='fa fa-add'></i> Create ADs</button>
                        <!-- <a href="#" class=' btn btn-md btn-secondary mx-2 p-2 text-center w-50 ads_upload'>Batch Upload</a> -->
                        <a href="welcome.php" class=' btn btn-md btn-primary mx-2 p-2 text-center w-50'><i class='fa fa-arrow-right'></i> Back</a>
                    </div>
                </form>
            </div>

              
                  </div>
              
            </div>
           
        </div>
    </div>
</div>
<?php include_once('../includes/sub-footer.php'); ?>