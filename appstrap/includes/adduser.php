<?php
include_once('connect.php');
include_once('fun_utility.php');
// Add new user here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $lastName = trim($_POST['lname']);
    $firstName = trim($_POST['fname']);
    $email = trim($_POST['usr__email']);
    $password = trim($_POST['pass']);
    $confirmPwd = trim($_POST['confirm-pass']);

    if (!empty($username) && !empty($lastName) && !empty($firstName) && !empty($email) && !empty($password) && !empty($confirmPwd)) {
        if ($password !== $confirmPwd) {
            echo "<p class='text-danger text-center'>Passwords do not match!</p>";
        } else {
        
            if(isUsernameTaken($username)){
                 echo "<p class='text-danger text-center'> Username is not avaliable! </p>";
            }else if(isEmailTaken($email)){
                     echo "<p class='text-danger text-center'> Email-ID is not avaliable! </p>";
                }else{
                    if(inserter($username, $email, $password, $first_name, $last_name, $is_active, $created_at = `NOW()`, $updated_at = `NOW()`)){echo "<p class='text-success'> User saved! !</p>";}
                    else{echo "<p class='text-danger'> User not saved! !</p>";}
                } 
            }
        
    } else {
        echo "<p class='text-danger text-center'>Empty fields are not allowed!</p>";
    }
}
