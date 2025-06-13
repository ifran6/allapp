<?php
include_once('connect.php');
include_once('fun_utility.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
   
     $selected_role = trim($_POST['select_role']);
     $role_Id = trim($_POST['role_id']);

   if(!empty($selected_role)){
       $sql = "UPDATE user_tab SET role = '$selected_role' WHERE user_id = '$role_Id'  LIMIT 1";
         if(updates($sql, $updateId = $role_Id)){            
             echo "<p class='text-danger text-center'>Failed to Save</p>";
             return false;
         }else{
            return true;
         }
     
   }else{
        echo "<p class='text-danger text-center'>Choose Role</p>";
        return false;
   }

}