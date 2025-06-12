<?php
include_once('../includes/connect.php');
include_once('../includes/fetchusers.php');


$select_all_users = "select * from user_tab";
$result = mysqli_query($conn, $select_all_users);

if($result){ $n =1 ;
  ?> 
   <div class='p-4 bg-light'>
    <h3 class="p-2 mt-2 text-dark text-center"> <strong>User Details</strong></h3>
    <table class="table table-hover">
      <tr class='bg-dark text-light p-4'>
        <th>#</th>
         <th>Username</th>
          <th>LastName</th>
          <th>FirstName</th>
          <th>Email-ID</th>
          <th>Action</th>
    </tr>
   <?php while( $row = mysqli_fetch_assoc($result)){
   
     echo "<tr>
           <td>".$n++."</td>"."
            <td>".$row['username']." </td>
            <td>".$row['last_name']." </td>
            <td>".$row['last_name']."</td>
            <td>".$row['email']."</td>
            <td>" ?>
                <div class='btn-group d-flex'>
                    <a href="./actions.php?update_id=<?=$row['user_id']?>" class='btn btn-sm btn-primary mx-2  p-2 button_edit-user' > Edit</a>
                    <a href="./actions.php?delete_id=<?=$row['user_id']?>" class='btn btn-sm btn-danger p-2 button_edit-user' > Delete</a>
                 </div>
           <?php echo "</td>
            </tr>";
   }
   

}else{
    die(mysqli_error($result));
}?>
</table>
</div>