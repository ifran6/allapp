<?php
include_once('connect.php');
include_once('../model/post.php');

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $data_id = intval(trim($_POST['id']));
    // $id = array($dataId);

    if(delete_post($data_id)){
         echo "Delete post ".$data_id;
    }else{
        echo "Not able to delete Post ".$data_id;
    }
   
}