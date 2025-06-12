<?php
session_start();
$pageName = "Admin";
$topic = "Panel";

include_once('../includes/connect.php');
include_once('../includes/fun_utility.php');
include_once('../includes/sub-header.php');
                   
if(!isset($_SESSION['user_email'])){ 
    header("Location:./user_action.php");
    exit();

    
    // $sql = "SELECT COUNT(*) AS users FROM user_tab";
    // $result = $conn->query($sql);
    //  if($result->num_rows > 0){
    //    echo $row = $result->fetch_assoc();
    //  }else{
    //     echo "user not found";
    //  }

     } ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="adm-header bg-dark">
                 <div class="adm-header-box">
                   <p class="text-light p-3"> <?php echo strtoupper($_SESSION['user_names'])." | ". strtolower($_SESSION['user_email']); ?>
                  </p>
                    
                 </div>
                 
                 <div class="nav-boxer">
                     <a href="#" class="btn btn-dark" id="viewUser"><i class="badge"><?php 
                     userCounter(); ?></i>View Users</a>
                    <a href="logout.php" class="btn btn-secondary btn-lg">Logout</a>
                </div>
            </div>

            <main>
                <aside>
                   <ul class='core-nav'>
                    <li> <a href="welcome.php">Dashboard</a></li>
                    <li> <a href="#">user</a>
                        <ul>
                            <li> <a href="add_user.php">Add User</a></li>
                            <li> <a href="#">Product-2</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Servies</a></li>
                   </ul>
                     
                </aside>
                <section>
                    <div class="d-users"></div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include_once('../includes/sub-footer.php'); ?>