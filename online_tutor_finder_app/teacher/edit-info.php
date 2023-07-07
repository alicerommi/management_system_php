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
                                <h4 class="pull-left page-title">Edit Details</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Camera</a></li>
                                    <li class="active">Edit Information</li>
                                </ol>
                            </div>
                        </div>

                          <a class="btn btn-default pull pull-right" href="view-AllData.php" style="margin-bottom: 23px;">
                                    <i class="md md-keyboard-arrow-left"> </i>Back to Camera List
                         </a>

                         <?php
                          if(isset($_GET['updateStatus'])){
                            if($_GET['updateStatus']==1)
                              echo '<div class="alert alert-success">The Details Has Been Updated</div>';
                            else if($_GET['updateStatus'])
                                 echo '<div class="alert alert-warning">Error in Adding Details</div>';
                          }
                         ?>
                         
                      <div class="row">
                         <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Update Details</h3>
                                    </div>
                                    <div class="panel-body">
                                      <form action="actions/update.php" method="post">
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

                                                <div class="form-group">
                                                        <label>Camera Number</label>
                                                        <input type="text" name="cameraNum" class="form-control" value="<?php echo $row_cameraNum; ?>" required>

                                                </div>

                                    <div class="col-md-4">

                                                <input type="hidden" name="row_id" value="<?php echo $row_id; ?>">
                                                <div class="form-group">
                                                 <label>1x:</label>   
                                                      <input type="text" name="1x"  class="form-control" required value="<?php echo $col_1x;?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Plaza:</label> 
                                                      <input type="text" name="plaza"  class="form-control" required value="<?php echo $col_plaza;?>">
                                                </div>


                                                <div class="form-group">
                                                    <label>Building:</label>
                                                        <input type="text" name="building"  class="form-control" required value="<?php echo $col_building;?>">

                                                </div>


                                                <div class="form-group">
                                                    <label>Floor:</label> 
                                                    <input type="text" name="floor" class="form-control" required value="<?php echo $col_floor; ?>">
                                                </div>


                                                <div class="form-group">
                                                    <label>Camera:</label> 
                                                    <input type="text" name="camera" class="form-control" required value="<?php echo $col_camera;?>">
                                                </div>


                                                <div class="form-group">
                                                    <label>Flat:</label> 
                                                      <input type="text" name="flat" class="form-control" required value="<?php echo $col_flat;?>">
                                                </div>



                                                <div class="form-group">
                                                    <label>Room:</label> 
                                                      <input type="text" name="room" class="form-control" required value="<?php echo $col_room;?>">
                                                </div>



                                                <div class="form-group">
                                                    <label>Room Section:</label> 
                                                    <input type="text" name="roomSection" class="form-control" required value="<?php echo $col_roomsection;?>">
                                                </div>
                                                

                                        </div> 

                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Room Type:</label>
                                                        <input type="text" name="roomtype" class="form-control" required value="<?php echo $col_roomtype; ?>">

                                                </div>

                                                <div class="form-group">
                                                    <label>Room Config:</label>
                                                        <input type="text" name="roomconfig" class="form-control" required value="<?php echo $col_roomconfig; ?>">

                                                </div>

                                                 <div class="form-group">
                                                    <label>VinSet:</label>
                                                        <input type="text" name="vinset" class="form-control" required value="<?php echo $col_vinset; ?>">

                                                </div>

                                                    <div class="form-group">
                                                    <label>Place:</label>
                                                        <input type="text" name="place" class="form-control" required value="<?php echo $col_place; ?>">

                                                </div>


                                                <div class="form-group">
                                                    <label>Type:</label>
                                                        <input type="text" name="type" class="form-control" required value="<?php echo $col_type; ?>">
                                                </div>

                                                 <div class="form-group">
                                                    <label>Link-Now:</label>
                                                        <input type="text" name="linknow" class="form-control" required value="<?php echo $col_linkNow; ?>">
                                                </div>

                                                 <div class="form-group">
                                                    <label>Active:</label>
                                                        <input type="text" name="active" class="form-control" required value="<?php echo $col_active; ?>">
                                                </div>


                                                 <div class="form-group">
                                                    <label>First-Style:</label>
                                                        <input type="text" name="firststyle" class="form-control" required value="<?php echo $col_firststyle; ?>">
                                                </div>


                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <label>Current Style:</label> 
                                               <input type="text" name="currentstyle" class="form-control" required value="<?php echo $col_currentstyle; ?>">
                                            </div>


                                             <div class="form-group">
                                               <label>Avaible Styles:</label> 
                                               <input type="text" name="avaiblestyles" class="form-control" required value="<?php echo $col_availablestyle; ?>">
                                            </div>

                                             <div class="form-group">
                                               <label>Order:</label> 
                                               <input type="text" name="order" class="form-control" required value="<?php echo $col_order; ?>">
                                            </div>


                                            <div class="form-group">
                                               <label>SelType:</label> 
                                               <input type="text" name="seltype" class="form-control" required value="<?php echo $col_seltype; ?>">
                                            </div>

                                              <div class="form-group">
                                               <label>Fam:</label> 
                                               <input type="text" name="fam" class="form-control" required value="<?php echo $col_fam; ?>">
                                            </div>


                                              <div class="form-group">
                                               <label>E0:</label> 
                                               <input type="text" name="e0" class="form-control"  value="<?php echo $col_e0; ?>">
                                            </div>
                                             

                                             <div class="form-group">
                                               <label>E1:</label> 
                                               <input type="text" name="e1" class="form-control"  value="<?php echo $col_e1; ?>">
                                            </div>

                                             <div class="form-group">
                                               <label>E2:</label> 
                                               <input type="text" name="e2" class="form-control"  value="<?php echo $col_e2; ?>">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Ploygons:</label>
                                          <textarea class="form-control" type="text"  cols="5" rows="6" name="Ploygons" ><?php echo $col_ploygons; ?></textarea>
                                         </div>

                                         <div class="form-group pull-right">
                                                <button type="submit" name="editInformation" class="btn btn-success">Update</button>

                                         </div>


                                      </form>
                                    </div>
                                </div>
                            </div>
                      </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>