<?php include 'includes/header.php';?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <?php
                                $query1 = mysqli_query($conn,"SELECT* FROM items WHERE item_active=1");
                                $count1 = mysqli_num_rows($query1);
                            ?>
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-briefcase f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $count1; ?></h2>
                                    <p class="m-b-0">Total Food Items</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                             <?php
                                $query2 = mysqli_query($conn,"SELECT* FROM category WHERE category_active=1");
                                $count2 = mysqli_num_rows($query2);
                            ?>
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-tasks f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $count2; ?></h2>
                                    <p class="m-b-0">Total Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                   <?php
                                $query3 = mysqli_query($conn,"SELECT * FROM `dietplan` where dietplan_active=1");
                                $count3 = mysqli_num_rows($query3);
                            ?>
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-circle f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $count3; ?></h2>
                                    <p class="m-b-0">Total Diet Plans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-envelope f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php 
                                    $query4 = mysqli_query($conn,"SELECT * FROM `messages` where message_active=1");
                                    $messagesTotal = mysqli_num_rows($query4); 
                                    ?>
                                    <h2><?php echo $messagesTotal ;?></h2>
                                    <p class="m-b-0">User Messages</p>
                                </div>
                            </div>
                        </div>
                    </div>

                  


                </div>
            <!-- End Container fluid  -->
  <?php include 'includes/footer.php';?>
