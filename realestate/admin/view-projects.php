<?php include 'includes/header.php'; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View All Proyectos</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> Proyectos</a></li>
                        <li class="breadcrumb-item active">View All Proyectos</li>
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
                          <a class="btn btn-primary" href="add-project.php"><i class="fa fa-plus"></i>&nbsp;Add A  Proyecto </a>
                      </div>


                       <?php 
                      if(isset($_GET['delStatus'])){
                        if($_GET['delStatus']==1){
                          echo '<div class="alert alert-danger">The Project Has Been Deleted Successfully</div>';
                        }else if($_GET['delStatus']==0){
                          echo '<div class="alert alert-warning">Error in Deleting Project</div>';
                        }
                      }
                    ?>

                      <div class="panel panel-primary">
                          <div class="panel-heading"><h3 class="panel-title">View Project</h3></div>
                          <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th> Proyecto Name</th>
                                  <th> Proyecto Added Date</th>
                                  <th> Proyecto Location</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $query = mysqli_query($conn,"SELECT* FROM projects");
                                  if(mysqli_num_rows($query)>0){
                                    while($row = mysqli_fetch_array($query)){
                                       $project_id = $row['project_id']; 
                                       $project_name = $row['project_name'];
                                        $project_location = $row['project_location'];
                                        $project_desctiption = $row['project_desctiption'];
                                        $project_services = $row['project_services'];
                                        $project_amenties = $row['project_amenties']; 
                                        $project_info  = $row['project_info'];
                                        $project_recordDate = date("d-m-Y",strtotime($row['project_recordDate']));
                                echo '<tr>
                                  <td>'.$project_name.'</td>
                                   <td>'.$project_recordDate.'</td>
                                   <td>'.$project_location.'</td>
                                  <td>
                                    <a class="btn btn-success" href="edit-project-details.php?project_id='.$project_id.'"><i class="fa fa-edit"></i></a>
                                    <a href="view-project-details.php?project_id='.$project_id.'" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" href="actions/delete.php?project_id='.$project_id.'"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>';

                                    }//end while loop here 
                                  }//end num rows condition here 
                                ?>
                              </tbody>
                            
                            </table>
                          </div>
                        </div>
                    </div>
                </div>


            <!-- End Container fluid  -->

<?php include 'includes/footer.php'; ?>
