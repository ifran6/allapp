<?php
include_once('connect.php');
include_once('fun_utility.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
 $role_update_username = htmlspecialchars(($_POST[ 'add_role_username']));
 $role_update_lname = htmlspecialchars(($_POST[ 'add_role_lname']));
  $role_update_fname = htmlspecialchars(($_POST['add_role_fname']));
  // $role_update_pass = htmlspecialchars(($_POST['add_role_pass']));
  $role_update_selected = htmlspecialchars(($_POST['select_role']));
    //  $selected_role = trim($_POST['select_role']);
     $role_Id = intVal(trim($_POST['role_id']));

   if($role_update_selected !== "" &&  !empty($role_update_username && $role_update_lname && $role_update_fname && $role_Id)){
      //  $sql = "UPDATE user_tab SET role = '$selected_role' WHERE user_id = '$role_Id' LIMIT 1";
         $udate = Date('Y-m-d H-s-s');
           $data = array($role_update_username, $role_update_lname, $role_update_fname, $role_update_selected, $udate, $role_Id);

         if(update_user($data)){            
             echo "<p class='text-success text-center'> user updated successfully!".$role_Id." </p>";
           
         }else{
           echo "<p class='text-dnger text-center'>Failed to Save</p>";
         }
     
   }else{
        echo "<p class='text-danger text-center'>Role no given</p>";
        
   }

}