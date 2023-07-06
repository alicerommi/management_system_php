<?php session_start();

    include 'admin/includes/database_connection.php'; 
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="">
    <title>Instant Energy</title>
    <link rel="icon" href="images/favicon_1.png" type="image/png">
    <link rel='stylesheet' id='this-style-css' href='assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='' href='assets/css/form_css.css' type='text/css' media='all' />
 <!--    <link rel='stylesheet' id='sitemush-fonts-css' href='https://fonts.googleapis.com/css?family=Merriweather%3A400%2C700%2C900%2C400italic%2C700italic%2C900italic%7CMontserrat%3A400%2C700%7CInconsolata%3A400&amp;subset=latin%2Clatin-ext' type='text/css' media='all' /> -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel='stylesheet' id='genericons-css' href='assets/css/genericons.css' type='text/css' media='all' />
    <link rel='stylesheet' id='sitemush-style-css' href='assets/css/1-style.css' type='text/css' media='all' />
    <!--[if lt IE 10]>
<link rel='stylesheet' id='sitemush-ie-css'  href='assets/css/ie.css' type='text/css' media='all' />
<![endif]-->
    <!--[if lt IE 9]>
<link rel='stylesheet' id='sitemush-ie8-css'  href='assets/css/ie8.css' type='text/css' media='all' />
<![endif]-->
    <!--[if lt IE 8]>
<link rel='stylesheet' id='sitemush-ie7-css'  href='assets/css/ie7.css' type='text/css' media='all' />
<![endif]-->
    <link rel='stylesheet' id='mpce-venobox-css-css' href='assets/css/venobox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='mpce-theme-css' href='assets/css/theme.css' type='text/css' media='all' />
    <style id='mpce-theme-inline-css' type='text/css'>
        .sm-row-fixed-width {
            max-width: 1170px;
        }

    </style>

    
    <link rel='stylesheet' id='mpce-bootstrap-grid-css' href='assets/css/bootstrap-grid.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='mpce-font-awesome-css' href='assets/css/font-awesome.min.css' type='text/css' media='all' />
    <script type='text/javascript' src='assets/js/jquery.js'></script>
    <script type='text/javascript' src='assets/js/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='assets/js/main.js'></script>
    <script type='text/javascript' src='assets/js/counter.js'></script> 
    <link type="text/css" rel="stylesheet" href="assets/css/lightslider.css" />                 
    <script src="assets/js/lightslider.js"></script>
    <!--[if lt IE 9]>
<script type='text/javascript' src='assets/js/html5.js'></script>
<![endif]-->
    <script type='text/javascript' src='assets/js/venobox.min.js'></script>
    <link rel='stylesheet' href='assets/css/sweetalert2.css' type='text/css' />
    <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>

    <meta name="generator" content="" />
    <link rel="canonical" href="#" />
    <link rel='shortlink' href='#' />
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
             #captcha_link {
          -moz-user-select: none;
          color: #1155CC !important;
          font-family: "verdana", "Helvetica Neue", Helvetica, Arial, sans-serif;
          text-decoration: none;
             }
            #captcha_link:hover {
              text-decoration: underline;
            }
    </style>

    <style type="text/css">
 .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}0% { transform: rotate(360deg); }
}
    </style>
</head>

<body class="home page page-id-5 page-template-default" id="" style="">
    

    <div id="page" class="site container-fluid" style="">
        <!-- pre loader div -->
   <!-- 
        <h1 class="ml10">
              <span class="text-wrapper">
                <span class="letters">Instant Energy</span>
              </span>
        </h1> -->
  

    <!--end pre loader div -->
        <div class="site-inner" id="page_content">
            <div id="preloader"></div>
            <header id="masthead" class="site-header" role="banner">
                <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right padding_row header_social_row">
                    <div class="sm-span12 smue-clmn  sme-dsbl-margin-left sme-dsbl-margin-right">
                        <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right">
                            <div class="sm-span6 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right header_social">
                               <!--  <div class="smue-social-profile-obj smue-text-align-left smue-buttons-32x32 smue-buttons-circular">
                                    <span class="smue-button-facebook"><a href="https://www.facebook.com/" title="Facebook" target="_blank"></a></span>
                                    <span class="smue-button-google"><a href="https://plus.google.com/" title="Google +" target="_blank"></a></span>
                                    <span class="smue-button-twitter"><a href="https://twitter.com/" title="Twitter" target="_blank"></a></span>
                                    <span class="smue-button-youtube"><a href="https://www.youtube.com/" title="YouTube" target="_blank"></a></span>
                                    <span class="smue-button-rss"><a href="https://sitepad.com/blog/feed" title="RSS" target="_blank"></a></span>
                                </div> -->
                            </div>
                            
                            <div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right header_phone">
                                <div class="smue-service-box-obj smue-service-box-text-heading-float smue-service-box-basic">
                                    <div class="smue-service-box-icon-section smue-service-box-small-icon" style=" padding-left: 0px; padding-right: 0px; padding-top: 0px; padding-bottom: 0px;">
                                        <div class="smue-service-box-icon-holder" style=" font-size: 46px;"><i class="fa fa-mobile" style=" color: rgb(255, 255, 255);"></i></div>
                                    </div>
                                    <div class="smue-service-box-text-heading-wrapper">
                                        <div class="smue-service-box-heading-section">
                                            <h6 style=" color: #FFFFFF;">Call Free</h6>
                                        </div>
                                        <div class="smue-service-box-content-section">
                                            <p class="phone_number">07875 444131</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                             $page_name = basename($_SERVER['PHP_SELF']);
                             if ($page_name=="index.php")
                                 echo'<div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right quotes_btn" style="">
                                    <div class="smue-button-obj"><a  target="_self" id="clicker_calculator" class="smue-btn smue-btn-size-large smue-btn-full-width" style="cursor:pointer">Energy Calculator?</a></div>
                                </div>';
                            else 
                                 echo'<div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right quotes_btn" style="">
                                    <div class="smue-button-obj"><a href="index.php" style="cursor:pointer" title="" class="smue-btn smue-btn-size-large smue-btn-full-width">Energy Calculator?</a></div>
                                </div>';
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right padding_row header_logo">
                    <div class="sm-span12 smue-clmn  sme-dsbl-margin-left sme-dsbl-margin-right">
                        <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right">
                            <div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right logo">
                                <div class="smue-szp_site_title smue-ce-child-detector smue-text-align-left">
                                    <div class="site-title-container">
                                        <a href="index.php" title="Instant Energy"><img src="images/cropped.png" style=" /*width: 80px;*/ height: 70px; vertical-align: middle;"></a><a href="index.php"  style=" font-family: ;"></a></div>
                                </div>
                            </div>
                           <!--  <div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right header_add">
                                <div class="smue-service-box-obj smue-service-box-text-heading-float smue-service-box-basic">
                                    <div class="smue-service-box-icon-section smue-service-box-small-icon" style=" padding-left: 0px; padding-right: 10px; padding-top: 0px; padding-bottom: 0px;">
                                        <div class="smue-service-box-icon-holder smue-service-box-icon-holder-circle" style=" font-size: 35px; min-height: 1.500000em; height: 1.500000em; min-width: 1.500000em; width: 1.500000em;"><i class="fa fa-home" style=" color: rgb(142, 204, 10);"></i></div>
                                    </div>
                                    <div class="smue-service-box-text-heading-wrapper">
                                        <div class="smue-service-box-heading-section">
                                            <h6 style=" color: rgb(51, 51, 51);">123, Alwaria House</h6>
                                        </div>
                                        <div class="smue-service-box-content-section">
                                            <p>RCD US</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right header_add">
                                <div class="smue-service-box-obj smue-service-box-text-heading-float smue-service-box-basic">
                                    <div class="smue-service-box-icon-section smue-service-box-small-icon" style=" padding-left: 0px; padding-right: 10px; padding-top: 0px; padding-bottom: 0px;">
                                        <div class="smue-service-box-icon-holder smue-service-box-icon-holder-circle" style=" font-size: 35px; min-height: 1.500000em; height: 1.500000em; min-width: 1.500000em; width: 1.500000em;"><i class="fa fa-envelope" style=" color: rgb(142, 204, 10);"></i></div>
                                    </div>
                                    <div class="smue-service-box-text-heading-wrapper">
                                        <div class="smue-service-box-heading-section">
                                            <h6 style=" color: rgb(51, 51, 51);">Email Address</h6>
                                        </div>
                                        <div class="smue-service-box-content-section">
                                            <p>ex@mail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right header_add">
                                <div class="smue-service-box-obj smue-service-box-text-heading-float smue-service-box-basic">
                                    <div class="smue-service-box-icon-section smue-service-box-small-icon" style=" padding-left: 0px; padding-right: 10px; padding-top: 0px; padding-bottom: 0px;">
                                        <div class="smue-service-box-icon-holder smue-service-box-icon-holder-circle" style=" font-size: 35px; min-height: 1.500000em; height: 1.500000em; min-width: 1.500000em; width: 1.500000em;"><i class="fa fa-clock-o" style=" color: rgb(142, 204, 10);"></i></div>
                                    </div>
                                    <div class="smue-service-box-text-heading-wrapper">
                                        <div class="smue-service-box-heading-section">
                                            <h6 style=" color: rgb(51, 51, 51);">Working Time</h6>
                                        </div>
                                        <div class="smue-service-box-content-section">
                                            <p>Mon &#8211; Fri : 10 AM &#8211; 5 PM</p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right padding_row menu_row">
                    <div class="sm-span12 smue-clmn  sme-dsbl-margin-left sme-dsbl-margin-right">
                        <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right">
                            <div class="sm-span9 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right menu">
                                <div class="smue-szp_primary_nav smue-ce-child-detector floatleft"><i class="fa fa-bars responsive_bar" id="menu-toggle" aria-expanded="false"> </i>
                                    <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="site-navigation social-navigation">Menu</button>
                                    <div id="site-header-menu" class="site-header-menu">
                                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
                                            <div class="menu-header-menu-container">
                                                <ul id="menu-header-menu" class="primary-menu">

                                                    <li id="menu-item-11" class="home menu-item menu-item-type-post_type menu-item-object-page page_item page-item-5 current_page_item menu-item-11" style="  "><a href="index.php" style="  ">Home</a></li>
                                                    <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12" style="  "><a href="about.php" style="  ">About Us</a></li>
                                                    <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13" style="  "><a href="blog.php" style="  ">Blogs</a></li>
                                                    <li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14" style="  "><a href="contact.php" style="  ">Contact Us</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                        <!-- .main-navigation -->
                                    </div>
                                    <!-- .site-header-menu -->
                                </div>
                                <style>
                                    @media screen and (min-width:768px) {
                                        .site-header-menu .main-navigation .primary-menu > li {}
                                        .site-header-menu .main-navigation a {
                                            font-family: ;
                                        }
                                        .site-header-menu .main-navigation .sub-menu a {}
                                        .site-header-menu .main-navigation .current-menu-item > a {}
                                        .site-header-menu .main-navigation li:hover > a {}
                                        .site-header-menu .main-navigation .primary-menu > .menu-item-has-children > a::after {}
                                        .site-header-menu .main-navigation ul ul .menu-item-has-children > a::after {}
                                    }
                                    
                                    @media screen and (max-width:767px) {
                                        .site-header-menu .main-navigation a,
                                        .site-header-menu .main-navigation .sub-menu a {}
                                        i.responsive_bar {}
                                        .site-header-menu .main-navigation li.current-menu-item > a {}
                                        .site-header-menu .main-navigation a:hover,
                                        .site-header-menu .main-navigation .primary-menu li a:hover {}
                                        .site-header-menu {}
                                        .dropdown-toggle:after {}
                                    }
                                </style>
                                <script type="text/javascript">
                                    jQuery(document).ready(function() {

                                        var maxwidth = 0;
                                        var menu_len = jQuery("div.smue-szp_primary_nav").length; // number of menus added

                                        jQuery("ul.primary-menu > li").each(function() {
                                            maxwidth += jQuery(this).width(); // Find total width
                                        });

                                        if (menu_len) {
                                            maxwidth /= menu_len; // Divide the total width with number of menus
                                        }

                                        jQuery(".smue-szp_primary_nav").css("maxWidth", maxwidth + "px"); // Assign the maxWidth
                                    });
                                </script>
                            </div>
                            <!-- <div class="sm-span3 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right plans_btn">
                                <div class="smue-download-button-obj "><a href="#" class="smue-btn smue-btn-size-large smue-btn-icon-indent-middle smue-btn-full-width"><i class="fa fa-download smue-btn-icon-align-left"></i>Download Plans</a></div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- .site-header -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>