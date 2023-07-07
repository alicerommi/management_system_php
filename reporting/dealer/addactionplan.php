<?php
include_once "includes/session-check.php";
include_once "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php if(isset($_SESSION['dealer'])){ ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Dealer | Reporting Tool</title>
      <!-- Wizard CSS -->
    <link href="../plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
<?php include_once "includes/header.html"; ?>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">
                    <a class="logo" href="index.php">
                            <b>
                                <img src="images/main.png" alt="home"    style="height: 100%;"/>
                            </b><span class="hidden-xs"><strong>P</strong>eugeot</span>
                    </a>
                </div>
               <!--  <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>    -->      
        </nav>
<?php include "includes/left-navbar.html"; ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dealer Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="logout.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Log Out</a>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Action Plans</a></li>
                            <li class="active">Add Action Plan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
               <!--  <div class="row"> -->

                      <!-- .row -->
                      <?php
                      //get the dealer name 
                      $dealer_email = $_SESSION['dealer'];
                      $query = "SELECT * FROM dealers WHERE `dealer_email`='$dealer_email'";
                      $result = mysqli_query($con,$query);
                      $row = mysqli_fetch_array($result);
                      $dealerName = $row['dealer_name'];
                      ?>
                <div class="row">
                    <div class="col-sm-12">
                      <?php
                      if(isset($_GET['info'])){

                        if($_GET['info']==1){
                          echo '<div class = "alert alert-success">The Action Plan has Been Added</div>';
                        }else{
                            echo '<div class = "alert alert-warning">Error in Adding Action Plan</div>';
                        } 

                      }

                      ?>
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Add Action Plan</h3>
                            <p class="text-muted m-b-30 font-13"> Enter the Details for Action Plan</p>
                            <div id="exampleBasic" class="wizard">
                                <ul class="wizard-steps" role="tablist">
                                    <li class="active" role="tab">
                                        <h4><span>1</span>Step</h4> </li>
                                    <li role="tab">
                                        <h4><span>2</span>Step</h4> </li>
                                    <li role="tab">
                                        <h4><span>3</span>Step</h4> </li>
                                </ul>

                        <form method="post" action="actions/insert.php" enctype='multipart/form-data'>
                                <div class="wizard-content">
                                    <div class="wizard-pane active" role="tabpanel">
                                       
                                            <div class="form-group">
                                                <label>Action Plan Title</label>
                                                <input type="text" name="titletab1" maxlength="40" class="form-control" required>
                                            </div>
                                           <div class="form-group">
                                                <label>Assigned To</label>
                                                <input type="text" name="assignedTotab1" value="<?php echo $dealerName; ?>" readonly  maxlength="40" class="form-control">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" required name="statustab1">
                                                       <option value="not started">Not Started</option> 
                                                        <option value="in progress">In Progress</option> 
                                                        <option value="completed">Completed</option> 
                                                        <option value="cancelled">Cancalled</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                 <label>Description</label>   
                                                 <textarea name="descriptiontab1" type="text" rows="3" class="form-control" maxlength="1000"></textarea>
                                            </div>

                                            <div class="form-group">
                                                 <label>Due Date</label>   
                                                 <input name="dueDatetab1"  type="date" class="form-control"  required>
                                            </div>
                                                
                                        
                                    </div>

                                    <div class="wizard-pane" role="tabpanel">
                                       <div class="row"> 

                                                <div class="col-lg-4 b-r">
                                                    
                                                     <p><strong>1. Enter Details For Preparation Level</strong></p><hr/>
                                                     <div class="form-group">
                                                         <label>Due Date</label>   
                                                         <input name="dueDatetab2Col1"  type="date"   class="form-control"  required>
                                                    </div>

                                                     <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" required name="statustab2Col1">
                                                               <option value="not started">Not Started</option> 
                                                                <option value="in progress">In Progress</option> 
                                                                <option value="completed">Completed</option> 
                                                                <option value="cancelled">Cancalled</option>

                                                        </select>
                                                    </div>

                                                     <div class="form-group">
                                                         <label>Requirements</label>   
                                                         <textarea name="requirementstab2Col1" type="text" rows="4" class="form-control" maxlength="1000"></textarea>
                                                    </div>   
                                                    <div class="form-group">
                                                        <label>Attach Files</label>
                                                        <input name="uploadTab2Col1[]" class="form-control" type="file" multiple="multiple" /> 
                                                    </div>

                                                </div><!--end first col-4-->

                                                <div class="col-lg-4 b-r">
                                                    
                                                    <p><strong>2. Enter Details For Realisation Level</strong></p><hr/>
                                                     <div class="form-group">
                                                         <label>Due Date</label>   
                                                         <input name="dueDatetab2Col2"  type="date" name="dueDatetab1" class="form-control" required>
                                                    </div>

                                                     <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" required name="statustab2Col2">
                                                               <option value="not started">Not Started</option> 
                                                                <option value="in progress">In Progress</option> 
                                                                <option value="completed">Completed</option> 
                                                                <option value="cancelled">Cancalled</option>

                                                        </select>
                                                    </div>

                                                     <div class="form-group">
                                                         <label>Requirements</label>   
                                                         <textarea name="requirementstab2Col2" type="text" rows="4" class="form-control" maxlength="1000"></textarea>
                                                    </div> 

                                                    <div class="form-group">
                                                        <label>Attach Files</label>
                                                        <input name="uploadTab2Col2[]" class="form-control" type="file" multiple="multiple" /> 
                                                    </div> 
                                                </div><!--end seocnd  col-4--> 

                                        <div class="col-lg-4">
                                               <p><strong>3. Enter Details For Performance Review</strong></p><hr/>
                                                     <div class="form-group">
                                                         <label>Due Date</label>   
                                                         <input name="dueDatetab2Col3"  type="date"  class="form-control"  required>
                                                    </div>

                                                     <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" required name="statustab2Col3">
                                                               <option value="not started">Not Started</option> 
                                                                <option value="in progress">In Progress</option> 
                                                                <option value="completed">Completed</option> 
                                                                <option value="cancelled">Cancalled</option>

                                                        </select>
                                                    </div>

                                                     <div class="form-group">
                                                         <label>Requirements</label>   
                                                         <textarea name="requirementstab2Col3" type="text" rows="4" class="form-control" maxlength="1000"></textarea>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Attach Files</label>
                                                        <input name="uploadTab2Col3[]" class="form-control" type="file" multiple="multiple" /> 
                                                    </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="wizard-pane" role="tabpanel">
                                        <div class="form-group">
                                                <label>KPI Name</label>
                                               <input type="text" name="kpinameTab3" min="0" maxlength="30"  class="form-control"> 
                                        </div>
                                          <!--  <div class="form-group">
                                                <label>KPI Value</label>
                                               <input type="number" name="kpivalueTab3" min="0" class="form-control"> 

                                            </div> -->
                                            <div class="form-group">
                                                <label>KPI Base Value</label>
                                               <input type="number" name="basevalueTab3" min="0" class="form-control"> 
                                            </div>
                                            <div class="form-group">
                                                <label>Target Value</label>
                                               <input type="number" name="targetvalueTab3" min="0" class="form-control"> 
                                            </div>
                                            <div class="form-group">
                                                <label>Final Value</label>
                                               <input type="number" name="finalvalueTab3" min="0" class="form-control"> 
                                            </div>

                                            <input type="submit" name="submit" class="btn btn-sucess">
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
                 </div>
                
                
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul>
                                <li><b>Layout Options</b></li>
                                <li>
                                    <div class="checkbox checkbox-info">
                                        <input id="checkbox1" type="checkbox" class="fxhdr">
                                        <label for="checkbox1"> Fix Header </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-warning">
                                        <input id="checkbox2" type="checkbox" class="fxsdr">
                                        <label for="checkbox2"> Fix Sidebar </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox4" type="checkbox" class="open-close">
                                        <label for="checkbox4"> Toggle Sidebar </label>
                                    </div>
                                </li>
                            </ul>
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                           <!-- <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <?php include 'includes/footer.html'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include_once "includes/scripts.html";} ?>
</body>

</html>
<!-- Form Wizard JavaScript -->
    <script src="../plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
  <script type="text/javascript">
        (function () {
            $('#exampleBasic').wizard({
                onFinish: function () {
                    swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                }
            });
            $('#exampleBasic2').wizard({
                onFinish: function () {
                    swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                }
            });
            $('#exampleValidator').wizard({
                onInit: function () {
                    $('#validation').formValidation({
                        framework: 'bootstrap'
                        , fields: {
                            username: {
                                validators: {
                                    notEmpty: {
                                        message: 'The username is required'
                                    }
                                    , stringLength: {
                                        min: 6
                                        , max: 30
                                        , message: 'The username must be more than 6 and less than 30 characters long'
                                    }
                                    , regexp: {
                                        regexp: /^[a-zA-Z0-9_\.]+$/
                                        , message: 'The username can only consist of alphabetical, number, dot and underscore'
                                    }
                                }
                            }
                            , email: {
                                validators: {
                                    notEmpty: {
                                        message: 'The email address is required'
                                    }
                                    , emailAddress: {
                                        message: 'The input is not a valid email address'
                                    }
                                }
                            }
                            , password: {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    }
                                    , different: {
                                        field: 'username'
                                        , message: 'The password cannot be the same as username'
                                    }
                                }
                            }
                        }
                    });
                }
                , validator: function () {
                    var fv = $('#validation').data('formValidation');
                    var $this = $(this);
                    // Validate the container
                    fv.validateContainer($this);
                    var isValidStep = fv.isValidContainer($this);
                    if (isValidStep === false || isValidStep === null) {
                        return false;
                    }
                    return true;
                }
                , onFinish: function () {
                    $('#validation').submit();
                    swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                }
            });
            $('#accordion').wizard({
                step: '[data-toggle="collapse"]'
                , buttonsAppendTo: '.panel-collapse'
                , templates: {
                    buttons: function () {
                        var options = this.options;
                        return '<div class="panel-footer"><ul class="pager">' + '<li class="previous">' + '<a href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' + '</li>' + '<li class="next">' + '<a href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' + '<a href="#"' + this.id + '" data-wizard="finish" type="submit" name="finish" role="button">' + options.buttonLabels.finish + '</a>' + '</li>' + '</ul></div>';
                    }
                }
                , onBeforeShow: function (step) {
                    step.$pane.collapse('show');
                }
                , onBeforeHide: function (step) {
                    step.$pane.collapse('hide');
                }
                , onFinish: function () {
                  
                }
            });
        })();
    </script>