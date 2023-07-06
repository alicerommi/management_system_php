<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <?php 
                               
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
                                        <h3 class="panel-title">View All User Forms Data</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                               <th>Contact#</th>
                                                               <th>County</th>
                                                                  <th>Amount (£)</th>
                                                            <th>Date & Time</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php 
                                                                $query = mysqli_query($conn,"SELECT * FROM `customer_form_filling`  inner join counties on counties.county_id = customer_form_filling.customer_county");
                                                                while($row= mysqli_fetch_array($query)){
                                                                   $customer_id  = $row['customer_id'];
                                                                    $customer_name   = $row['customer_name'];
                                                                    $customer_contact    = $row['customer_contact'];
                                                                    $customer_business_or_home   = $row['customer_business_or_home'];
                                                                    $customer_county     = $row['customer_county'];
                                                                    $customer_energy_soruce_type     = $row['customer_energy_soruce_type'];
                                                                    $customer_supplier_id    = $row['customer_supplier_id'];
                                                                    $customer_bill_type  = $row['customer_bill_type'];
                                                                    $customer_bill_amount    = $row['customer_bill_amount'];
                                                                    $customer_number_of_units    = $row['customer_number_of_units'];
                                                                    $customer_standing_charges   = $row['customer_standing_charges'];
                                                                    $customer_total_charges  = $row['customer_total_charges'];
                                                                    $customer_record_date    = $row['customer_record_date'];
                                                                    $customer_record_date = human_timedate($customer_record_date);
                                                                    $county_name = ucwords($row['county_name']);
                                                                    $del = '<a class="btn btn-danger"  title="Delete This Entry" href="actions/delete.php?delete_form_entry=1&customer_id='.$customer_id.'"><i class="fa fa-times"></i></a>';
                                                                    $actions = $del.' <button class="btn btn-info view_user_form_data" title="View More Details" id="'.$customer_id.'"><i class="fa fa-eye"></i></button>';

                                                                          echo '<tr>
                                                                            <td>'.$customer_name.'</td>
                                                                            <td>'.$customer_contact.'</td>
                                                                             <td>'.$county_name.'</td>

                                                                            <td>'.$customer_bill_amount.'</td>
                                                                            <td>'.$customer_record_date.'</td>
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
        $(document).on('click','.view_user_form_data',function(){
            let form_id = $(this).attr('id');
            $.ajax({
                url:'actions/fetch.php',
                data:{
                    form_id:form_id,
                    fetch_form_data:1,
                },
                // dataType:'json',
                method:'post',
                success:function(d){
                    $("#myLargeModalLabel").empty().append("Customer Form Details");
                    $("#modalData").empty().append(d);
                    $("#customMODAL").modal('show');
                } /// end success
            });
        });
    });
</script>