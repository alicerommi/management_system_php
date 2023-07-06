<?php 
if(isset($_GET['item_id'])){
  $item_id = $_GET['item_id'];
}else{
  echo 'invalid parameters';
  die;
}
include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Foot Items</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Foods</a></li>
                        <li class="breadcrumb-item active">Edit Foot Items</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                  <div class="col-md-12">
                    <?php
                    //show the messages
                    if(isset($_GET['itemUpdated'])){
                        if($_GET['itemUpdated']==1){
                          echo '<div class="alert alert-success">The Item has been updated successfully</div>';
                        }else if($_GET['itemUpdated']==0){
                          echo '<div class="alert alert-warning">Error in updating item</div>';
                        }

                    }
                    ?>
                    <div class="card">
                      <?php
                      $query1= mysqli_query($conn,"SELECT itm.*,cat.category_id FROM items itm,category cat  where itm.item_id=$item_id");
                            $row1 = mysqli_fetch_array($query1);
                            $item_name = $row1['item_name'];
                            $category_id1 = $row1['category_id'];
                      ?>
                      <form class="" action="actions/update.php" method="post">
                        <div class="input-group">
                          <label for="">Item Name</label>
                          <div class="input-group">
                            <input class="form-control" type="text" name="itemName"  required maxlength="40" value="<?php echo $item_name;?>">
                          </div>
                        </div>
                        <input type="hidden" name="item_id" value="<?php  echo $item_id; ?>">
                        <div class="input-group" style="margin-top: 15px;">
                          <label for="">Choose Categories</label>
                          <div class="input-group">
                            <?php
                            
                            $query  = mysqli_query($conn,"SELECT* FROM category");
                            echo '<select name="choosenCate" id="choosenCate" class="form-control">';
                            if(mysqli_num_rows($query)>0){
                              while($r = mysqli_fetch_assoc($query)){
                                $category_name = $r['category_name'];
                                 $category_id = $r['category_id'];
                                     if($category_id1==$category_id)
                                     {
                                      echo '<option value='.$category_id.' selected>'.$category_name.'</option>'; 
                                    }else{
                                         echo '<option value='.$category_id.'>'.$category_name.'</option>'; 
                                    }

                              }
                            }else{
                              echo '<option selected disabled> No category has Been Added Yet</option>';
                            }
                            echo '</select>';
                            ?>
                          </div>
                        </div>
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-add" name="updateItem">Update Item</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
