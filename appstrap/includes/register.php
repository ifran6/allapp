<?php
include_once('connect.php');
include_once('fun_utility.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $_SERVER['REQUEST_METHOD'] == 'POST'
    $username = trim($_POST['username']);
    $last_name = trim($_POST['last_name']);
    $first_name = trim($_POST['first_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPass = trim($_POST['confirm_password']);
    $is_active = 0;
 

   
    // isset($username, $email, $password, $confirmPass)
    if(isset($username, $email, $password, $last_name, $first_name, $confirmPass) && !empty($username || $last_name || $first_name || $email || $password || $confirmPass)){
        $sql = "SELECT * FROM user_tab WHERE username = ?";
        // if(isuserTaken($sql)){
        //     echo "shuuuuu!";
        // }
      if($password == $confirmPass){
            //  echo "<p class='alert alert-success'> Congratulation!</p>";
            $stmt = $conn->prepare("SELECT * FROM user_tab WHERE username = ?");
            $stmt->bind_param("s", $username);
           if($stmt->execute()){
                 $result = $stmt->get_result();
             if($result->num_rows > 0){
                echo "<p class='text-danger'> Username is not avaliable !</p>";
             }else{
                 //  Email check
            $stmt = $conn->prepare("SELECT * FROM user_tab WHERE email = ?");
            $stmt->bind_param("s", $email);

            if($stmt->execute()){
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    echo "<p class='text-danger'> Email already taken!</p>";
                }else{
                    //   $is_active = 0;
                    // // $created_at = "NOW()";
                    // // $updated_at = "NOW()";

                    //  $sqli = "INSERT INTO user_tab(username, email, password_hash, first_name, last_name, is_active,created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)";
                    //   $types = "sssssiss";
                    
                    //  $field_set = "$username, $email, $password, $first_name, $last_name, $is_active, $created_at, $updated_at";
                    // // insertUser($sqli, $type, $field_set)
                      
                    if(inserter($username, $email, $password, $first_name, $last_name, $is_active, $created_at = `NOW()`, $updated_at = `NOW()`)){echo "<p class='text-success'> User saved! !</p>";}
                    else{echo "<p class='text-danger'> User not saved! !</p>";}
                }
            }else{
                  echo "<p class='text-danger'> Failed from Server !</p>";
            }
             }
           }else{
              echo "<p class='text-danger'> Failed from Server !</p>";
           }
            
          }else{
             echo "<p class='text-danger'> Passwords doesn't match!</p>";
          }
    }else{
        echo "<p class='textt-danger'> Empy field not allowed!</p>";
    }
}


