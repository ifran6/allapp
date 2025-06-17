<?php
if($_SERVER['REQUEST_METHOD']){
    $product_name = trim($_POST['product_name']);
    $product_category = trim($_POST['product_category']);
    $product_description = trim($_POST['product_desc']);
    $product_Qty = trim($_POST['product_qty']);
    $product_price = trim($_POST['product_price']);

    echo "<p class='text-success'>".$product_category."</p>";
}