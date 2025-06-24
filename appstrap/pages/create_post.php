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
                      <form class="form py-4 px-4 frm-create-post" method="POST" >
                    <h3 class="text-center display-7">Create Post</h3>
                     <div class="post_err__msg text-center "></div>
                    <div class="form-group d-flex gap-2">
                        <label for="post_title" class="form-label">
                            <b>Title</b>
                            <input type="text" name='post_title' class="form-control form-control-lg post_title" placeholder="Name" id="post_title">
                        </label>

                         <label for="post_category" class="form-label">
                            <b>Category</b>
                            <select name="post_category" class="form-control-lg post_category" id="post_category">
                                <option value="">Select Category</option>
                                <option value="0">Non-Tech</option>
                                <option value="1">Technology</option>
                               
                            </select>
                        </label>
                    </div>

                    <div class="form-group d-flex justify-content-between gap-2">
                        <label for="post_content" class="form-label">
                            <b>Post</b>
                            <textarea name='post_content' class="form-control form-control-lg post_content" placeholder="post Description" id="post_content" ></textarea>
                        </label>
                        
                    </div>

                    <div class="form-group">
                         <label for="post_file" class="form-label">
                        <b>Image</b>
                        <input type="file" name="postUpload" class="form-control form-control-lg post_file" placeholder="Upload" id="post_file">
                        </label>
                    </div>

                    <div class="btn-group d-flex">
                       <button type="submit" name="ads_upload" class="btn btn-md btn-dark w-50"><i class='fa fa-add'></i> Create Post</button>
                        <a href="welcome.php" class=' btn btn-md btn-primary mx-2 p-2 text-center w-50'> <i class='fa fa-arrow-right'></i> Back</a>
                    </div>
                </form>
            </div>

              
                  </div>
              
            </div>
           
        </div>
    </div>
</div>
<?php include_once('../includes/sub-footer.php'); ?>