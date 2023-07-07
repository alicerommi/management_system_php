<?php include 'includes/header.php';
?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Food Items</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Food Items</a></li>
                        <li class="breadcrumb-item active">Add Food Items</li>
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
                    if(isset($_GET['itemAdded'])){
                        if($_GET['itemAdded']==1){
                          echo '<div class="alert alert-success">The Item has been added successfully</div>';
                        }else if($_GET['itemAdded']==0){
                          echo '<div class="alert alert-warning">Error in adding item</div>';
                        }

                    }

                    if(isset($_GET['itemExists'])){
                        if($_GET['itemExists']==1){
                            echo '<div class="alert alert-warning">Item with this name and category is already exists</div>';
                        }
                    }
                    ?>

                    <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="view-items.php"><i class="fa fa-eye"></i>&nbsp;View All Items</a>
                      </div>

                    <div class="card">
                      <form class="" action="actions/insert.php" method="post">
                        <div class="input-group">
                          <label for="">Item Name</label>
                          <div class="input-group">
                            <input class="form-control" type="text" name="itemName" id="itemName"  required maxlength="40">
                          </div>
                        </div>
                        <div class="input-group" style="margin-top: 15px;">
                          <label for="">Choose Categories</label>
                          <div class="input-group">
                           <!--  <input class="form-control" type="text" name="choose" value="" placeholder="Choose Categories" required> -->
                            <?php
                            $query  = mysqli_query($conn,"SELECT* FROM category where category_active=1");
                            echo '<select name="choosenCate" id="choosenCate" class="form-control">';
                            if(mysqli_num_rows($query)>0){
                              while($r = mysqli_fetch_assoc($query)){
                                $category_name = $r['category_name'];
                                $category_id = $r['category_id'];
                                echo '<option value='.$category_id.'>'.$category_name.'</option>'; 
                              }
                            }else{
                              echo '<option selected disabled> No category has Been Added Yet</option>';
                            }
                            echo '</select>';

                            ?>

                          </div>
                        </div>
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary btn-add" name="addItem" id="addItem">Add Items</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>


            <!-- End Container fluid  -->

  <?php include 'includes/footer.php';?>
<script type="text/javascript">
  $(document).ready(function(){
    // $(document).on('click','#addItem',function(){
    //   var item_name = $("#itemName").val();
    //   var cate_id = $("choosenCate").find(':selected').val();


    // });
  });//end ready function here

</script>