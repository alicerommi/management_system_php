<?php
        include 'includes/header.php';
 ?>

<div class="impx-page-heading uk-position-relative membership">
      <div class="impx-overlay dark"></div>
      <div class="uk-container">
        <div class="uk-width-1-1">
          <div class="uk-flex uk-flex-left">
            <div class="uk-light uk-position-relative uk-text-left page-title">
              <h1 class="uk-margin-remove">Customer Dashboard</h1><!-- page title -->
              <p class="impx-text-large uk-margin-remove">Welcome To Your Dashboard</p><!-- page subtitle -->
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="uk-padding uk-padding-remove-horizontal impx-section-pricing">
      <div class="uk-container">
        <div class="uk-first-column">
                  <!-- <h6>Top Tabs</h6> -->
                  <?php
                      if(isset($_GET['welcome_customer'])){
                        if($_GET['welcome_customer']=="MQ"){
                          $customer_id  = $_SESSION['customer_id'];
                            $customer_details = mysqli_query($conn,"select* from customers where customer_id=$customer_id");
                            $row = mysqli_fetch_assoc($customer_details);
                            $customer_name = $row['customer_full_name'];
                            #-------get last login activity 
                            $last_login_activity = mysqli_query($conn,"select * from customers_login_activities where customer_login_activity_id= (select max(customer_login_activity_id)-1 as maxid from customers_login_activities where customer_id=".$customer_id.")");
                            $activity_row = mysqli_fetch_assoc($last_login_activity);
                            $customer_login_datetime = human_timedate($activity_row['customer_login_datetime']);
                            message("Welcome ".$customer_name." You're last login was ".$customer_login_datetime,"info");
                        }
                      }
                  ?>
                  <ul data-uk-tab="" class="uk-tab">
                    <li class="customer_menus uk-active" id="customer_dashboard"><a href="customer_dashboard.php" aria-expanded="true">Dashboard</a></li>
                    <li class="customer_menus" id="my_bookings"><a href="my_bookings.php" aria-expanded="false">My Bookings</a></li>
                    <li class="customer_menus" id="customer_profile_settings"><a href="customer_profile_settings.php" aria-expanded="false" >Profile Settings</a></li>
                </ul>

                <!-- <div class="tp-margin-20"></div>-->
                <!-- <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-margin-medium-bottom tp-margin-20">
                    <div class="customer_element_details">
                        <b>Full Name</b>
                        <p>ABC</p>

                    </div>
                 </div> -->

                

                <!-- <ul class="uk-switcher" id="tab-top-content">
                    <li class="uk-active">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li class="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li class="">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
                </ul> -->
                </div>
        </div>
      </div>
            </div>
<?php
        include 'includes/footer.php';
?>

