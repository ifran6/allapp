<?php
session_start();
include_once('connect.php');
include_once('fun_utility.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updateUsername = trim($_POST['update_username']);
    $updateLname = trim($_POST['update_lname']);
    $updateFname = trim($_POST['update_fname']);
    // $updateEmail = trim($_POST['update_email']);
    $updatePwd = trim($_POST['update_pass']);
    $updateId = trim($_POST['update_id']);


    if(isset($updateUsername, $updateLname, $updateFname, $updatePwd) && !empty($updateUsername || $updateLname || $updateFname || $updatePwd)){
        // echo $_SESSION['user_email']. $updateId;
        $sql = "UPDATE user_tab SET username = '$updateUsername', first_name = '$updateFname', last_name = '$updateLname',  password_hash = '$updatePwd', updated_at = NOW() WHERE user_id = $updateId LIMIT 1";
       updates($sql, $updateId);
      
    }else{
        echo "<p class='text-warning'> an Empty field is not allow! </p>";
    }
   
}