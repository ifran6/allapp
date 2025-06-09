<?php
include_once('connect_net.php');
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirm-password'];

    if(!empty($username) || !empty($email) || !empty($password) || !empty($confirmPass)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          if($password == $confirmPass){
             echo "<p class='alert alert-success'> Congratulation!</p>";
                      
            $stmt = $conn->prepare("SELECT * FROM user_app WHERE email = ?");
            $stmt->bind_param("s", $email);

            if($stmt->execute()){
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    echo "<p class='alert alert-danger'> Email already taken!</p>";
                }else{
                     echo "<p class='alert alert-success'> Congratulation!</p>";
                }
            }else{
                  echo "<p class='alert alert-success'> Failed from Server !</p>";
            }
            
          }else{
                       echo "<p class='alert alert-danger'> Passwords doesn't match!</p>";
          }
        }else{
            echo "<p class='alert alert-danger'> Invalid Email Address</p>";
             
        }
        
    }else{
        echo "<p class='alert alert-danger'> Empy field not allowed!</p>";
    }
}