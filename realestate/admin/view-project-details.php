<?php 
if(isset($_GET['project_id'])){
  $project_id = intval($_GET['project_id']);
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
                <h3 class="text-primary">View Project Detail</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">View Project Detail</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                    <?php   
                       //get the property images
                $query2 = mysqli_query($conn,"SELECT* FROM project_images WHERE project_id=$project_id");
                if(mysqli_num_rows($query2)>0){

                    echo '<div class="panel panel-primary col-md-12" style="padding: 0;">
                    <div class="panel-heading"><h3 class="panel-title">Project Images</h3></div>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">';
                 while($row2 = mysqli_fetch_array($query2))
                  {
                      $property_image = "uploads/project-images/".$row2['project_image_name'];
                      echo '<div class="swiper-slide">
                            <img src='.$property_image.' class="img-responsive" />
                        </div>';
                  }
                  echo '</div>
                    
                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>';
                }
                ?>
                    
                <div class="panel panel-primary info-pro col-md-12" style="padding: 0;">
                    <div class="panel-heading"><h3 class="panel-title">General Information</h3></div>
                       <div class="panel-body">
                            <?php
                            $query = mysqli_query($conn,"SELECT * FROM `projects` WHERE project_id = $project_id");
                            $row = mysqli_fetch_array($query);
                            // $project_id = $row['project_id']; 
                                       $project_name = $row['project_name'];
                                        $project_location = $row['project_location'];
                                        $project_desctiption = $row['project_desctiption'];
                                        $project_services = $row['project_services'];
                                        $project_amenties = $row['project_amenties']; 
                                        $project_info  = $row['project_info'];
                                        $project_recordDate = date("d-m-Y",strtotime($row['project_recordDate']));
                            ?>
                            <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="desc-h" style="font-size: 22px; font-weight: 700;">Project Description:</h4>
                                    <?php    
                                    echo "<p style='font-size: 15px; font-weight: 400; color: #455a64;'>".$project_desctiption."</p>"  ;?>
                                        </div>
                            </div>
                                <div class="col-md-6 list-property">
                                    <h5>Project Name:&nbsp;<span><?php echo  $project_name ;  ?></span></h5>
                                </div>
                                <div class="col-md-6 list-property">
                                    <h5>Location:&nbsp;<span><?php echo  $project_location;  ?></span></h5>
                                </div>
                               
                                <div class="col-md-6 list-property">
                                    <h5>Services:&nbsp;<span><?php echo $project_services;?></span></h5>
                                </div>
                                <div class="col-md-6 list-property">
                                    <h5>Amenties:&nbsp;<span><?php echo $project_amenties ;?></span></h5>
                                </div>
                                <div class="col-md-6 list-property">
                                    <h5>Project Info:&nbsp;<span><?php echo $project_info ;?></span></h5>
                                </div>
                               

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