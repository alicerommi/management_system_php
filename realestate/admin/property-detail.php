<?php 
if(isset($_GET['property_id'])){
  $property_id = intval($_GET['property_id']);
}else{
  echo "Invalid Paramters"; 
  die;
}
include 'includes/header.php';
?>
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">View Property Detail</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">View Property Detail</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">

              <?php
              //get all data of property 
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

              }
              ?>

                <div class="col-md-12 text-left" style="padding: 0;">
                    <center><h2>Propiedades en  <?php echo ucwords($property_type); ?></h2></center>
                </div>
                <div class="panel panel-primary col-md-12" style="padding: 0;">
                    <div class="panel-heading"><h3 class="panel-title">Images Property</h3></div>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    <?php   
                       //get the property images
                $query2 = mysqli_query($conn,"SELECT* FROM property_image WHERE property_id=$property_id");
                if(mysqli_num_rows($query2)>0){
                 while($row2 = mysqli_fetch_array($query2))
                  {
                      $property_image = "uploads/property-images/".$row2['property_image'];
                      echo '<div class="swiper-slide">
                            <img src="'.$property_image.'" height="20%" width="20%" />
                        </div>';
                  }
                }
                ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="panel panel-primary info-pro col-md-12" style="padding: 0;">
                    <div class="panel-heading"><h3 class="panel-title">General Information</h3></div>
                       <div class="panel-body">

                        <div class="col-md-3 list-property">
                                    <h5>Status:&nbsp;<span><?php echo $property_status ; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>State:&nbsp;<span><?php echo $property_state1 ; ?></span></h5>
                                </div>
                            

                                 
                                 
                                <div class="col-md-3 list-property">
                                    <h5>Address:&nbsp;<span><?php echo $property_address ; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Floors:&nbsp;<span><?php echo $property_floor; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Type of Unit:&nbsp;<span><?php echo $property_typeOfUnit;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Covered Surface:&nbsp;<span><?php echo $property_coveredSurface; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Total Surface:&nbsp;<span><?php echo $property_totalSurface;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Antiquity:&nbsp;<span><?php echo $property_antiquity;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Furnished:&nbsp;<span><?php echo $property_furnished; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Price:&nbsp;<span><?php echo $property_price; ?></span></h5>
                                </div>

                       </div>
                   </div>

               <div class="panel panel-primary info-pro col-md-12" style="padding: 0;">
                    <div class="panel-heading"><h3 class="panel-title">Detail of the Property</h3></div>
                       <div class="panel-body">
                            <!--  <div class="col-md-3 list-property">
                                    <h5>Location:&nbsp;<span>Sale</span></h5>
                                </div> -->
                                <div class="col-md-3 list-property">
                                    <h5>Orientation:&nbsp;<span><?php echo $property_orientation;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Palier:&nbsp;<span><?php echo $property_palier ;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>State:&nbsp;<span><?php echo $property_state; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Offices:&nbsp;<span><?php echo $property_office;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Meeting Room:&nbsp;<span><?php echo $meetingroom; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Reception:&nbsp;<span><?php echo $reception; ?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Office:&nbsp;<span><?php echo $property_office;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Heating:&nbsp;<span><?php echo $property_heating;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Hot Water:&nbsp;<span><?php echo $property_hotwater ;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Luminosity:&nbsp;<span><?php echo $property_luminsoity; ?></span></h5>
                                </div>
         
     
                                <div class="col-md-3 list-property">
                                    <h5>Floors:&nbsp;<span><?php echo $propety_floor2;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Bathroom Bath:&nbsp;<span><?php echo $property_bathrooms;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Toilette:&nbsp;<span><?php echo $property_toilete;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Expenses:&nbsp;<span><?php echo $property_expenses;?></span></h5>
                                </div>

                                <div class="col-md-3 list-property">
                                    <h5>ABL:&nbsp;<span><?php echo $property_abl;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>AYSA:&nbsp;<span><?php echo $property_aysa;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Contract Duration:&nbsp;<span><?php echo $property_contractDuration;?></span></h5>
                                </div>
                       </div>
                   </div>
                   <div class="panel panel-primary info-pro col-md-12" style="padding: 0;">
                    <div class="panel-heading"><h3 class="panel-title">Detail of the Building</h3></div>
                       <div class="panel-body">
                        <div class="col-md-3 list-property">
                                    <h5>Quantity of Floors:&nbsp;<span><?php echo $property_quantityOfFloors;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Office by Floor:&nbsp;<span><?php echo $property_officesOfFloors;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Surveillance:&nbsp;<span><?php echo $property_surveillance;?></span></h5>
                                </div>
                                
                                <!-- <div class="col-md-3 list-property">
                                    <h5>Elevators:&nbsp;<span>Sale</span></h5>
                                </div> -->
                                <div class="col-md-3 list-property">
                                    <h5>Garrage:&nbsp;<span><?php echo $property_garage;?></span></h5>
                                </div>
                                <div class="col-md-3 list-property">
                                    <h5>Baulera:&nbsp;<span><?php echo $property_baulera; ?></span></h5>
                                </div>
                       </div>
                   </div>

                   <div class="panel panel-primary info-pro col-md-12" style="padding: 0;">
                    <div class="panel-heading"><h3 class="panel-title">Property Map</h3></div>
                       <div class="panel-body">
                        <?php 
                     
                         echo' <iframe src="https://maps.google.com/maps?q='.$property_locationLat.','.$property_locationLng.'&hl=es;z=14&amp;output=embed" width="1000" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>';
                         ?>
                         <!--  </div> -->
                       </div>
                   </div>
               </div>


               </div>
               </div>
            </div>
        </div>
        <!-- End Container fluid  -->

        <?php include 'includes/footer.php'; ?>
        <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
            <script>
                var swiper = new Swiper('.swiper-container', {
                    spaceBetween: 30,
                    centeredSlides: true,
                    autoplay: {
                        delay: 2500,
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