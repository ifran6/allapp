<?php 
include_once('../includes/connect.php');
include_once('../model/ads.php');
if($_SERVER['REQUEST_METHOD'] === "POST"){
   

    $ads__name = trim($_POST['ads_name']);
    $ads__category = trim($_POST['ads_category']);
    $ads__desc = trim($_POST['ads_desc']);
    
    $image = null;

    if(!empty($ads__name) || !empty($ads__category) || !empty($ads__desc)){
          
            if(is_Ads_exist($ads__name)){
                echo "<p class='text-danger text-center' role='alert'> Ads not Avaliable</p>";
            }else{
                $targetDir = "../uploads/";
                $image = time()."_".basename($_FILES['adsUpload']['name']);
                if(move_uploaded_file($_FILES['adsUpload']['tmp_name'], $targetDir.$image)){
                    $is_active = 0;
                    $cretedDate = Date('Y-m-d H-i-s');
                    $data = array($ads__name, $ads__desc, $ads__category, $image, $is_active, $cretedDate, $cretedDate);
                    if(insert_ads($data)){
                        echo "<p class='text-success text-center' role='alert'> Ads Created Successfully!</p>";
                    }else{
                        echo "<p class='text-danger text-center' role='alert'> Ads not Created Successfully!</p>";
                    }
                }else{ 
                    echo "<p class='text-danger text-center' role='alert'> Couldn't save the image!</p>";
                }
            }
            
    }else{
        echo "<p class='text-danger text-center'> Look out for the empty field </p>!";   
    }
}