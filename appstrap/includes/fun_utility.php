<?php
 
 function userCounter($sql){
    global $conn;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            echo $row['users'];
        }else{
            echo "user not found";
        }
   }

function mailHandler($email,$name){
    $to = $email;
    $subject = "Registeration Successful";
    $message = "Hello $name, \n\n Thank you for registering\n\n Regards,\n Your website Team";
    $header = "From:no-reply@eisofttechnologie.com";

    if(mail($to,$subject,$message,$header)){
        echo "Registration successful. Confirmation email sent";
    }else{
         echo "Registration successful. but email couldn't be sent";
    }
}

function isUsernameTaken($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT 1 FROM user_tab WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $taken = $stmt->num_rows > 0;
    $stmt->close();
    return $taken;
}

function isEmailValid($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
      if(filter_var($email, FILTER_SANITIZE_EMAIL)){
        return $email;
    }
  }
}

function isEmailTaken($email) {
    global $conn;
      $stmt = $conn->prepare("SELECT 1 FROM user_tab WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $taken = $stmt->num_rows > 0;
        $stmt->close();
        return $taken;
}


function inserter($username, $email, $password, $first_name, $last_name, $is_active, $created_at, $updated_at){
    global $conn;
    $role = 2;
    $stmt = $conn->prepare("INSERT INTO user_tab(username, email, password_hash, first_name, last_name, role, is_active, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssiiss", $username, $email, $password, $first_name, $last_name, $is_active, $role, $created_at, $updated_at);

//  $result = $conn->query($insert_query);
    if($stmt->execute()){
        echo "<p class='text-success'> Congratulation! </p>";
        header("location:.../user_action.php");
        exit();
    }else{
        die(mysqli_error("<p class='text-danger'>".$conn->error." </p>"));
    }
                
}


function updates($sql, $updateId){
       global $conn;
         if($conn->query($sql)){
              echo "<p class='text-success'> User identity ".$updateId." Update Successfully!! </p>";
     }
}

function deletes($sql, $updateId){
       global $conn;
         if($conn->query($sql)){
              echo "<p class='text-success'> User identity ".$updateId." Delete Successfully!! </p>";
     }
}