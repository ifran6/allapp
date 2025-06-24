<?php 
session_start();
include_once('../includes/connect.php');
include_once('../model/post.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $postTitle = trim($_POST['post_title']);
    $postContent = trim($_POST['post_content']);
    $postCategory = trim($_POST['post_category']);
    $statu = 0;
    $image = null;
    $user = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';

    if(!empty($postTitle) || !empty($postContent) || !empty($postCategory)){
        if(is_post_exist($postTitle)){
              echo "<p class='text-danger text-center'> Post already registered! </p>!"; 
        }else{
              $targetDir = "../uploads/";
                $image = time()."_".$postTitle."_".basename($_FILES['postUpload']['name']);
                if(move_uploaded_file($_FILES['postUpload']['tmp_name'], $targetDir.$image)){
                    $cretedDate = Date('Y-m-d H-i-s');
                    $data = array($postTitle, $postTitle."slug-001", $postCategory, $postContent, $user, $image,$statu,$cretedDate, $cretedDate);
                    if(insert_post($data)){
                        echo "<p class='text-success text-center' role='alert'> Post Created Successfully!</p>";
                    }else{
                        echo "<p class='text-danger text-center' role='alert'> Post not Created Successfully!</p>";
                    }
                }else{ 
                    echo "<p class='text-danger text-center' role='alert'> Couldn't save the image!</p>";
                }
            
        }
            
    }else{
        echo "<p class='text-danger text-center'> Look out for the empty field </p>!";   
    }
    
}