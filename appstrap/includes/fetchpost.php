<?php
include_once('../includes/connect.php');
// include_once('../includes/fetchusers.php');


$select_all_users = "SELECT * FROM posts ORDER BY id DESC";
$result = mysqli_query($conn, $select_all_users);

if($result){ $n =1 ;
  ?> 
   <div class='p-4 bg-light'>
    <h3 class="p-2 mt-2 text-dark text-center"> <strong>Post List</strong></h3>
    <p class="errBox"></p>
    <div class="my-3"><a href="create_post.php" class="btn btn-secondary" ><i class='fa fa-add'></i> Create Post</a></div>
    <table class="table table-bordered">
      <tr class='bg-dark text-light p-4'>
        <th>#</th>
         <th>Post name</th>
          <th>Category</th>
          <th>Content</th>
           <th>Author</th>
            <th>Statu</th>
         
          <th>Action</th>
    </tr>
   <?php while( $row = mysqli_fetch_assoc($result)){
   
     echo "<tr>
           <td>".$n++."</td>"."
            <td>".$row['title']." </td>
            <td>"?> 
            <?=$row['category'] == 0 ? 'Non-Tech':'Technology'?>
            <?php echo " </td>
            <td>".$row['content']." </td>
            <td>".$row['author']." </td>" ?>
             <td> <?=$row['statu'] == 0 ? "<button class='btn-warning text-center p-2 btn-sm' role='alert'>Pending </button>":"<button class='btn-success text-center p-2 btn-sm' role='alert'>Approved </button>"?></td>
          
           <?php echo "<td>" ?>
                <div class='btn-group d-flex'>
                    <a href="./post_actions.php?edit_post_id=<?=$row['id']?>" class='btn btn-sm btn-primary mx-2  p-2 button_edit_post w-50' title="<?="created on: ".$row['created_at']?>" > <i class='fa fa-folder-open'></i> Open</a>

                    <a href="./create_post.php" class='btn btn-sm btn-dark mx-2  p-2 button_add_post w-50' ><i class='fa fa-add'></i> Add Post</a>

                    <button class="btn btn-sm btn-danger btn_delete-post w-50" name="delete-post" id="delete_post" data-id="<?=$row['id']?>"> 
                     <i class='fa fa-trash'></i> Delete</button>
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