<?php 
include_once('../includes/connect.php');
include_once('../model/ads.php');
if($_SERVER['REQUEST_METHOD'] === "POST"){
 $delete_id = intval(trim($_POST['id']));

 if(!empty($delete_id)){
    if(delete_ads($delete_id)){
        echo "<p class='text-success text-center'>File deleted succcessfully!</p>";
    
    
        }else{
            echo "<p class='text-danger text-center'>Couldn't delete this file</p>";
        }
    }else{ 
        echo "<p class='text-danger text-center'>An empty file sent</p>";
    }
       

}
        
