<?php
require_once 'connect.php';
require_once 'fun_utility.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $msg = trim($_POST['msg']);

    if(!empty($fullname && $email && $msg)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql ="INSERT INTO contact(name, email, msg)VALUES('$fullname', '$email', '$msg')";
            if(insert_data($sql)){
                echo "success";
                header("Refresh:5; url=contact.php");
                exit();
            }else{echo "error occured";}
        }else{
            echo "<p class='text-danger'>Invalid Email Address!</p>";
        }
    }else{
        echo "<p class='text-danger'>Empty field was submitted!</p>";
    }
}
