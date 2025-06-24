<?php
include_once('connect.php');  
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
      
       if($stmt = $conn->prepare("SELECT * FROM user_tab WHERE email = ?"))
       {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $sql = $stmt->get_result();

            if($sql->num_rows === 1){
                $user = $sql->fetch_assoc();
            //    if(password_verify($password, $user['password_hash'])){
            //       echo "<p class='alert alert-success p-2'> logging successfully!</p>";
            //    }else{
            //      echo "<p class='alert alert-danger p-2'> Invalid Login!</p>";
            //    }
             if($password == $user['password_hash']){
                session_start();
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_id'] = $user['user_id'];
                 $_SESSION['user_names'] = $user['last_name'] ." ". $user['first_name'] ;
                 
                $em = "Login Successfully!!";
                header("location:../pages/welcome.php");
                exit();
             }else{
                 $em = "<p class='text-danger'> Couldn't Login</p>";
                  header("location:../pages/user_action.php?error=$em");
                  exit();
             }
            }else{
                $em = "<p class='text-danger p-2'> No User Found!</p>";
                header("location:../pages/user_action.php?error=$em");
                exit();
            }
       }

       

    }else{
        echo "<p class='alert alert-success p-2'> Invalid Attempt!</p>";
    }

    // echo $error;
}