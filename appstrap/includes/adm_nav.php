<div class="col-sm-12">
     <ul class='core-nav text-left'>
    <div class='text-center'>
        <img src="../assets/images/me.jpg" alt="<?=$_SESSION['user_names']?>" 
        class="img-responsive  img-rounded profile_img m-2">
    
       <p class='text-center text-light normal-font'>  
        <strong><?php echo ucwords($_SESSION['user_names']); ?></strong>
       </p>
</div>
   <li>
    <a href="welcome.php">
        Dashboard
    </a>
</li>
    <li> <a href="#">Manage User</a>
        <ul>
            <li> <a href="add_user.php">Add User</a></li>
            <li> <a href="#" id="openUser">Show User</a></li>
        </ul>
    </li>

    <li> <a href="#">Product</a>
        <ul>
            <li> <a href="add_product.php">Add Product</a></li>
             <li> <a href="multi_product.php">Multipe product</a></li>
            <li> <a href="#">View Products</a></li>
        </ul>
    </li>
    <li> <a href="#">ADS</a>
        <ul>
            <li> <a href="#">Add Post</a></li>
            <li> <a href="#">View Posts</a></li>
        </ul>
    </li>

     <li> <a href="logout.php">Logout</a></li>
</ul>
</div>