<?php
include_once('includes/connect.php');
$pageName = "Contact";
$topic = "Main";

include_once('includes/header.php');
include_once('includes/nav.php');
?>

<section>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-sm-12">
                <div class="p-4 text-center display-6">
                    Contact Us
                </div>
               <div class="contact-box d-flex jusify-content-space-between gap-4 ">
                  <div class="contact-logo my-4">
                    <i class="fa fa-headset display-1 mx-4 my-4"></i>
                    <p class="display-6">Help Line</p>
                  </div>

                  <div class="contact-body my-4">
                    <div class="offce-box d-flex gap-3 justify-content-center">
                        <i class="fa fa-home display-7 p-4 text-center"></i>
                        <p class="p-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus officiis hic, nisi, tempore minus harum, rem ducimus sunt sint sit illo! Voluptatem provident officiis earum unde laboriosam quia vero odio!
                        </p>
                    </div>

                    <div class="offce-box d-flex gap-3 justify-content-center">
                        <i class="fa fa-fax display-7 p-4 text-center"></i>
                        <p class="p-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus officiis hic, nisi, tempore minus harum, rem ducimus sunt sint sit illo! Voluptatem provident officiis earum unde laboriosam quia vero odio!
                        </p>
                    </div>

                     <div class="offce-box d-flex gap-3 justify-content-center">
                        <i class="fa fa-briefcase display-7 p-4 text-center"></i>
                        <p class="p-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus officiis hic, nisi, tempore minus harum, rem ducimus sunt sint sit illo! Voluptatem provident officiis earum unde laboriosam quia vero odio!
                        </p>

                      
                    </div>
                     <p  class='text-center p-2 bg-secondary text-light'> <i class="fa fa-globe"></i> www.ekoncept.com | <i class="fa fa-inbox"></i> info@ekoncept.com | <i class="fa fa-phone"></i> +234 8079 791 118</p>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
</section>
    
<?php include_once('includes/footer.php'); ?>