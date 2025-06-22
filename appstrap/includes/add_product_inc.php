<?php
include_once('../model/product.php');

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $product_name = trim($_POST['product_name']);
    $product_category = trim($_POST['product_category']);
    $product_description = trim($_POST['product_desc']);
    $product_Qty = trim($_POST['product_qty']);
    $product_price = trim($_POST['product_price']);

    if(!empty($product_name) && $product_category !== "none" && !empty($product_description) && !empty($product_Qty) && !empty($product_price)){
       if(!is_nan($product_Qty || $product_price)){
        //   echo "<p class='text-success'>".$product_category."$".(($product_price)/100)."</p>";
      
      if(is_product_exist($product_name)){
         echo "<p class='text-danger'> User exists</p>";
      }else{ 
         $active = 0;
        $dateNow = date('Y-m-d H:i:s');
        $data = array($product_name,$product_category, $product_description,$product_Qty, $product_price,$dateNow, $dateNow,$active);

        if(insert_product($data,)){
              echo "<p class='text-success'> Product saved successfully!</p>";
        }else{
             echo "<p class='text-danger'> failed to save product </p>";
        }
      }

       }else{
             echo "<p class='text-danger'> is not a number</p>";
       }
    }else{
        echo "<p class='text-danger'> Please lookout for empty field </p>";
    }
}