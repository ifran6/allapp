<?php
include_once('../includes/connect.php');
// include_once('../includes/fetchusers.php');


$select_all_users = "SELECT * FROM product ORDER BY id DESC";
$result = mysqli_query($conn, $select_all_users);

if($result){ $n =1 ;
  ?> 
   <div class='p-4 bg-light'>
    <h3 class="p-2 mt-2 text-dark text-center"> <strong>Product List</strong></h3>
    <p class="errBox"></p>
    <div class="my-3"><a href="add_product.php" class="btn btn-secondary"> <i class="fa fa-add"></i> Add Product</a></div>
    <table class="table table-bordered">
      <tr class='bg-dark text-light p-4'>
        <th>#</th>
         <th>Product</th>
          <th>Category</th>
          <th>Description</th>
          <th>Qty</th>
           <th>Price</th>
          <th>Action</th>
    </tr>
   <?php while( $row = mysqli_fetch_assoc($result)){
   
     echo "<tr>
           <td>".$n++."</td>"."
            <td>".$row['product_name']." </td>
            <td>".$row['category']." </td>
            <td>".$row['product_description']."</td>
            <td>".$row['qty']."</td>
          <td>".$row['price']."</td>
            <td>" ?>
                <div class='btn-group d-flex'>
                    <a href="./actions.php?edit_id=<?=$row['id']?>" class='btn btn-sm btn-primary mx-2  p-2 button_edit-user w-50' title="<?="created on: ".$row['created_at']?>" ><i class='fa fa-folder-open'></i> Open</a>

                    <a href="./add_product.php" class='btn btn-sm btn-dark mx-2  p-2 button_add_product w-50' ><i class='fa fa-add'></i> Add Product</a>


                    <button class="btn btn-sm btn-danger btn_delete-product w-50" name="delete-product" id="delete_product" data-id="<?=$row['id']?>"> <i class='fa fa-trash'></i> Delete</button>
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