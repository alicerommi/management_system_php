<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">

                                <?php 

                                 show_button("add_electricity_provider.php","Add New Electricity Supplier","info","plus");
                                if(isset($_GET['delete'])){
                                    if($_GET['delete']==1){
                                        messages("Deleted Successfully","danger");
                                    }else{
                                        messages("Error in Deleting Details","warning");
                                    }
                                }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View All Electricity Suppliers</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           <!--  <th>ID</th> -->
                                                            <th>#</th>
                                                            <th>Name</th>
                                                          <!--   <th>Image</th> -->
                                                            <th>Added Date & Time</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                                $query = mysqli_query($conn,"SELECT * FROM `electricity_energy_suppliers`");
                                                                // $i=0;
                                                                #$images = "../uploads/engery_sources/";
                                                                while($row= mysqli_fetch_array($query)){
                                                                    $electricity_provider_id   = $row['electricity_provider_id'];
                                                                    $electricity_provider_name = ucwords($row['electricity_provider_name']);
                                                                    #$img = $row['energy_supplier_img'];
                                                                    #$energy_supplier_img = "<img src=".$images.$img." style='height:50px; width:50px;'/>";
                                                                    $electricity_provider_timestamp = $row['electricity_provider_timestamp'];
                                                                    $energy_suppliers_timestamp = human_timedate($electricity_provider_timestamp);

                                                                        $actions = '<a class="btn btn-danger" id="'.$electricity_provider_id.'" title="Delete This Entry" href="actions/delete.php?delete_electricity_supplier=1&energy_supplier_id='.$electricity_provider_id.'"><i class="fa fa-times"></i></a>';

                                                                          echo '<tr>
                                                                            <td>'.$electricity_provider_id.'</td>
                                                                            <td>'.$electricity_provider_name.'</td>
                                                                            <td>'.$energy_suppliers_timestamp.'</td>
                                                                            <td>'.$actions.'</td>
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
                        </div> <!-- End Row -->


                   

<?php
		include 'includes/footer.php';
?>

<script type="text/javascript">
      $("#supportmsgs").dataTable(); 
</script>