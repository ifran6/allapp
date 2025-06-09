<?php
include_once('connect_net.php');  
// $conn = connectToCharger();
if($_SERVER['REQUEST_METHOD'] === "POST"){
   

    // if(isset($_POST['lgnUser']) && isset($_POST['lgnPass'])){ 
        // $error = "";
        $username = $_POST['lgn-username'];
        $password = $_POST['lgn-password'];

    //     echo $username." ".$password;
    // }else{
    //     echo "not set";
    // }

    if(!empty($username) || !empty($password)){
      
       if($stmt = $conn->prepare("SELECT * FROM app_user WHERE email = ?"))
       {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $sql = $stmt->get_result();

            if($sql->num_rows === 1){
                $user = $sql->fetch_assoc();
               if(password_verify($password, $user['password'])){
                  echo "<p class='alert alert-success p-2'> logging successfully!</p>";
               }else{
                 echo "<p class='alert alert-danger p-2'> Invalid Password!</p>";
               }
            }else{
                echo  "<p class='alert alert-warning p-2'> No User Found!</p>";;
            }
       }

       

    }else{
        echo "<p class='alert alert-success p-2'> Invalid Attempt!</p>";
    }

    // echo $error;
}