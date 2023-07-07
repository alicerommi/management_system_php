<?php
  include 'includes/database_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diet Plan</title>
  <!-- Style Css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">



    #success{
    padding: 10px 15px;
    background: rgba(76, 209, 55,.7);
    border-radius: 5px;
    color: white;
    font-size: 18px;
    font-weight: 500;
    border: 2px solid #44bd32;
    display: none;
  }

   #error{
    padding: 10px 15px;
    background: rgba(245, 34, 12,.7);
    border-radius: 5px;
    color: white;
    font-size: 18px;
    font-weight: 500;
    border: 2px solid #c0392b;
        display: none;
  }

  .red {
    color: #FC0606 !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    font-size: 13px !important;
    text-shadow: 0 2px 5px rgba(255, 6, 6, 0.4);
    letter-spacing: 1px;
    background-color: transparent !important;
  }

  .pricing-detail {
    min-height: 600px;
  }

  .green {
    color: #3AD600 !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    font-size: 13px !important;
    text-shadow: 0 2px 5px rgba(107, 244, 0, 0.4);
    letter-spacing: 1px;
    background: transparent !important;
  }

  .yellow {
    color: #F79F1F !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    font-size: 13px !important;
    text-shadow: 0 2px 5px rgba(253, 238, 0, 0.4);
    letter-spacing: 1px;
    background: transparent !important;
  }

  .items-img {
    width: 24px;
    height: 22px;
    margin-right: 5px;
    position: relative;
    top: -2px;
  }

  .pagination-nav .pagination .page-item .active{
    background-color: black !important;
    border-color: black !important;
  }
</style>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top navigation">
    <div class="container">
      <a class="navbar-brand" href="#">Diet Plan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="diet-plan.php">Diet Plan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Start: Diet Plan Section -->
  <section class="diet-plan">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>View All Diet <span>Plans</span></h2>
          </div>
        </div>
        <div class="diet-details">
          <?php
          echo '<div id="allPlans">';
          $query = mysqli_query($conn,"SELECT * FROM `dietplan` where dietplan_active=1 LIMIT 0,5");
          if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_array($query)){  
                  $dietplan_id= $row['dietplan_id'];
                  $dietplan_name = $row['dietplan_name'];
                  $dietplan_description = $row['dietplan_description'];
                       echo '<div class="diet-con">
                            <h2>'.$dietplan_name.'</h2>
                            <p>'.$dietplan_description.'</p>
                                </div>';
               }//end while loop here
              
              }else {
                echo '<div class="alert alert-danger">The Diet Plans Has Not Added Yet</div>';
              }
          ?>
        </div>
      <?php
      //$query2 = mysqli_query($conn,"SELECT * FROM `dietplan` where dietplan_active=1");
    // ceil(8/5)   mysqli_num_rows($query2);
     //$num = ceil(mysqli_num_rows($query2)/5);
      
              echo'
              <div class="pagination-nav" aria-label="Page navigation example">
                <ul class="pagination">';
                  echo' <li class="page-item" id="previous-listpage">
                                          <a class="page-link"  data-id="1"  id="previous" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                           <span class="sr-only">Previous</span>
                                         </a>
                          </li>';


                           echo '<li class="page-item" id="pages-all"></li>';
                      echo'<li class="page-item" id="next-listpage">
                    <a class="page-link" id="next" aria-label="Next" data-id="2">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                </li>';
          ?>


        </div>
      </div>
    </div>
  </section>
  <input type="hidden" value="" id="totalPages">
  <input type="hidden" value="1" id="currentPage">
  <!-- End: Diet Plan Section -->
<?php include 'includes/footer.php';?>

<script type="text/javascript" src="js/pagination.js"></script> 