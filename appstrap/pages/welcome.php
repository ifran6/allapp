<?php
session_start();
$pageName = "Admin";
$topic = "Panel";
include_once('../includes/paging.php');
include_once('../includes/connect.php');
include_once('../includes/fun_utility.php');
include_once('../includes/sub-header.php');
                   
if(!isset($_SESSION['user_email'])){ 
    header("Location:./user_action.php");
    exit();

     } ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
         
            <main>
                <aside class='d-sm-block col-sm-12 col-md-2'>
                  <?php
                        if(isset($_SESSION['user_email'])) include_once('../includes/adm_nav.php');
                  ?>
                     
                </aside>

                <section class="col-sm-12 col-md-10">
                    <div class="adm-header bg-dark">
                        <div class="adm-header-box">
                          <h2 class="p-2 text-center text-light">Dashboard</h2>
                            
                        </div>
                        
                    <div class="nav-boxer">
                        <!-- <a href="#" class="btn btn-dark" id="viewUser"><i class="badge"></i>View Users</a> -->
                        <a href="#" class="btn btn-secondary btn-lg">Notification</a>
                    </div>
                  </div>
                    <div class="d-users">
                        <div class="card_box">
                            <div class="user-card col-sm-12 col-sm-4">
                                  <div>
                                     <img src="../assets/images/me.jpg" 
                                     alt="<?=$_SESSION['user_names']?>" 
                                    class="img-responsive  img-rounded user__card-img m-2">
                                  </div>
                                  <?php
                                     $sql = "SELECT COUNT(*) AS users FROM user_tab";
                                     $pending_sql = "SELECT COUNT(*) AS users FROM user_tab WHERE is_active = 0";
                                     $is_active_sql = "SELECT COUNT(*) AS users FROM user_tab WHERE is_active = 0";
                                                                          
                                  ?>
                                  <div class="p-4"> <h4 class="user-title text-center">
                                    <a href="#" class="btn btn-sm btn-light viewUser"> <small>(<?=userCounter($sql)?>) | All Users  (<?=userCounter($pending_sql)?>) Pending | Active(<?=userCounter($is_active_sql)?>)</small></h4></a></div>
                            </div>



                            <div class="user-card col-sm-12 col-sm-4">
                                  <div>
                                     <img src="../assets/images/me.jpg" 
                                     alt="<?=$_SESSION['user_names']?>" 
                                    class="img-responsive  img-rounded user__card-img m-2">
                                  </div>
                                  <?php  $sql = "SELECT COUNT(*) AS users FROM user_tab WHERE role = 0";?>
                                  <div class="p-4"> <h4 class="user-title text-center">
                                    <small><?=userCounter($sql)?> | Staffs</small>
                                  </h4></div>
                            </div>

                            <div class="user-card col-sm-12 col-md-4">
                                <div>
                                     <img src="../assets/images/me.jpg" 
                                     alt="<?=$_SESSION['user_names']?>" 
                                    class="img-responsive  img-rounded user__card-img m-2">
                                  </div>
                                   <?php  $sql = "SELECT COUNT(*) AS users FROM user_tab WHERE role = 1";?>
                                  <div class="p-4"> <h4 class="user-title text-center">
                                    <small>(<?=userCounter($sql)?>) | userAdmins</small>
                                  </h4></div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include_once('../includes/sub-footer.php'); ?>