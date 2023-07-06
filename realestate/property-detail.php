<?php 
if(isset($_GET['property_id'])){
  $property_id = intval($_GET['property_id']);
}else
{
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
       <a class="navbar-brand" href="index.php">
        <img src="asset/images/logo_new01.png" >
      </a>
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

     <?php  // $queryImages = mysqli_query($conn,"SELECT * FROM `project_images` WHERE project_id =$project_id");
     $queryImages = mysqli_query($conn,"SELECT * FROM `property_image` WHERE property_id =$property_id");
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
                     echo '<div class="carousel-inner">';
                }
                  ?>
   
  

  <!-- Wrapper for slides -->
  

<?php
 $queryImages = mysqli_query($conn,"SELECT * FROM `property_image` WHERE property_id =$property_id");
                if(mysqli_num_rows($queryImages)>0){
                  $k=0;
                  while($row5 = mysqli_fetch_array($queryImages)){
                    $projectImage = "admin/uploads/property-images/".$row5['property_image'];
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

                  echo '</div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>';

                }//end num rows 
?>

 </div>




 <?php
  $query = mysqli_query($conn,"SELECT* FROM property WHERE property_id=$property_id");
              if(mysqli_num_rows($query)>0){
                $row = mysqli_fetch_array($query);
                $property_name = $row['property_name'];
                $property_type = $row['property_type'];
                 $property_status = $row['property_status'];
                $property_area = $row['property_area'];
                $property_state1 =$row['property_state1'];
                $property_address = $row['property_address'];
                $property_floor = $row['property_floor'];
                $property_typeOfUnit = $row['property_typeOfUnit'];
                $property_coveredSurface = $row['property_coveredSurface'];
                $property_totalSurface = $row['property_totalSurface'];
                $property_antiquity = $row['property_antiquity'];
                $property_furnished = $row['property_furnished'];
                $property_price = $row['property_price'];
                $property_locationLat = $row['property_locationLat'];
                $property_locationLng = $row['property_locationLng'];

                $property_orientation = $row['property_orientation'];
                $property_palier = $row['property_palier'];
                $property_state = $row['property_state'];
                $property_office = $row['property_office'];
                $property_heating = $row['property_heating'];
                $meetingroom = $row['property_meetingroom'];
                $reception = $row['property_reception'];

                $property_hotwater = $row['property_hotwater'];
                $property_brightness = $row['property_brightness'];
                $property_luminsoity = $row['property_luminsoity'];
                $propety_floor2 = $row['propety_floor2'];
                $property_bathrooms = $row['property_bathrooms'];
                $property_toilete = $row['property_toilete'];
                $property_expenses = $row['property_expenses'];
                $property_abl = $row['property_abl'];
                $property_aysa = $row['property_aysa'];
                $property_contractDuration = $row['property_contractDuration'];
                $property_quantityOfFloors = $row['property_quantityOfFloors'];
                $property_officesOfFloors = $row['property_officesOfFloors'];
                $property_surveillance = $row['property_surveillance'];
                $property_garage = $row['property_garage'];
                $property_baulera = $row['property_baulera'];
               $property_recordDate = $row['property_recordDate'];
              }//end num rows condition here 
              ?>




    <div class="col-md-4 details">
      <h4><span>1.</span>&nbsp;Detail of the Property</h4>
      <ul>
        <li><span class="detail">Status</span><span class="items"> <?php echo  $property_status; ?></span></li>
        <li><span class="detail">Address</span><span class="items"> <?php echo  $property_address; ?></span></li>
        <li><span class="detail">Orientation</span><span class="items"><?php echo  $property_orientation ; ?></span></li>
        <li><span class="detail">Palier</span><span class="items"><?php echo $property_palier; ?></span></li>
        <li><span class="detail">State</span><span class="items"><?php echo $property_state1; ?></span></li>
        <li><span class="detail">Office</span><span class="items"><?php echo  $property_office; ?></span></li>
        <li><span class="detail">Heating</span><span class="items"><?php echo $property_heating; ?></span></li>
        <li><span class="detail">Hot Water</span><span class="items"><?php echo $property_hotwater  ; ?></span></li>
        <li><span class="detail">Brightness</span><span class="items"><?php echo  $property_brightness ; ?></span></li>
        <li><span class="detail">Floors</span><span class="items"><?php echo $propety_floor2 ; ?></span></li>
        <li><span class="detail">Bathroom Bath</span><span class="items"> <?php echo $property_bathrooms; ?></span></li>
        <li><span class="detail">Toilett</span><span class="items"><?php echo $property_toilete; ?></span></li>
        <li><span class="detail">Expenses</span><span class="items"><?php echo  $property_expenses; ?></span></li>
        <li><span class="detail">ABL</span><span class="items"><?php echo  $property_abl; ?></span></li>
        <li><span class="detail">AYSA</span><span class="items"><?php echo $property_aysa; ?></span></li>
        <li><span class="detail">Contract Duration</span><span class="items"> <?php echo  $property_contractDuration; ?></span></li>

      </ul>
    </div>
        <div class="col-md-4 details">
          <h4><span>2.</span>&nbsp;General Information</h4>
          <ul>
           <!--  <li><span class="detail">Location</span><span class="items">Chicago, IL 012345</span></li> -->
            <li><span class="detail">State</span><span class="items"><?php echo  $property_state1;?></span></li>
            <li><span class="detail">Area:</span><span class="items"><?php echo $property_area;?></span></li>
            <li><span class="detail">Floor:</span><span class="items"><?php echo  $property_floor ;?></span></li>
            <li><span class="detail">Type of Unit:</span><span class="items"><?php echo $property_typeOfUnit;?></span></li>
            <li><span class="detail">Covered Surface:</span><span class="items"><?php echo $property_coveredSurface;?></span></li>
            <li><span class="detail">Total Surface:</span><span class="items"><?php echo $property_totalSurface;?></span></li>
            <li><span class="detail">Antiquedad:</span><span class="items"><?php echo  $property_antiquity;?></span></li>
            <li><span class="detail">Furnished:</span><span class="items"><?php echo  $property_furnished ;?></span></li>
            <li><span class="detail">Price</span><span class="items price-blue"><?php echo  $property_price; ?></span></li>

          </ul>
        </div>
        <div class="col-md-4 details">
          <h4><span>3.</span>&nbsp;Detail of the Building</h4>
          <ul>
            <li><span class="detail">Quantity of Floors</span><span class="items"><?php echo $property_quantityOfFloors ;?></span></li>
            <li><span class="detail">Office of Floors</span><span class="items"><?php echo   $property_officesOfFloors ; ?></span></li>
            <li><span class="detail">Surveillance</span><span class="items"><?php echo $property_surveillance ;?></span></li>
            <li><span class="detail">Baulera</span><span class="items"><?php echo  $property_baulera; ?></span></li>
            <li><span class="detail">Garages:</span><span class="items"><?php echo  $property_garage?></span></li>

          </ul>
        </div>
        <div class="col-md-12">
            <div class="title">
              <h2>Property Location In Goole Map</h2>
            </div>
            <?php
            echo' <iframe src="https://maps.google.com/maps?q='.$property_locationLat.','.$property_locationLng.'&hl=es;z=14&amp;output=embed" width="1000" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>';  ?>
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
