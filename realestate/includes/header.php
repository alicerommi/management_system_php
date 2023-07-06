<?php include 'database_connection.php' ;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FRANCHINO Negocios Inmobiliarios</title>
  <!-- Style Css -->
  <link rel="stylesheet" href="asset/css/custom.css">
  <!-- Bootstrap Css -->
  <link rel="stylesheet" href="asset/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/css/font-awesome.min.css" />
  <link rel="stylesheet" href="asset/css/swiper.css" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Chivo:300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900" rel="stylesheet">
  <!-- Swiper Css -->
  <link rel="stylesheet" href="asset/css/swiper.css">
  <!-- Animate Css -->
  <link rel="stylesheet" href="asset/css/animate.css">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="asset/css/owl.carousel.min.css">

</head>
<body>
  <!-- Start: Top Bar -->
  <div class="top-positon">
  <header class="top-bar">
    <div class="col-md-12">
      <div class="container">
        <div class="text-right">
          <ul class="top-socials">
            <?php
                $query3 = mysqli_query($conn,"SELECT * FROM `footersocial_medialinks` WHERE `sm_linkid`=1");
                $row3 = mysqli_fetch_array($query3);
                $fb_link = $row3['fb_link'];
                $twitter_link = $row3['twitter_link'];
                $gplus_link = $row3['gplus_link'];
                $linkedIn_link = $row3['linkedIn_link'];
                $vimeo_link = $row3['vimeo_link'];
                $instagram_link = $row3['instagram_link'];
             ?>
             <?php 
             if(strlen($fb_link)!=0){
             ?>
            <li><a href="<?php echo $fb_link;  ?>"><i class="fa fa-facebook"></i></a></li>
          <?php } ?>
            <?php  if(strlen($gplus_link)!=0){
            ?>
            <li><a href="<?php echo $gplus_link; ?>"><i class="fa fa-google-plus"></i></a></li>
          <?php } ?>

            <?php if(strlen($twitter_link)!=0)?>
            <li><a href="<?php echo $twitter_link; ?>"><i class="fa fa-twitter"></i></a></li>
              

              <?php 
                  if(strlen($instagram_link)!=0){
                    ?>
                    <li><a href="<?php echo $instagram_link; ?>"><i class="fa fa-instagram"></i></a></li>
                  <?php
                  }
                 ?>


          </ul>
        </div>
      </div>
    </div>
  </header>
  <!-- End: Top Bar -->
