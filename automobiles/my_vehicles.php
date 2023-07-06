<?php
  include 'includes/header.php';
?>
  <!--========================= Start: Banner Section ===========================-->
 <!--  <div class="banner-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>My Dashboard</h2>
        </div>
      </div>
    </div>
  </div> -->
    <!-- start banner -->
<div class="directional_class">
  <section class="banner-top banner-top_my_vehicle">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-head">
          <!--   <h2>My Vehicles</h2> -->
            <h2> <?php    echo to_hebrew("My Vehicles",$language_array);?></h2>
          <!--   <nav aria-label="breadcrumb" class="nav-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">About</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
              </ol>
            </nav> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end banner -->
  <!--========================= End: Banner Section ===========================-->



  <!--========================= Start: Dasboard Buyer Section ===========================-->
  <div class="buyer-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-list">
                 <ul class="link-nav">
                   <li class=""><a href="customer_dashboard.php" class="btn btn-primary nav-links"> <?php    echo to_hebrew("Dashboard",$language_array); ?> <?php 
                    if($active_page=="customer_dashboard.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-address-card"></i> </a></li>
                  <li><a href="add_vehicle.php" class="btn btn-primary nav-links">  <?php    echo to_hebrew("Add Vehicles",$language_array);?> <?php 
                    if($active_page=="add_vehicle.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-plus"></i></a></li>
                  <li><a href="my_vehicles.php" class="btn btn-primary nav-links"><?php    echo to_hebrew("My Vehicles",$language_array);?>  <?php 
                    if($active_page=="my_vehicles.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-truck-moving"></i> </a></li>
                  <li><a href="sold_vehicles.php" class="btn btn-primary nav-links"> <?php    echo to_hebrew("Sold Vehicles",$language_array);?>  <?php 
                    if($active_page=="sold_vehicles.php"){
                      echo '<span class="active"></span>';
                    }
                  ?> <i class="fas fa-shopping-cart"></i></a></li>
                    
                  <li><a href="profile_settings.php" class="btn btn-primary nav-links"> <?php    echo to_hebrew("Settings",$language_array); ?> <?php 
                    if($active_page=="profile_settings.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-archive"></i></a></li>

                 <!--  <li><a href="product-bids.html" class="btn btn-primary nav-links"><i class="fa fa-gavel"></i>Porduct Bids</a></li> -->
                </ul>
          </div>
          <div class="dashboard-area">
            <div class="card">
                  <div class="col-md-12">
                    <?php
                      if(isset($_GET['deleted'])){
                            if($_GET['deleted']==1){
                              $str = to_hebrew("Your Ad details has been deleted successfully",$language_array);
                              echo '<div class="alert alert-danger text-center">'.$str.'</div>';
                            }else if($_GET['deleted']==0){
                               //echo '<div class="alert alert-warning text-center">Error in deleting ad details.</div>';
                                $str = to_hebrew("Error in deleting ad details",$language_array);
                                echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                            }
                          }
                    ?>

                  <!--   <form method="post" id="solder_form" action="actions/update.php" class="row" style="display: none;">
                              <div class="form-group col-md-3">
                                <lable>Enter The Sold Date</lable>
                                <input type="date" name="sold_date" required class="form-control">
                              </div>
                              <input type="hidden" name="ad_id" id="ad_id" value="">
                              <div class="form-group col-md-3">
                                <lable>Enter The Sold Time</lable>
                                <input type="time" name="sold_time" required class="form-control">
                              </div>
                              <div class="form-group col-md-3" style="margin-top: 20px;">
                                <button type="submit" name="sold_vehicles_details" class="btn btn-success">Save</button>
                              </div>
                    </form> -->
                <!--     <style type="text/css">
                          img{
                            height: 40px;
                            width: 40px;
                          }
                        

                    </style> -->
                <table id="example" class="table table-striped table-bordered dt-responsive  auction-table" style="width: 100%;">
                  <thead>
                      <tr>
                       
                           <th>#</th>
                          <th><?php echo to_hebrew("Vehicle Type",$language_array); ?></th>
                                <th><?php echo to_hebrew("Manufacture",$language_array); ?></th>
                          <th><?php echo to_hebrew("Model",$language_array); ?></th>
                          <th><?php echo to_hebrew("Price",$language_array); ?></th>
                          <th><?php echo to_hebrew("Posted Date",$language_array); ?></th>
                          <th><?php echo to_hebrew("Actions",$language_array); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" id="action_confirmer" value="<?php echo to_english("Delete Ad");?>">
                    <?php
                    $count = 0;
                    $sql = "select* from vehicles_ads where customer_id =$gbh2_customer_id and vehicle_ad_sold_status=0";
                      $query = mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_array($query)){
                        $count = $count+1;
                        $vehicle_ad_id = $row['vehicle_ad_id'];
                        $vehicle_manufacture_id = $row['vehicle_manufacture_id'];
                        $vehicle_type_id = $row['vehicle_type_id'];
                        $vehicle_model_id = $row['vehicle_model_id'];
                    

                        $query1 = mysqli_query($conn,"select* from vehicles_manufacture where vehicle_manufacture_id=$vehicle_manufacture_id");
                                $row1 = mysqli_fetch_array($query1);
                                $vehicle_manufacture_name = $row1['vehicle_manufacture_name'];


                                $querey2 = mysqli_query($conn,"select * from vehicles_models where vehicles_model_id=$vehicle_model_id and vehicle_manufacture_id=$vehicle_manufacture_id");
                                
                              
                                 $row2 = mysqli_fetch_array($querey2);
                                 
                                $vehicles_model_name = $row2['vehicles_model_name'];

                                $querey3 = mysqli_query($conn,"select* from vehicle_types where vehicle_type_id=$vehicle_type_id");
                                   $row3 = mysqli_fetch_array($querey3);
                                $vehicle_type_name = $row3['vehicle_type_name'];


                        $vehicle_ad_price = $row['vehicle_ad_price'];
                        $vehicle_ad_added_timestamp = date("d-m-Y",strtotime($row['vehicle_ad_added_timestamp']));
                              $ForSale = to_hebrew("Sold",$language_array);
                            echo '<tr>
                          <td>'.$count.'</td>
                          <td>'.$vehicle_type_name.'</td>
                            <td>'.$vehicle_manufacture_name.'</td>
                           <td>'.$vehicles_model_name.'</td>
                          <td>'.$vehicle_ad_price.'</td>
                          <td>'.$vehicle_ad_added_timestamp.'</td>
                              <td class="">
                                
                                <a href="view_vehicle_details.php?vehicle_ad_id='.$vehicle_ad_id.'" class="btn btn-primary view-btn btn-top-red">
                                  <i class="fas fa-eye"></i>
                                </a>

                                <a href="update_vehicle.php?vehicle_ad_id='.$vehicle_ad_id.'" class=" btn btn-success btn-top-red"><i class="fas fa-pencil-alt"></i></a> 

                                 <button class="delebtn   btn btn-danger btn-top-red" data-target="#view1" id="'.$vehicle_ad_id.'"  data-toggle="modal" ><i class="fas fa-trash "></i></button>

                                <a href="actions/update.php?vehicle_ad_id='.$vehicle_ad_id.'&sold_vehicles_details=1" class="btn btn-info btn_sold btn-top-red" id="'.$vehicle_ad_id.'">'.$ForSale.'</a>
                              </td>
                          </tr>'; 
                      }
                    ?>
                      
                  </tbody>
              </table>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
  <!--========================= End: Dashboard Buyer Section =============================-->
<?php
  include 'includes/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function() {
  
    // $(".btn_sold").click(function(){      
    //     let id=$(this).attr('id');
    //     $("#ad_id").val(id);
    //     $("#solder_form").show();
    // });


    $(".delebtn").click(function(){
        let id = $(this).attr('id');
        let confirm_msg = $("#action_confirmer").val();
        confirm_msg = "האם למחוק את המודעה";
        let btn = ' <a class="btn btn-danger delete-btn btn-sm" href="actions/delete.php?vehicle_ad_id='+id+'&delete_vehicle=1">'+confirm_msg+'</a>';
        $("#bodddy").empty().append(btn);
       // $("#view1").modal('show');
    });
} );
</script>

  <!-- Modal -->
 <div class="modal fade" id="view1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 50%;">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close close-left" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <h5 class="modal-title" id="exampleModalLabel">
           <?=to_hebrew_txt("Please Confirm Your Action") ?>
         </h5>
       </div>
       <div class="modal-body text-right">
         <div class="col-md-12" id=bodddy>
            
         </div>
       </div>
     </div>
   </div>
 </div>