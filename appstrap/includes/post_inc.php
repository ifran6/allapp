<?php 
session_start();
include_once('../includes/connect.php');
include_once('../model/post.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $postTitle = trim($_POST['post_title_update']);
    $postContent = trim($_POST['post_content_update']);
    $postCategory = trim($_POST['post_category_update']);
    $postStatu = trim($_POST['post_statu_update']);
    $post_id = intval(trim($_POST['post_update_id']));
    $image = null;
    $user = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';

    if(!empty($postTitle) || !empty($postContent) || !empty($postCategory) || !empty($postStatu)){
          
           
                $targetDir = "../uploads/";
                $image = time()."_".$postTitle."_".basename($_FILES['postUpload']['name']);
                if(move_uploaded_file($_FILES['postUpload']['tmp_name'], $targetDir.$image)){
                    $cretedDate = Date('Y-m-d H-i-s');
                    $data = array( $postTitle, $postCategory, $postContent, $user, $image, $postStatu, $cretedDate, $post_id);
                    if(update_post($data)){
                        echo "<p class='text-success text-center' role='alert'> Post Created Successfully!</p>";
                    }else{
                        echo "<p class='text-danger text-center' role='alert'> Post not Created Successfully!</p>";
                    }
                }else{ 
                    echo "<p class='text-danger text-center' role='alert'> Couldn't save the image!</p>";
                }
            
            
    }else{
        echo "<p class='text-danger text-center'> Look out for the empty field </p>!";   
    }
    
}