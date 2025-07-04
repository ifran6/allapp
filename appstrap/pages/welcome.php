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
    <img src="../assets/images/avatar.jpg" class="admin-img" alt="Admin">
    <p class="text-center"><?php echo ucwords($_SESSION['user_names']); ?></p>
     <?php
        if(isset($_SESSION['user_email'])) include_once('../includes/adm_nav.php');
      ?>
  </div>

  <div class="main-content">
    <div class="dashboard-title">Dashboard</div>

      <div class="d-users bg-light">
          <div class="row my-3">
          <div class="col md-4">
            <div class="card-box text-center my-4">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-users display-3'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                     <span class="badge bg-secondary"><?=userCounter($sql)?></span> All Users 
                      <br>
                      <span class="badge bg-danger"><?=userCounter($pending_sql)?></span>
                        Pending | Active
                      <span class="badge bg-success"><?=userCounter($is_active_sql)?></span></p>
                    </a>
                </p>
         </div>
      </div>

      <div class="col md-4">
            <div class="card-box text-center my-4">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-user-tie display-3'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                       <?php  $sql = "SELECT COUNT(*) AS users FROM user_tab WHERE roles = 1";?>
                       <span class="badge bg-secondary"><?=userCounter($sql)?> </span> | Staffs
                      </p>
                    </a>
                </p>
            </div>
      </div>

       <div class="col md-4">
            <div class="card-box text-center my-4">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-user display-3'></i>
                <p class="display-7">
                   <?php  $sql = "SELECT COUNT(*) AS users FROM user_tab WHERE roles = 0";?>
                   <a href="#" class="viewUser text-dark"> 
                        <span class="badge bg-secondary"><?=userCounter($sql)?></span> | Admins
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
                 <i class='fa fa-briefcase display-3'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                      <span class="badge bg-secondary"><?=productCounter($sql)?></span> | Total Product  
                     </p>
                    </a>
                </p>
         </div>
      </div>

      <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-briefcase display-4'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                       <?php  $sql =  "SELECT COUNT(*) AS item FROM product WHERE is_active = 1 ";?>
                          <span class="badge bg-success"><?=productCounter($sql)?></span> | Approved Products
                      </p>
                    </a>
                </p>
            </div>
      </div>

       <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-briefcase display-4'></i>
                <p class="display-7">
                   <?php  $sql = "SELECT COUNT(*) AS item FROM product WHERE is_active = 0 ";?>
                   <a href="#" class="viewUser text-dark"> 
                        <span class="badge bg-danger"><?=productCounter($sql)?></span> | Pending Product
                      </p>
                    </a>
                </p>
            </div>
      </div>
      </div>

      <!-- ADs -->
        <div class="row my-3">
          <div class="col md-4">
             <?php 
                  $sql = "SELECT COUNT(*) AS item FROM ads_tab";
                ?> 

            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-bullhorn display-3'></i>
                <p class="display-7">
                   <a href="#" class=" text-dark"> 
                      <span class="badge bg-secondary"><?=productCounter($sql)?></span> | Total ADs  
                     </p>
                    </a>
                </p>
         </div>
      </div>

      <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-bullhorn display-4'></i>
                <p class="display-7">
                   <a href="#" class="text-dark"> 
                       <?php  $sql =  "SELECT COUNT(*) AS item FROM ads_tab WHERE is_active = 1 ";?>
                      <span class="badge bg-success"><?=productCounter($sql)?></span> | Approved ADs
                      </p>
                    </a>
                </p>
            </div>
      </div>

       <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-bullhorn display-4'></i>
                <p class="display-7">
                   <?php  $sql = "SELECT COUNT(*) AS item FROM ads_tab WHERE is_active = 0 ";?>
                   <a href="#" class="viewUser text-dark"> 
                        <span class="badge bg-danger"><?=productCounter($sql)?></span> | Pending ADs
                      </p>
                    </a>
                </p>
            </div>
      </div>

      </div>

      <!-- ADs -->

      <!-- post -->
         <div class="row my-3">
          <div class="col md-4">
             <?php 
                  $sql = "SELECT COUNT(*) AS item FROM posts";
                ?> 

            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-comments display-3'></i>
                <p class="display-7">
                   <a href="#" class="text-dark"> 
                      <span class="badge bg-secondary"><?=productCounter($sql)?></span> | Total Post  
                     </p>
                    </a>
                </p>
         </div>
      </div>

      <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-comments display-4'></i>
                <p class="display-7">
                   <a href="#" class="viewUser text-dark"> 
                       <?php  $sql =  "SELECT COUNT(*) AS item FROM posts WHERE statu = 1 ";?>
                     <span class="badge bg-success">  <?=productCounter($sql)?></span> | Approved Post
                      </p>
                    </a>
                </p>
            </div>
      </div>

       <div class="col md-4">
            <div class="card-box text-center">
                <!-- <img src="../assets/images/me.jpg" alt=""> -->
                 <i class='fa fa-comments display-4'></i>
                <p class="display-7">
                   <?php  $sql = "SELECT COUNT(*) AS item FROM posts WHERE statu = 0 ";?>
                   <a href="#" class=" text-dark"> 
                        <span class="badge bg-danger"><?=productCounter($sql)?></span> | Pending Post
                      </p>
                    </a>
                </p>
            </div>
      </div>

      </div>
       <!-- post -->

    </div>
  </div>

  <?php include_once('../includes/sub-footer.php'); ?>