<?php
include_once('includes/connect.php');
$pageName = "Contact";
$topic = "Main";

include_once('includes/header.php');
include_once('includes/nav.php');
?>

<section>
<div class="container-fluid py-4">
    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-sm-12">
              
               <div class="contact-box d-flex jusify-content-center">
                  <div class="contact-logo my-4 col-md-3 bg-light text-center p-4 flex-direction-column justify-content-center">
                    <i class="fa fa-headset display-3 m-4 p-4"></i>
                    <!-- <p class="display-6">Help Line</p> -->
                       <p  class='text-center p-2 bg-light text-dark'> 
                        <i class="fa fa-globe mx-2 "></i> www.ekoncept.com</p>

                        <p  class='text-center p-2 bg-light text-dark'> 
                        <i class="fa fa-inbox mx-2"></i> info@ekoncept.com | 
                       </p>

                        <p  class='text-center p-2 bg-light text-dark'> 
                        <i class="fa fa-phone mx-2"></i> +234 8079 791 118</p>
                  </div>

                  <div class="contact-body col-md-8 col-sm-12">
                    <div class="offce-box d-block justify-content-center p-4 m-4">
                        <!-- <i class="fa fa-contact display-7 p-4 text-center"></i> -->
                        <div class="container d-flex flex-direction-column align-items-center justify-content-center ">
                             <form class="contact-form" method="POST"> 
                             <div class="p-2 text-center display-6">
                               <strong> Contact Us</strong> <hr>
                            </div>
                            <p class="contact-feedback text-center"></p>
                            <div class="form-group">
                                <label for="full-name" class="form-label">
                                    <strong>FullName</strong>
                                    <input type="text" class="form-control-lg w-full fullname" name ='fullname' placeholder="FullName" id="full-name">
                                </label>
                            </div>

                             <div class="form-group">
                                <label for="email" class="form-label">
                                    <strong>Email</strong>
                                    <input type="text" class="form-control-lg w-full email" name='email' placeholder="Email-Address" id="email">
                                </label>
                            </div>

                             <div class="form-group">
                                <label for="msg" class="form-label">
                                    <strong>Message</strong> <br>
                                    <textarea class="form-control-lg w-full msg"  placeholder="Message" name='msg' id="msg"></textarea>
                                </label>
                            </div>

                             <div class="form-group">
                               <button class="btn btn-dark btn-lg w-100 mt-2">Send</button>
                            </div>
                        </form>
                        </div>
                    </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php'); ?>
</section>
    
