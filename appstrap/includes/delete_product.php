<?php
include_once('connect.php');
include_once('../model/product.php');

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $data_id = intval(trim($_POST['id']));
    // $id = array($dataId);

    if(delete_product($data_id)){
         echo "deletin ".$data_id;
    }else{
        echo "no deleting ".$data_id;
    }
   
}