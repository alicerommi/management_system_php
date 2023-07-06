<?php include 'includes/header.php'; ?>
<?php
//get admin info
    $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email='$admin_email'");
    $adminRow = mysqli_fetch_array($query);
    $adminName = $adminRow['admin_name'];
?>
<style>
    .footer {
        /* bottom: 0; */
    }
</style>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                        <div class="col-md-12 text-left">
                            <h3>Welcome! <?php echo $adminName ;?></h3>
                        </div>

                        <?php
                         $query0 = mysqli_query($conn,"SELECT* FROM property");
                        $row0 = mysqli_num_rows($query0);
                        ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-building f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?php
                                            if($row0>0)
                                            echo $row0;
                                            else
                                            echo "0";
                                        ?>

                                    </h2>
                                    <p class="m-b-0">Total Propiedades</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        $query1 = mysqli_query($conn,"SELECT* FROM projects");
                        $row1 = mysqli_num_rows($query1);
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-bar-chart f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        if($row1>0)
                                                echo $row1 ;
                                            else echo "0";
                                    ?></h2>
                                    <p class="m-b-0">Total Proyectos</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $query2 = mysqli_query($conn,"select* from contact ");
                    $row2 = mysqli_num_rows($query2);
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-comments f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                            <?php
                                                    if($row2>0)
                                                        echo $row2;
                                                    else
                                                        echo "0";
                                            ?>

                                    </h2>
                                    <p class="m-b-0">Users Mensajes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        $query3 = mysqli_query($conn,"SELECT* FROM property WHERE property_type='Venta'");
                        $row3 = mysqli_num_rows($query3);
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-home f-s-40 color-info"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        if($row3 >0)
                                            echo $row3 ;
                                        else
                                            echo "0";
                                    ?></h2>
                                    <p class="m-b-0">Propiedades For Vendida</p>
                                </div>
                            </div>
                        </div>
                    </div>

                     <?php
                        $query4 = mysqli_query($conn,"SELECT* FROM property WHERE property_type='Alquiler'");
                        $row4 = mysqli_num_rows($query4);
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-building f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        if($row4 >0)
                                            echo $row4 ;
                                        else
                                            echo "0";
                                    ?></h2>
                                    <p class="m-b-0">Propiedades For Alquilada</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    //for getting the daily visitors
                    $date = date('Y-m-d', time()); //today date current date

                   // $query =  mysqli_query($conn,"SELECT* FROM visitors WHERE `date`='$date'");
                    $query =  mysqli_query($conn,"SELECT* FROM visitors");
                     $row5 =  mysqli_num_rows($query);

                     // echo date("m");

                    ?>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-eye f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        if($row5 >0)
                                            echo $row5 ;
                                        else
                                            echo "0";
                                    ?></h2>
                                    <p class="m-b-0">Total Visitors</p>
                                </div>
                            </div>
                        </div>
                    </div>

                      <?php
                    //for getting the daily visitors
                    $date = date('Y-m-d', time()); //today date current date

                   $query =  mysqli_query($conn,"SELECT* FROM visitors WHERE `date`='$date'");
                   // $query =  mysqli_query($conn,"SELECT* FROM visitors");
                     $row5Today =  mysqli_num_rows($query);

                     // echo date("m");

                    ?>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-eye f-s-40  color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        if($row5Today >0)
                                            echo $row5Today ;
                                        else
                                            echo "0";
                                    ?></h2>
                                    <p class="m-b-0">Today Visitors</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $counterMonthVisits = 0;
                    //for getting the monthly visitors
                    $date = date('m', time()); //today date current date
                    // echo $date;
                    // die;
                    $query =  mysqli_query($conn,"SELECT* FROM visitors");
                    while($row6 = mysqli_fetch_array($query)){
                        $dateDB = $row6['date'];
                      //  $monthDb = date("m",strtotime($dateDB));
                        $str = explode("-", $dateDB);
                        if($date == $str[1]){
                            $counterMonthVisits++;
                        }
                    }
                    ?>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-eye f-s-40 color-info"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        if($counterMonthVisits >0)
                                            echo $counterMonthVisits ;
                                        else
                                            echo "0";
                                    ?></h2>
                                    <p class="m-b-0">Monthly Visitors</p>
                                </div>
                            </div>
                        </div>
                    </div>

                     <?php
                    $counterYearVisits = 0;
                    //for getting the monthly visitors
                    $date = date('Y', time()); //today date current date
                    $query =  mysqli_query($conn,"SELECT* FROM visitors");
                    while($row7 = mysqli_fetch_array($query)){
                        $yearDB = $row7['date'];
                        $str = explode("-", $yearDB);
                        if($date == $str[0]){
                            $counterYearVisits++;
                        }
                    }
                    ?>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-eye f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        if($counterYearVisits >0)
                                            echo $counterYearVisits ;
                                        else
                                            echo "0";
                                    ?></h2>
                                    <p class="m-b-0">Yearly Visitors</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            <!-- End Container fluid  -->
    <?php include 'includes/footer.php'; ?>
