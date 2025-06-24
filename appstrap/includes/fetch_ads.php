<?php
include_once('../includes/connect.php');
// include_once('../includes/fetchusers.php');


$select_all_users = "SELECT * FROM ads_tab ORDER BY id DESC";
$result = mysqli_query($conn, $select_all_users);

if($result){ $n =1 ;
  ?> 
   <div class='p-4 bg-light'>
    <h3 class="p-2 mt-2 text-dark text-center"> <strong>ADS List</strong></h3>
    <p class="errBox"></p>
    <div class="my-3"><a href="add_ads.php" class="btn btn-secondary"> <i class="fa fa-add"></i> Add ADs</a></div>
    <table class="table table-bordered">
      <tr class='bg-dark text-light p-4'>
        <th>#</th>
         <th>Title</th>
          <th>Description</th>
          <th>Category</th>
         
          <th>Action</th>
    </tr>
   <?php while( $row = mysqli_fetch_assoc($result)){
   
     echo "<tr>
           <td>".$n++."</td>"."
            <td>".$row['ads_title']." </td>
            <td class='more_info'>".$row['ads_description']."</td>
             <td>"?>
             <?=($row['ads_category']) == 0 ? 'Non-tech':'Tech'?>
             
             <?php echo" </td>
            <td>" ?>
                <div class='btn-group d-flex'>
                    <a href="./ads_actions.php?ads_edit_id=<?=$row['id']?>" class='btn btn-sm btn-primary mx-2  p-2 button_edit-ads w-50' title="<?="created on: ".$row['created_at']?>"> <i class="fa fa-folder-open"></i> Open</a>

                    <a href="./add_ads.php" class='btn btn-sm btn-dark mx-2  p-2 button_add_ads w-50' ><i class="fa fa-add"></i> Create ADst</a>

                    <button class="btn btn-sm btn-danger btn_delete_ads w-50" name="delete" id="btn_delete_ads" data-id="<?=$row['id']?>"><i class="fa fa-trash"></i> Delete</button>
                 </div>
           <?php echo "</td>
            </tr>";
            // ($row['role']== 0)? 'Staff':(($row['role']== 1)? 'Admin':'Officer')
   }
   

}else{
    die(mysqli_error($result));
}?>
</table>
</div>