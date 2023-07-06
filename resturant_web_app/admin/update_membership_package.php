<?php
        include 'includes/header.php';
?>
<div class="content-page">
                <div class="content">
                    <div class="container">
                         <!-- Page-Title -->

                        <div class="row pull-right " >
                            <div class="col-sm-12 pull-right" id="back_btn">
                               <a href="all_membership_packages.php" class=" btn btn-purple"><i class="ion-ios7-arrow-back"></i> Back</a>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                            <?php  
                                if(isset($_GET['updated'])){
                                        if($_GET['updated']==1){
                                            messages("Membership Package Has Been Updated Successfully.","success");
                                        }else if($_GET['updated']==0){
                                              messages("Error in Udpating Membership Package","warning");
                                        }
                                }

                                if(isset($_GET['package_id'])){
                                    $package_id = intval($_GET['package_id']);
                                    $get_package_details = mysqli_query($conn,"select* from packages where package_id = $package_id");
                                    $row = mysqli_fetch_array($get_package_details);
                                    $package_name = $row['package_name'];
                                    $package_details = $row['package_details'];
                                    $package_price_per_month = $row['package_price_per_month'];
                                    $package_per_customer = $row['package_per_customer'];
                                    $package_location = $row['package_location'];
                                }
                            ?>
                                <div class="panel panel-color panel-success">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Update Package Details</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form method="post"  action="actions/update.php">
                                            <input type="hidden" name="package_id" value="<?=$package_id; ?>">
                                            <div class="form-group">
                                                <label>Package Name</label>
                                                <input type="text" name="package_name" class="form-control" value="<?=$package_name  ?>">
                                            </div>
                                                <div class="form-group">
                                                    <label>Add Package Details</label>
                                                    <textarea class="form-control" name="package_details" rows="6"><?=$package_details  ?></textarea>
                                                </div>
                                            <div class="form-group">
                                                <label>Package Price (Per Month In USD)</label>
                                                <input type="number" min="10" name="package_price_per_month_usds" class="form-control" value="<?=$package_price_per_month  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Commision (Per Custom In USD)</label>
                                                <input type="number" min="1"  name="package_price_per_sale" class="form-control" value="<?=$package_per_customer  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control" value="<?=$package_location; ?>" required>
                                            </div>
                                            <div class="form-group pull-right">
                                                <button type="submit" class="btn btn-primary" name="update_package_details">Update Details</button>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
</div>
<?php
        include 'includes/footer.php';
?>