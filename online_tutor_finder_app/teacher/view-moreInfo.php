<?php
    if(isset($_GET['RID'])){
        $row_id = $_GET['RID'];
    }else{ 
        echo "Invalid Paramters";
        die;
    }
    include 'includes/header.php';
    include 'includes/left_nav.php';
    // $admin_image = $adminRow['admin_picture'];
?>

          
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">View Details</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Camera</a></li>
                                    <li class="active">View Information</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <!-- Start Widget -->
                        <a class="btn btn-default pull pull-right" href="view-AllData.php" style="margin-bottom: 23px;">
                                    <i class="md md-keyboard-arrow-left"> </i>Back to Camera List
                         </a>
                      <div class="row">
                            <div class="col-md-6">


                      
                              <?php 
                                                $query = mysqli_query($conn,"SELECT* FROM table_rows WHERE row_id=$row_id");
                                                if(mysqli_num_rows($query)>0){
                                                    $record = mysqli_fetch_array($query);
                                                    //SELECT `row_id`, `col_1x`, `col_plaza`, `col_building`, `col_floor`, `col_camera`, `col_flat`, `col_room`, `col_roomsection`, `col_roomtype`, `col_roomconfig`, `col_vinset`, `col_place`, `col_type`, `col_linkNow`, `col_active`, `col_firststyle`, `col_currentstyle`, `col_availablestyle`, `col_order`, `col_seltype`, `col_fam`, `col_e0`, `col_e1`, `col_e2`, `col_ploygons`, `col_clickarea`, `row_cameraNum`, `row_recordDate`, `row_updateDate` FROM `table_rows` WHERE 1 

                                                    $col_1x = $record['col_1x'];
                                                    $col_plaza = $record['col_plaza'];
                                                    $col_building = $record['col_building'];
                                                    $col_floor = $record['col_floor'];
                                                    $col_camera = $record['col_camera'];
                                                    $col_flat = $record['col_flat'];
                                                    $col_room = $record['col_room'];
                                                    $col_roomsection = $record['col_roomsection'];
                                                    $col_roomtype = $record['col_roomtype'];
                                                    $col_roomconfig = $record['col_roomconfig'];
                                                    $col_vinset = $record['col_vinset'];
                                                    $col_place = $record['col_place'];
                                                    $col_type = $record['col_type'];
                                                    $col_linkNow = $record['col_linkNow'];
                                                    $col_active = $record['col_active'];
                                                    $col_firststyle = $record['col_firststyle'];
                                                    $col_currentstyle = $record['col_currentstyle'];
                                                    $col_availablestyle = $record['col_availablestyle'];
                                                    $col_order = $record['col_order'];
                                                    $col_seltype = $record['col_seltype'];
                                                    $col_fam = $record['col_fam'];
                                                    $col_e0 = $record['col_e0'];
                                                    $col_e1 = $record['col_e1'];
                                                    $col_e2 = $record['col_e2'];
                                                    $col_ploygons = $record['col_ploygons'];
                                                    $col_clickarea = $record['col_clickarea'];
                                                    $row_cameraNum = $record['row_cameraNum'];
                                                }//end if conidtion here
                                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View More Details</h3>
                                    </div>
                                    <div class="panel-body">

                                            
                                        <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>


                                           <!--                  
                                              //Ix  Plaza   Building    Floor   Camera  Flat    Room    RoomSection RoomType    RoomConfig  VINSet  Place   Type    Link-Now    Active  FirstStyle  CurrentStyle    AvaibleStyles   Order   SelType Fam E0  E1  E2  Polygons    ClickArea
                   -->
                                                            <tr>
                                                                <td>1x</td>
                                                                <td><?php echo $col_1x;?></td>
                                                            </tr>

                                                              <tr>
                                                                <td>Plaza</td>
                                                                <td><?php echo $col_plaza;?></td>
                                                               
                                                            </tr>

                                                              <tr>
                                                                <td>Building</td>
                                                                <td><?php echo $col_building;?></td>
                                                               
                                                            </tr>

                                                              <tr>
                                                                <td>Floor</td>
                                                                <td><?php echo $col_floor;?></td>
                                                               
                                                            </tr>

                                                              <tr>
                                                                <td>Camera</td>
                                                                <td><?php echo $col_camera;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Flat</td>
                                                                <td><?php echo $col_flat;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Room</td>
                                                                <td><?php echo $col_room;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>RoomSection</td>
                                                                <td><?php echo $col_roomsection;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Room Type</td>
                                                                <td><?php echo $col_roomtype;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>RoomConfig</td>
                                                                <td><?php echo $col_roomconfig;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>VINSet</td>
                                                                <td><?php echo $col_vinset;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Place</td>
                                                                <td><?php echo $col_place;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Type</td>
                                                                <td><?php echo $col_type;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Link-Now</td>
                                                                <td><?php echo $col_linkNow;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Active</td>
                                                                <td><?php echo $col_active;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>First Style</td>
                                                                <td><?php echo $col_firststyle;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Current Style</td>
                                                                <td><?php echo $col_currentstyle;?></td>
                                                               
                                                            </tr>
                                                              <tr>
                                                                <td>Avaible Styles</td>
                                                                <td><?php echo $col_availablestyle;?></td>
                                                               
                                                            </tr>


                                                            <tr>
                                                                <td>Order</td>
                                                                <td><?php echo $col_order;?></td>
                                                               
                                                            </tr>


                                                            <tr>
                                                                <td>SelType</td>
                                                                <td><?php echo $col_seltype;?></td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td>Fam</td>
                                                                <td><?php echo $col_fam;?></td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td>E0</td>
                                                                <td><?php echo $col_e0;?></td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td>E1</td>
                                                                <td><?php echo $col_e1;?></td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td>E2</td>
                                                                <td><?php echo $col_e2;?></td>
                                                               
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>ploygons</td>
                                                                <td><?php echo $col_ploygons; ?></td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>




                                    </div>
                                </div>
                          </div><!-- end col-6-->


                            <div class="col-md-6 ">
                                  <?php  for($i=0;$i<3;$i++){ 
                                                                 if($i==0){
                                                                    echo '
                                                                <div class="portlet">
                                                                    <div class="portlet-heading">
                                                                        <h3 class="portlet-title text-dark text-uppercase">
                                                                            First Style
                                                                        </h3>
                                                                       
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div id="portlet2" class="panel-collapse collapse in">
                                                                        <div class="portlet-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                   

                                                                                   
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                         }//end first condition here 
                                                         else if($i==1){
                                                                  echo '
                                                                <div class="portlet">
                                                                    <div class="portlet-heading">
                                                                        <h3 class="portlet-title text-dark text-uppercase">
                                                                            Current Style
                                                                        </h3>
                                                                       
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div id="portlet2" class="panel-collapse collapse in">
                                                                        <div class="portlet-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                   

                                                                                   
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                         }else{
                                                             echo '
                                                                <div class="portlet">
                                                                    <div class="portlet-heading">
                                                                        <h3 class="portlet-title text-dark text-uppercase">
                                                                            Available Style
                                                                        </h3>
                                                                       
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div id="portlet2" class="panel-collapse collapse in">
                                                                        <div class="portlet-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                   

                                                                                   
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                         }
                             }//end loop here   
                             ?>

                            </div>






                          </div>
                      </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>