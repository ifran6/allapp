<?php
 
 function userCounter(){
    global $conn;
        $sql = "SELECT COUNT(*) AS users FROM user_tab";
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





// function insertUser($sqli, $types, $field_set){
//     global $conn;
//     $stmt = $conn->prepare($sqli);
//     $stmt->bind_param($field_set);

// //  $result = $conn->query($insert_query);
//     if($stmt->execute()){
//         echo "<p class='text-success'> Congratulation! </p>";
//         header("location:.../user_action.php");
//         exit();
//     }else{
//         die(mysqli_error("<p class='text-danger'>".$stmt." </p>"));
//     }
                
// }

function inserter($username, $email, $password, $first_name, $last_name, $is_active, $created_at, $updated_at){
    global $conn;
    $role = 0;
    $stmt = $conn->prepare("INSERT INTO user_tab(username, email, password_hash, first_name, last_name, is_active, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?)");
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