<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <?php 
                                 show_button("add_energy_providers.php","Add New Gas Supplier","info","plus");
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
                                        <h3 class="panel-title">View All Gas Suppliers</h3>
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
                                                                $query = mysqli_query($conn,"SELECT * FROM `gas_energy_suppliers` ");
                                                                while($row= mysqli_fetch_array($query)){
                                                                    $energy_supplier_id   = $row['energy_supplier_id'];
                                                                    $energy_supplier_name = ucwords($row['energy_supplier_name']);
                                                                    $img = $row['energy_supplier_img'];
                                                                   
                                                                    $energy_suppliers_timestamp = $row['energy_suppliers_timestamp'];
                                                                    $energy_suppliers_timestamp = human_timedate($energy_suppliers_timestamp);

                                                                        $actions = '<a class="btn btn-danger" id="'.$energy_supplier_id.'" title="Delete This Entry" href="actions/delete.php?delete_supplier=1&energy_supplier_id='.$energy_supplier_id.'"><i class="fa fa-times"></i></a>';

                                                                          echo '<tr>
                                                                            <td>'.$energy_supplier_id.'</td>
                                                                            <td>'.$energy_supplier_name.'</td>
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
    $(document).ready(function(){
        $("#supportmsgs").dataTable(); 
    });
</script>