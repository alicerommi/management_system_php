<?php include 'includes/header.php';?>
<style type="text/css">
  
  .alert{
        margin-top: 20px;
  }
</style>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add DietPlan Filters</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Plan Filters</a></li>
                        <li class="breadcrumb-item active">Add Plan Filter</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">


                 



                  <div class="col-md-12" >

                     <div class="col-md-12 text-right" style="padding: 0px;">
                          <a class="btn btn-warning" href="view-planfilters.php"><i class="fa fa-eye"></i>&nbsp;View All Items Filters </a>
                      </div>

                       <div class="alert alert-success">
                  
                    </div>

                     <div class="alert alert-danger">
                  
                    </div>

                    <div class="alert alert-warning">
                  
                    </div>

                      <div class="panel panel-default">

                   <!--      <div class="panel-heading"><h2>Apply Filters On Items</h2></div> -->
                        <div class="panel-body card">
                          <p id="error-messages"></p>
                     <!--  <div class="card"> -->
                       
                         <div class="form-group">
                            <!--  <label for="">Choose Food Item</label> -->
                                <div class="input-group">
                           
                            <?php
                            $query  = mysqli_query($conn,"SELECT* FROM items WHERE item_active=1");
                            echo '<select name="choosenItem" id="choosenItem" class="form-control" required>';
                            echo '<option selected disabled value="">Choose Food Item</option>';
                            if(mysqli_num_rows($query)>0){
                              while($r = mysqli_fetch_assoc($query)){
                                $item_id = $r['item_id'];
                                $item_name = $r['item_name'];
                                echo '<option value='.$item_id.'>'.$item_name.'</option>'; 
                              }
                            }else{
                              echo '<option selected disabled> No Diet Plan has Been Added Yet</option>';
                            }
                            echo '</select>';

                            ?>

                          </div>
                          </div>
                      <!-- </div>  --> 

                    <div class="card">
                      
                      <table id="addPlanFilterTable" class="table table-striped table-bordered" style="width:100%">
                     <!--  <thead>
                          <tr>
                             <th>Choose Diet Plan</th>
                             <th>Choose Filter</th>
                            
                             
                          </tr>
                      </thead> -->
                      <tbody>
                        
                        <tr>
                          <td>
                         <div class="input-group">
                            <?php
                            $query  = mysqli_query($conn,"SELECT* FROM dietplan where dietplan_active=1");
                            echo '<select name="choosenPlan" id="choosenPlan" class="form-control" required> ';
                            echo '<option selected disabled value="">Choose A Diet Plan</option>';
                            if(mysqli_num_rows($query)>0){
                              while($r = mysqli_fetch_assoc($query)){
                                $dietplan_id = $r['dietplan_id'];
                                $dietplan_name = $r['dietplan_name'];
                                echo '<option value='.$dietplan_id.'>'.$dietplan_name.'</option>'; 
                              }
                            }else{
                              echo '<option selected disabled> No Diet Plan has Been Added Yet</option>';
                            }
                            echo '</select>';

                            ?>

                          </div>
                        </td>
                       
                          <td>
                              <div class="form-group">
                                <select class="form-control" name="choosenFilter" id="choosenFilter" required>
                                  <option selected disabled value="">Choose A Filter</option>
                                    <option value="allowed">Allowed</option>
                                    <option value="not allowed">Not Allowed</option>
                                    <option value="cautionary">Cautionary</option>
                                </select>
                              </div>
                          </td>

                         <!--  <td> -->
                             
                        <!--   </td> -->
                        </tr>
                      </tbody>
                    </table>
                   
                    </div>
                    <div class="form-group text-right">
                      <button id="saveFilter" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Save </button>
                   </div>
               <!--   </form> -->
                       </div>

                  </div>
                  </div>
                </div>
            </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
<script type="text/javascript">
  $(document).ready(function() {
   // $('#addPlanFilterTable').DataTable();
$('.alert').hide();

$(document).on('change','#choosenItem',function(){
  $('#error-messages').empty();
      });

$(document).on('change','#choosenPlan',function(){
  $('#error-messages').empty();
      });


$(document).on('change','#choosenFilter',function(){
  $('#error-messages').empty();
  });
   $(document).on('click','#saveFilter',function(){

      var choosenItem = $('#choosenItem').find(':selected').val();
      var choosenPlan = $('#choosenPlan').find(':selected').val();
      var choosenFilter = $('#choosenFilter').find(':selected').val();

      if(choosenItem.length==0){
          $('#choosenItem').focus();
          $('#error-messages').html("Choose Food Item");
          $('#error-messages').css('color','red');
      }else if(choosenPlan.length==0){
         $('#choosenPlan').focus();
        $('#error-messages').html("Choose A Diet Plan");
          $('#error-messages').css('color','red');
      }else if(choosenFilter.length==0){
          $('#choosenFilter').focus();
          $('#error-messages').html("Choose A Filter");
          $('#error-messages').css('color','red');
      }else{
          //ajax call now
          var dataString = "choosenItem="+choosenItem+"&choosenPlan="+choosenPlan+"&choosenFilter="+choosenFilter+"&addPlanFilter=1";
        
          $.ajax({
                method:'post',
                url:'actions/insert.php',
                data:dataString,
                success:function(data){
                  if(data==2)//already exists
                  {
                     //  $('#error-messages').empty();
                     $('.alert-warning').show();
                        $('.alert-warning').html("The Filter is already Applied on this Item for this Plan");
                        //$('#error-messages').css('color','red');
                  }else if(data==1){
                     $('.alert-success').show();
                      //$('#error-messages').empty();
                        $('.alert-success').html("The Filter has been applied to this item successfully");
                       // $('#error-messages').css('color','green');
                  }else {
                       // $('#error-messages').empty();
                       $('.alert-danger').show();
                        $('.alert-danger').html("Error in applying the filter on the item");
                        //$('#error-messages').css('color','red');
                  } 



                }
          });

      }

   });

   //check whether the filter for this item is already set or not

   // function check_exist(choosenItem,choosenPlan){
   //     var flag =0;
   //     var dataString = "choosenItem="+choosenItem+"&choosenPlan="+choosenPlan;
   //      $.ajax({
   //          method:'post',
   //              url:'actions/fetch.php',
   //              data:dataString,
   //              success:function(data){
   //                if(data==1)
   //                   { flag  = 1;}
   //              } 
   //      }); 
   //      return flag;
   // }


  });//end ready function here 
  </script>
