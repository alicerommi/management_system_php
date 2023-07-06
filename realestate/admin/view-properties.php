<?php include 'includes/header.php'; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View All Propiedades</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="javascript:void(0)">Propiedades</a></li>
                        <li class="breadcrumb-item active">View All Propiedades</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12">

                      <div class="col-md-12 text-right" >
                          <a class="btn btn-primary" href="add-property.php"><i class="fa fa-plus"></i>&nbsp;Add A New Propiedade </a>
                      </div>



                       <?php 
                      if(isset($_GET['delStatus'])){
                        if($_GET['delStatus']==1){
                          echo '<div class="alert alert-danger">The Property Has Been Deleted Successfully</div>';
                        }else if($_GET['delStatus']==0){
                          echo '<div class="alert alert-warning">Error in Deleting Property</div>';
                        }
                      }
                    ?>
                      <div class="panel panel-primary">
                          <div class="panel-heading"><h3 class="panel-title">View Properties</h3></div>
                          <div class="panel-body">
                           <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Property Name</th>
                                  <th>Property Price</th>
                                  <th>Status</th>
                                  <th>Tipo</th>
                                  <th>Added Date</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                //showing all the added properties in form of table
                                $query  = mysqli_query($conn,"SELECT* FROM property");
                                if(mysqli_num_rows($query)>0){
                                  while($rowProperty = mysqli_fetch_array($query)){
                                    $property_id = $rowProperty['property_id'];
                                      $property_type = $rowProperty['property_type'];
                                       $property_status = $rowProperty['property_status'];
                                      $property_name = $rowProperty['property_name'];
                                      $property_price= $rowProperty['property_price'];
                                      $property_recordDate = date("d-m-Y",strtotime($rowProperty['property_recordDate']));
                                      echo '<tr>';
                                      echo '<td>'.ucwords($property_name).'</td>';
                                       echo '<td>'.$property_price.'</td>';
                                         echo '<td>'.$property_status.'</td>';
                                      echo '<td>'.$property_type.'</td>';
                                      echo '<td>'.$property_recordDate.'</td>';
                                      echo '<td><a class="btn btn-success" href="edit-property.php?property_id='.$property_id.'"><i class="fa fa-edit"></i></button>
                                    <a href="property-detail.php?property_id='.$property_id.'" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" href="actions/delete.php?property_id='.$property_id.'"><i class="fa fa-trash"></i></a></td>';
                                      echo '</tr>';
                                  }//end while here
                                } //end num rows condition here 
                                ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>Property Name</th>
                                  <th>Property Price</th>
                                  <th>Status</th>
                                  <th>Tipo</th>
                                  <th>Added Date</th>
                                  <th>Actions</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>


            <!-- End Container fluid  -->

<?php include 'includes/footer.php'; ?>
