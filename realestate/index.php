<?php include 'includes/header.php';
    include 'includes/site_visitors.php';
?>
<style media="screen">
/* ==== Main CSS === */
.img-fill{
width: 100%;
display: block;
overflow: hidden;
position: relative;
text-align: center
}

.img-fill img {
min-height: 100%;
min-width: 100%;
position: relative;
display: inline-block;
max-width: none;
}



.swiper-container {
      width: 100%;
      height: 600px;
      margin-top: 130px;
      margin-bottom: 80px;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .swiper-slide h2 {
      position: absolute;
      left: 0;
    }
     .swiper-slide img{
      width: 100%;
      margin: 0 auto;
      position: relative;
     }

    .swiper-slide .slider-caption {
      position: absolute;
      left: 110px;
      background-color: rgba(0, 0, 0, 0.5);
      width: 400px;
      text-align: left;
      padding: 15px;
    }

    .swiper-slide .slider-caption p {
      font-size: 18px;
      font-weight: 400;
      color: #fff;
      line-height: 25px;
      letter-spacing: 1.2px;
    }

    .swiper-slide .slider-caption .button .btn {
      background-color: orange;
      padding: 10px 20px;
      border-color: orange;
      color: #fff;
      font-weight: 500;
      position: relative;
      font-size: 18px;
      border-radius: 0;
      -webkit-transition: 0.25s ease;
      -moz-transition: 0.25s ease;
      -ms-transition: 0.25s ease;
      transition: 0.25s ease;
    }
    .swiper-slide .slider-caption .button .btn:hover {
      color: orange;
      border-color: orange;
      background: transparent;
      -webkit-transition: 0.25s ease;
      -moz-transition: 0.25s ease;
      -ms-transition: 0.25s ease;
      transition: 0.25s ease;
    }

    .swiper-slide .slider-caption .button .btn i {
      padding-left: 5px;
      /* font-size: 14px; */
      vertical-align: center;
    }

    @media screen and (max-width: 320px) {
      .swiper-slide .slider-caption {
        position: absolute;
        left: 40px !important;
        width: 70%;
        margin-top: 150px;
        top: -20%;
      }
    }

    @media screen and (max-width:900px) {
      .swiper-container {
      margin-bottom: 123px;
    }
      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: flex-start;
        -webkit-align-items: flex-start;
        align-items: flex-start;
      }

      .swiper-slide img {
        height: 100%;
      }

      .swiper-slide .slider-caption {
        position: absolute;
        left: 40px !important;
        width: 70% !important;
        margin-top: 20px;
      }
    }


   @media screen and (max-width:880px) {
      .swiper-container{
        height:450px;

      }
    }


   @media screen and (max-width:720px) {
      .swiper-container{
        height:450px;

      }
    }


   @media screen and (max-width:550px) {
      .swiper-container{
        height:370px;
        margin-bottom: 77.33px;
      }
    }

    @media screen and (max-width:375px) {
      .swiper-container{
        height:450px;
        margin-bottom: 77px;
      }
    }


</style>
  <!-- Start: Navbar Section -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="asset/images/logo_new01.png" ></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class=""><a class="active" href="index.php">Proyectos <span class="sr-only">(current)</span></a></li>
           <li><a href="properties.php">Propiedades</a></li>
          <li><a href="about.php">Nuestra compañía</a></li>
          <li><a href="contact.php">Contacto</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
</div>
  <!-- End: Navbar Section -->
  <!-- Start: Slider Section -->

<!-- Start: Slider Section -->
  <div class="swiper-container">
  <div class="swiper-wrapper">

<?php
  //fetch all the project ids which hass the images
$projectIDS = array();
  $query0 = mysqli_query($conn,"select DISTINCT(project_id) from projects where project_id IN (select project_id from project_images)");
  if(mysqli_num_rows($query0)>0){
    while($r = mysqli_fetch_array($query0)){
        array_push($projectIDS, $r['project_id']);
    }//end while loop here
  }//end num rows condition here


for($i =0 ; $i<sizeof($projectIDS);$i++){
$project_id= $projectIDS[$i];
 $query = mysqli_query($conn,"select pro.*, pro_img.* from projects pro, project_images pro_img where pro.project_id = $project_id and pro_img.project_id=$project_id");
if(mysqli_num_rows($query)>0){
  $row  = mysqli_fetch_array($query);
    $path = "admin/uploads/project-images/";
    $simage_name = $path.$row['project_image_name'];
      $project_image_id   = $row['project_image_id'];
     $query2 = mysqli_query($conn,"SELECT* FROM projects WHERE project_id=$project_id");
     $row2 = mysqli_fetch_array($query2);
     $project_desctiption = $row2['project_desctiption'];
echo'
  <div class="swiper-slide">
    <img src="'.$simage_name.'" alt="">
    <div class="slider-caption">
      <p>'.$project_desctiption.'</p>
      <div class="button">
        <a href="project-detail.php?project_id='.$project_id.'"  class="btn btn-primary">Más información <i class="fa fa-angle-right"></i></a>
      </div>
    </div>
  </div>';
//}//end while lop here
}//end num row condition
}//end for loop here
?>
  </div>
  <div class="swiper-pagination"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  </div>

  <!-- End: Background Section -->
  <?php include 'includes/footer.php'; ?>
  <script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
