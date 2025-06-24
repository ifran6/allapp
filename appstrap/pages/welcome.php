<?php
session_start();
$pageName = "Admin";
$topic = "Panel";
include_once('../includes/paging.php');
include_once('../includes/connect.php');
include_once('../includes/fun_utility.php');
include_once('../includes/sub-header.php');
include_once('../model/product.php');
                   
if(!isset($_SESSION['user_email'])){ 
    header("Location:./user_action.php");
    exit();

     }
     
      $sql = "SELECT COUNT(*) AS users FROM user_tab";
      $pending_sql = "SELECT COUNT(*) AS users FROM user_tab WHERE is_active = 0";
      $is_active_sql = "SELECT COUNT(*) AS users FROM user_tab WHERE is_active = 0";
                                                                          
                                
     ?>

    

  <div class="sidebar">
    <img src="../assets/images/me.jpg" class="admin-img" alt="Admin">
    <p class="text-center"><?php echo ucwords($_SESSION['user_names']); ?></p>
     <?php
        if(isset($_SESSION['user_email'])) include_once('../includes/adm_nav.php');
      ?>
  </div>

  <div class="main-content">
    <div class="dashboard-title">Dashboard</div>

      <div class="d-users">
          <div class="row my-3">
          <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-users'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                      (<?=userCounter($sql)?>) | All Users  (<?=userCounter($pending_sql)?>)
                      <br>
                        Pending | Active
                      (<?=userCounter($is_active_sql)?>)</p>
                    </a>
                </p>
         </div>
      </div>

      <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-user-tie'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                       <?php  $sql = "SELECT COUNT(*) AS users FROM user_tab WHERE roles = 1";?>
                       <?=userCounter($sql)?> | Staffs
                      </p>
                    </a>
                </p>
            </div>
      </div>

       <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-user'></i>
                <p class="display-7">
                   <?php  $sql = "SELECT COUNT(*) AS users FROM user_tab WHERE roles = 0";?>
                   <a href="#" class="viewUser text-dark"> 
                        (<?=userCounter($sql)?>) | Admins
                      </p>
                    </a>
                </p>
            </div>
      </div>

      </div>

     <div class="row my-3">
          <div class="col md-4">
             <?php 
                  $sql = "SELECT COUNT(*) AS item FROM product";
                ?> 

            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-comment'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                      (<?=productCounter($sql)?>) | Total Product  
                     </p>
                    </a>
                </p>
         </div>
      </div>

      <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-comment'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                       <?php  $sql =  "SELECT COUNT(*) AS item FROM product WHERE is_active = 1 ";?>
                       <?=productCounter($sql)?> | Approved Products
                      </p>
                    </a>
                </p>
            </div>
      </div>

       <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-comment'></i>
                <p class="display-7">
                   <?php  $sql = "SELECT COUNT(*) AS item FROM product WHERE is_active = 0 ";?>
                   <a href="#" class="viewUser text-dark"> 
                        (<?=productCounter($sql)?>) | Pending Product
                      </p>
                    </a>
                </p>
            </div>
      </div>

      </div>

    </div>
  </div>

  <?php include_once('../includes/sub-footer.php'); ?>