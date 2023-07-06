<?php
  include 'database_connection.php';
//for footer logo
  $query1    = mysqli_query($conn,"SELECT * FROM `footer_logo` WHERE footer_logo_id =1");
  $row = mysqli_fetch_array($query1);
  $footer_logo_image = "admin/uploads/footer-logo/".$row['footer_logo_image'];

  //for footer para

  $query2 = mysqli_query($conn,"SELECT * FROM `footer_text` WHERE footer_text_id= 1");
  $row2 = mysqli_fetch_array($query2);
  $footer_text   = $row2['footer_text'];

  //fpr spcial media links
  $query3 = mysqli_query($conn,"SELECT * FROM `footersocial_medialinks` WHERE `sm_linkid`=1");
  $row3 = mysqli_fetch_array($query3);
  $fb_link = $row3['fb_link'];
$twitter_link = $row3['twitter_link'];
$gplus_link = $row3['gplus_link'];
$linkedIn_link = $row3['linkedIn_link'];
$vimeo_link = $row3['vimeo_link'];
$instagram_link = $row3['instagram_link'];

//for the footer links link1 sections
  $query4 = mysqli_query($conn,"SELECT * FROM `footer_links` WHERE `footer_link_id` =1 and `footer_links_type`=1");
  $row4 =  mysqli_fetch_array($query4);
  $footer_headingtext = $row4['footer_headingtext'];
    $footer_link1 = $row4['footer_link1'];
    $footer_link2 = $row4['footer_link2'];
    $footer_link3 = $row4['footer_link3'];
    $footer_link4 = $row4['footer_link4'];
    $footer_link5 = $row4['footer_link5'];
   // $footer_links_type = $row4['footer_links_type'];

     $query5 = mysqli_query($conn,"SELECT * FROM `footer_links` WHERE `footer_link_id` =2 and `footer_links_type`=2");
  $row5 =  mysqli_fetch_array($query5);
  // print_r($row5);
 // die;
  $footer_headingtext2 = $row5['footer_headingtext'];
    $footer_link1second = $row5['footer_link1'];
    $footer_link2second = $row5['footer_link2'];
    $footer_link3second = $row5['footer_link3'];
    $footer_link4second = $row5['footer_link4'];
    $footer_link5second= $row5['footer_link5'];
  //  $footer_links_type = $row5['footer_links_type'];



  ?>
 <?php //show the homepage paragraphs
              $query2  = mysqli_query($conn,"SELECT* FROM homepage_paragraph WHERE homepage_pid=1");
              $row = mysqli_fetch_array($query2);
              $homepage_p1 = $row['homepage_p1'];
              $homepage_p2Heading = $row['homepage_p2Heading'];
              $homepage_p2 = $row['homepage_p2'];
              $homepage_p2btnText = $row['homepage_p2btnText'];
              $homepage_p2btnLink = $row['homepage_p2btnLink'];
              ?>
<!-- Start: Footer Section -->
  <div class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12" style="display: flex;justify-content: flex-start;">
          <?php
          //comdetails
          $query5 = mysqli_query($conn,"SELECT * FROM `com_detail` WHERE com_detail_id=1");
          $row5 = mysqli_fetch_array($query5);
          $com_address = $row5['com_address'];
          $com_contact = $row5['com_contact'];
          $com_email = $row5['com_email'];

          ?>
          <div class="links links-details" style="width: 100%">
            <!-- <h4>Contáctate con nosotros</h4> -->
            <div class="address">
              <h5><i class="fa fa-map-marker"></i> Dirección </h5>
              <p style="padding-left: 25px;"><i class="fa fa-map-marker"></i><?php echo $com_address; ?></p>
            </div>
            <div class="address">
              <h5><i class="fa fa-phone"></i> Teléfono </h5>
              <p style="padding-left: 27px;"><i class="fa fa-phone"></i><?php echo $com_contact; ?></p>
            </div>

                <div class="about social-media">

            <ul class="social-list">
              <?php
              if(strlen($fb_link)!=0){ ?>
              <li><a href="<?php echo $fb_link; ?>"><i class="fa fa-facebook"></i></a></li>
              <?php }
              if(strlen($twitter_link)!=0){ ?>
              <li><a href="<?php echo $twitter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                 <?php }
              if(strlen($gplus_link)!=0) { ?>
              <li><a href="<?php echo $gplus_link; ?>"><i class="fa fa-google-plus"></i></a></li>
               <?php }
              if(strlen($linkedIn_link)!=0) { ?>
              <li><a href="<?php echo $linkedIn_link; ?>"><i class="fa fa-linkedin"></i></a></li>
               <?php }
              if(strlen($vimeo_link)!=0){ ?>
              <li><a href="<?php echo $vimeo_link; ?>"><i class="fa fa-vimeo"></i></a></li>
              <?php }
              if(strlen($instagram_link )!=0){
               ?>
                 <li><a href="<?php echo $instagram_link; ?>"><i class="fa fa-instagram"></i></a></li>
              <?php } ?>



            </ul>
          </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- End: Footer Section -->
  <!-- Back to top -->
  <a href="#0" class="cd-top">Top</a>
  <!-- //Back to top -->
  <!-- jQuery Js -->
  <script src="asset/js/jquery-3.2.1.min.js"></script>
    <script src="asset/js/swiper.min.js"></script>
  <!-- Bootstrap Js -->
  <script src="asset/js/bootstrap.min.js"></script>
  <!-- <script src="asset/jquery.noisy.min"></script> -->
  <!-- Backtop Js -->
  <script src="asset/js/backtop.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.3/js/swiper.min.js"></script>
</body>
<!-- <script type="text/javascript">
  $(function() {
  $(window).scroll(function() {
      if ($(window).scrollTop() >= 100) {
          $('.navbar-default').addClass('scrolled');
      } else {
          $('.navbar-default').removeClass('scrolled');
      }
  });
})
</script> -->
</html>
