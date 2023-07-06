<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                                <?php
                                    if(isset($_GET['vehicle_type_id']) && isset($_GET['vehicle_type_name'])){
                                        $vehicle_type_id_get = intval($_GET['vehicle_type_id']);
                                      
                                        $vehicle_type_name_get = $_GET['vehicle_type_name'];
                                    }else{
                                           messages("there are some missing parameters","warning"); 
                                            die;
                                    }
                                ?>

                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Filter Applier For <?= $vehicle_type_name_get;?></h3>
                                        </div>
                                        <div class="panel-body">
                                           <form class="form-inline" role="form">
                                              <?php echo '<input type="hidden" value="'.$vehicle_type_id_get.'" id="vehicle_type_id" name="vehicle_type_id">'; ?>
                                            <div class="form-group">
                                                <label class="sr-only" for="">Manufacture Name</label>
                                                <input type="text" class="form-control" id="manufacture_filter" name="manufacture_filter" placeholder="Manufacture Name" maxlength="50">
                                            </div>
                                             <div class="form-group">
                                                <label class="sr-only" for="">Model Name</label>
                                                <input type="text" class="form-control" id="model_filter" name="model_filter" placeholder="Model Name" maxlength="50">
                                            </div>
                                              
                                            
                                           
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-l-10" >Apply</button>
                                        </form>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Results for <?=$vehicle_type_name_get ?></h3>
                                        </div>
                                        <div class="panel-body">
                                         <table id="filter_table" class="table table-striped table-bordered">
                                                        <?php
                                                            info_message("wait! let me fetch results for ".$vehicle_type_name_get);
                                                        ?>
                                                </table>
                                            </div>
                                        </div>  
                                </div>
                                </div>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>

<script type="text/javascript">
        $(document).ready(function(){
            $("form").submit(function(e){
                let d = $(this).serialize();
                $.ajax({
                         data:d+"&form_filter=1",
                        url:'actions/fetch.php',
                        method:'post',
                        success:function(d){
                            $("#filter_table").empty().append(d);
                        }
                });
                e.preventDefault();
            });
            setTimeout(function(){
                      $.ajax({
                        method:'post',
                        data:{
                            vehicle_type_id:$("#vehicle_type_id").val(),
                            filter_applier:1,
                        },
                        url:'actions/fetch.php',
                        success:function(d){
                            $(".alert").remove();
                            $("#filter_table").append(d);
                        }

                });
            },2000);

        });                    
</script>