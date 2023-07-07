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
            <a class="nav-link active" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="diet-plan.php">Diet Plan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Start: About Page Section -->
  <div class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="heading">
            <h2>About <span>Us</span></h2>
          </div>
          <div class="title">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End: About Page Section -->

  <?php include 'includes/footer.php';?>
