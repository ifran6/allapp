<?php
include_once('connect.php');
include_once('../model/product.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $product_name_update = trim($_POST['product_name_update']);
    $product_description_update = trim($_POST['product_description_update']);
    $product_category_update = trim($_POST['product_category_update']);
    $product_qty_update = trim($_POST['product_qty_update']);
    $product_price_update = trim($_POST['product_price_update']);
    $product_edit_id = trim($_POST['product_edit_id']);

    if(!(empty($product_name_update || $product_description_update || $product_category_update || $product_qty_update || $product_price_update))){
        $updated_date = Date('Y-m-d H:i:s');
        $data = array($product_name_update, $product_description_update, $product_category_update, $product_qty_update, $product_price_update, $updated_date, $product_edit_id);
          if(update_product($data)){
                 echo  '<p class="text-success text-center"> Updated '.$product_edit_id.' Successfully!</p>';
          }else{
             echo  '<p class="text-danger text-center"> failed to update this '.$product_edit_id.'</p>';
          }
    }else{
         echo  '<p class="text-danger text-center"> Checkout the field!</p>';
    }

}

