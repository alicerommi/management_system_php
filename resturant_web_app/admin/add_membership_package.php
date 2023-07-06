<?php
        include 'includes/header.php';
?>
<div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            <?php  
                                if(isset($_GET['added'])){
                                        if($_GET['added']==1){
                                            messages("Membership Package Has Been Added Successfully.","success");
                                        }else if($_GET['added']==0){
                                              messages("Error in Adding Membership Package","warning");
                                        }
                                }

                                if(isset($_GET['alreadyExists'])){
                                    if($_GET['alreadyExists']==1){
                                         messages("A Membership Package is already exists for this location","warning");
                                    }
                                }
                            ?>
                                <div class="panel panel-color panel-success">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Add New Package Details</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form method="post"  action="actions/insert.php">
                                            <div class="form-group">
                                                <label>Package Name</label>
                                                <input type="text" name="package_name" class="form-control">
                                            </div>
                                                <div class="form-group">
                                                    <label>Add Package Details</label>
                                                    <textarea class="form-control" name="package_details" rows="6"></textarea>
                                                </div>
                                            <div class="form-group">
                                                <label>Package Price (Per Month In USD)</label>
                                                <input type="number" min="10" name="package_price_per_month_usds" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Commision (Per Custom In USD)</label>
                                                <input type="number" min="1"  name="package_price_per_sale" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control" required>
                                            </div>
                                            <div class="form-group pull-right">
                                                <button type="submit" class="btn btn-primary" name="add_new_package">Save</button>
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