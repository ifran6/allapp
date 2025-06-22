<?php 
include_once('../includes/connect.php');
include_once('../model/ads.php');
if($_SERVER['REQUEST_METHOD'] ==="POST"){
    $ads__name = trim($_POST['ads_title_update']);
    $ads__category = trim($_POST['ads_category_update']);
    $ads__desc = trim($_POST['ads_descr_update']);
    $ads_update_id = intval(trim($_POST['ads_update_id']));
    $adsStatu = intval(trim($_POST['ads_statu_update']));
    $image = null;

    if(!empty($ads__name) || !empty($ads__category) || !empty($ads__desc) || !empty($adsStatu)){
          
          
                $targetDir = "../uploads/";
                $image = time()."_".basename($_FILES['adsUpload']['name']);
                if(move_uploaded_file($_FILES['adsUpload']['tmp_name'], $targetDir.$image)){
                    $createdDate = Date('Y-m-d H-i-s');
                    $data = array($ads__name, $ads__desc, $ads__category, $image, $adsStatu,$createdDate, $ads_update_id);
                    if(update_ads($data)){
                        echo "<p class='text-success text-center' role='alert'> Ads updated Successfully!</p>";
                    }else{
                        echo "<p class='text-danger text-center' role='alert'> Ads not be updated Successfully!</p>";
                    }
                }else{ 
                    echo "<p class='text-danger text-center' role='alert'> Couldn't save the image!</p>";
                }
            
            
    }else{
        echo "<p class='text-danger text-center'> Look out for the empty field </p>!";   
    }
}