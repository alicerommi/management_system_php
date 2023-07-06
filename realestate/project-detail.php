<?php
  if(isset($_GET['project_id'])){
    $project_id = intval($_GET['project_id']);
  }else{
    echo "Invalid Paramters";
    die;
  }
 include 'includes/header.php';
  include 'includes/site_visitors.php';
  ?>
<style media="screen">
.slideshow {
  display: flex;
  height: 80vh;
  width: 80vw;
  max-width: 1240px;
  min-height: 400px;
  max-height: 700px;
  position: relative;
  background-color: #fff;
  padding: 20px;
  padding-left: 0;

  &__gallery {
    height: 100%;
    width: calc(80% - 20px);
    margin-right: 20px;

    &-wrap {
      will-change: transform;
      transition-timing-function: cubic-bezier(0, 0, 0.3, 0.98);
      transform: translate3d(0, 0, 0);
    }

    &-slide {
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      font-size: 32px;
      color: #fff;
      letter-spacing: 3.2px;
      transform: translate3d(0, 0, 0);
      will-change: font-size;
      transition: font-size 0.3s ease;

      &.active {
        font-size: 36px;
      }
    }
  }

  &__thumbs {
    height: 100%;
    width: 20%;

    &-wrap {
      will-change: transform;
      transition-timing-function: cubic-bezier(0, 0, 0.3, 0.98);
      transform: translate3d(0, 0, 0);
    }

    &-slide {
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      color: #fff;
      letter-spacing: 2px;
      will-change: font-size;
      transition: font-size 0.3s ease;

      &.active {
        font-size: 26px;
      }
    }
  }
}


/* lightbox css here   */

.lightBox{margin: 0 auto;
    width: 100%;
    height: auto;
    margin-bottom: 40px;
  }

.mainImg img{
  width: 100%;
  height: 450px;
}

.thumbnails img{padding: 5px;
    background-color: #eee;
    width:19.67%;border-radius:5px;
    cursor: pointer;opacity: .7}



.thumbnails .active{opacity: 1;background-color: #3498db}

.mainImg{position: relative}
.mainImg i{position: absolute;
    color: #fff;
    opacity: .5;
    font-size: 25px;
    padding:20px}

.mainImg i:hover{opacity: .8;cursor: pointer;transition: 200ms}

.mainImg i:first-of-type{top:47%;left:2%}
.mainImg i:last-of-type{top:47%;right:2%}

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
        
        <li class=""><a href="index.php">Proyectos <span class="sr-only">(current)</span></a></li>
          <li><a  href="properties.php">Propiedades</a></li>
          <li><a  href="about.php">Nuestra compañía</a></li>
          <li><a   href="contact.php">Contacto</a></li>
        </ul>
       
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>
  <!-- End: Header Section -->
  <!-- Start: Banner Section -->
  <div class="banner" id="banner"></div>
  <!-- End: Banner Section -->
<!-- Property Detail -->
<div class="property-detail">
  <div class="container">
    <div class="row">
      <div class="col-md-12">


 <div id="myCarousel"  style="    margin-top: 50px;" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

     <?php $queryImages = mysqli_query($conn,"SELECT * FROM `project_images` WHERE project_id =$project_id");
                if(mysqli_num_rows($queryImages)>0){
                  echo '<ol class="carousel-indicators">';
                      $i=0;
                     while($row4 = mysqli_fetch_array($queryImages)){
                      if($i==0)
                      echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
                     else
                      echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
                       
                       $i++;
                     }//end while
                     echo '</ol>';
                }
                  ?>
   
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

<?php
 $queryImages = mysqli_query($conn,"SELECT * FROM `project_images` WHERE project_id =$project_id");
                if(mysqli_num_rows($queryImages)>0){
                  $k=0;
                  while($row5 = mysqli_fetch_array($queryImages)){
                    $projectImage = "admin/uploads/project-images/".$row5['project_image_name'];
                    if($k==0)
                        {echo '<div class="item active">
                                                      <img src="'.$projectImage.'" >
                                                    </div>';
                        }
                            else{
                                echo ' <div class="item">
                                  <img src="'.$projectImage.'" >
                                </div>';
                            } 
                               $k++;

                  }//end while loop here

                }//end num rows 
?>


  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
 </div>
    <?php     
  //get the project details

$query = mysqli_query($conn,"SELECT * FROM `projects` WHERE project_id=$project_id");

if(mysqli_num_rows($query)>0){
  while($row = mysqli_fetch_array($query)){
                                         $project_name = $row['project_name'];
                                        $project_location = $row['project_location'];
                                        $project_desctiption = $row['project_desctiption'];
                                        $project_services = $row['project_services'];
                                        $project_amenties = $row['project_amenties']; 
                                      // $project_info  = $row['project_info'];
                                        $project_recordDate = date("d-m-Y",strtotime($row['project_recordDate']));
  }
} 

    ?>

    <div class="col-md-4 details">
      <h4>Project Details</h4>
      <ul>
        <li><span class="detail">Location</span><span class="items"><?php echo $project_location;?></span></li>
        <li><span class="detail">Project Name</span><span class="items"><?php echo $project_name;?></span></li>
        <li><span class="detail">Service</span><span class="items"><?php echo $project_services; ?></span></li>
        <li><span class="detail">Amenties</span><span class="items"><?php echo $project_amenties; ?></span></li>
        

      </ul>
    </div>
        <div class="col-md-8 description">
          <h4>Project Description</h4>
          <p><?php echo $project_desctiption; ?></p>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!-- //Property Detail -->

<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
var $gallery = $('.js-gallery');
var $thumbs = $('.js-thumbs');
var slideNumber = $gallery.find('.swiper-slide').length / 3;
var slidesPerView = 3;
var targetIndex = void 0;

var activeSlideClass = 'active';
var $thumbsActiveSlide = void 0;
var $galleryActiveSlide = void 0;

var swiperGallery = new Swiper($gallery, {
  direction: 'vertical',
  loop: true,
  loopAdditionalSlides: 0,
  initialSlide: slideNumber,
  speed: 700,
  simulateTouch: false,
  spaceBetween: 20
});

var swiperThumbs = new Swiper($thumbs, {
  direction: 'vertical',
  loop: true,
  loopAdditionalSlides: 0,
  slidesPerView: slidesPerView,
  initialSlide: slideNumber,
  centeredSlides: true,
  slideToClickedSlide: true,
  speed: 500,
  spaceBetween: 20
});

//add custom active class for smooth animation
$thumbsActiveSlide = $(swiperThumbs.slides).filter('.swiper-slide-active');
$galleryActiveSlide = $(swiperGallery.slides).filter('.swiper-slide-active');
$thumbsActiveSlide.addClass(activeSlideClass);
$galleryActiveSlide.addClass(activeSlideClass);
//---------------------------------------------


swiperThumbs.on("slideChangeTransitionStart", function () {
  //add custom active class for smooth animation
  $thumbsActiveSlide = $(swiperThumbs.slides).filter('.swiper-slide-active');
  $thumbsActiveSlide.siblings().removeClass(activeSlideClass);
  //---------------------------------------------

  targetIndex = Number(swiperThumbs.realIndex);
  swiperThumbs.detachEvents();
  swiperGallery.slideTo(targetIndex + 1, 700, true);
});

// swiperThumbs.on("slideChangeTransitionEnd", function () {
//   swiperThumbs.attachEvents();
// });

swiperGallery.on("slideChangeTransitionStart", function () {
  //add custom active class for smooth animation
  $galleryActiveSlide = $(swiperGallery.slides).filter('.swiper-slide-active');
  $galleryActiveSlide.siblings().removeClass(activeSlideClass);
  //---------------------------------------------
});

swiperGallery.on("slideChangeTransitionEnd", function () {
  if (targetIndex < slideNumber) {
    targetIndex += slideNumber;
    teleportTo(targetIndex);
  } else if (targetIndex >= slideNumber * 2) {
    targetIndex -= slideNumber;
    teleportTo(targetIndex);
  } else {
    //add custom active class for smooth animation
    $thumbsActiveSlide.addClass(activeSlideClass);
    $galleryActiveSlide.addClass(activeSlideClass);
    //---------------------------------------------
  }
  swiperThumbs.attachEvents();
});

function teleportTo(slideIndex) {
  swiperThumbs.slideTo(slideIndex + slidesPerView, 0, false);
  swiperGallery.slideTo(slideIndex + 1, 0, false);

  //add custom active class for smooth animation
  $thumbsActiveSlide = $(swiperThumbs.slides).filter('.swiper-slide-active');
  $galleryActiveSlide = $(swiperGallery.slides).filter('.swiper-slide-active');
  $thumbsActiveSlide.addClass(activeSlideClass);
  $galleryActiveSlide.addClass(activeSlideClass);
  //---------------------------------------------
}

//If u have images with lazy add this after swipers init
function fixLazy() {
  var gallerylastIndex = slideNumber * 2;
  var thumbslastIndex = slideNumber * 2 + slidesPerView - 1;
  var $lastGallerySlide = $(swiperGallery.slides[gallerylastIndex]).find('.swiper-lazy');
  var $lastThumbsSlide = $(swiperThumbs.slides[thumbslastIndex]).find('.swiper-lazy');

  removeLazySlide($lastGallerySlide);
  removeLazySlide($lastThumbsSlide);

  var counter = void 0;

  if ((slidesPerView - 1) % 2 !== 0) {
    counter = Math.floor((slidesPerView - 1) / 2) + 1;
  } else {
    counter = (slidesPerView - 1) / 2;
  }

  for (var i = 0; i < counter; i++) {if (window.CP.shouldStopExecution(1)){break;}

    var $prevSlide = $(swiperThumbs.slides[thumbslastIndex - (i + 1)]).find('.swiper-lazy');
    var $nextSlide = $(swiperThumbs.slides[thumbslastIndex + (i + 1)]).find('.swiper-lazy');

    removeLazySlide($prevSlide);
    removeLazySlide($nextSlide);
  }
window.CP.exitedLoop(1);

}

function removeLazySlide($slide) {
  var data = $slide.data('background');
  $slide.attr('style', 'background-image: url(\'' + data + '\')');
  $slide.removeAttr('data-background');
  $slide.addClass('swiper-lazy-loaded');
  $slide.empty();
}

</script>

