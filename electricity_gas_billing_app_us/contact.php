<?php
	include 'includes/header.php';
?>
            <div id="content" class="site-content">

                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <article id="post-8" class="post-8 page type-page status-publish hentry">

                            <div class="entry-content">
                                <div class="sm-row-fluid smue-row smue-row-image sme-dsbl-margin-left sme-dsbl-margin-right padding_row short_banner padding_top_bottom" style="background-image:url(_images/banner-bg.html);">
                                    <div class="sm-span12 smue-clmn  sme-dsbl-margin-left sme-dsbl-margin-right">
                                        <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right">
                                            <div class="sm-span6 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right">
                                                <div class="smue-text-obj">
                                                    <h2><span style="color: #333333;">Contact Us</span></h2>
                                                </div>
                                            </div>
                                            <div class="sm-span6 smue-clmn sme-dsbl-margin-left sme-dsbl-margin-right breadcrumb">
                                                <div class="smue-text-obj">
                                                    <p style="text-align: right;">Home &gt;&gt; Contact Us</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm-row-fluid smue-row sme-dsbl-margin-left sme-dsbl-margin-right contact_row padding_row padding_top_bottom">
                                   
                                    <div class="sm-span7 smue-clmn  sme-dsbl-margin-left sme-dsbl-margin-right">
                                         <?php
                                    if(isset($_GET['msg_send'])){
                                        if($_GET['msg_send']==1){
                                            echo '<div class="alert alert-success text-center">The message has successfully sent.</div>';
                                        }else if($_GET['msg_send']==0){
                                             echo '<div class="alert alert-danger text-center">Eror in sending message.</div>';
                                        }
                                    }
                                    if(isset($_GET['code_error'])){
                                         if ($_GET['code_error']==1){
                                                 echo '<div class="alert alert-danger text-center">'.ucwords('the validation code is wrong').'</div>';
                                         }
                                    }

                                    ?>
                                        <form class="smue-form-82" method="post" enctype="" action="actions/insert.php">
                                            <div class="form-group">
                                                <input type="text" name="Name" id="Name" class="form-control" placeholder="Name"  required maxlength="50" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="Email" id="Email" class="form-control" placeholder="Email" required maxlength="50"  />
                                            </div>
                                             <div class="form-group">
                                                <input type="text" name="Phone" id="Phone" class="form-control" placeholder="Phone Number" required  maxlength="50" />
                                            </div>
                                            <div class="form-group">
                                                <textarea name="Message" id="Message" class="form-control" placeholder="Message" rows="6" maxlength="500"  required  style="resize: none;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                    <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
                                                    <label for='message'>Enter the code above here :</label>
                                                    <input id="captcha_code" name="captcha_code" type="text" required class="form-control" maxlength="6">
                                                    <br>
                                                    Can't read the image? click <a id="captcha_link" href='javascript: refreshCaptcha();'>here</a> to refresh.
                                            </div>

                                                <div class="form-group">
                                                    <button type="submit" name="contact_form_save" class="btn btn-primary">Send</button>
                                                    </button>
                                        </form>
                                    </div>
                                    <div class="sm-span5 smue-clmn  sme-dsbl-margin-left sme-dsbl-margin-right" style="min-height: 280px;">
                                        <div class="mpce-gma-wrapper ">
                                            <div class="mpce-gma-map-canvas" data-type="ROADMAP" data-scrollwheel="true" data-draggable="true" data-disable-default-ui="false" data-zoom="13" data-map-style="default"></div>
                                            <div class="mpce-gma-markers" style="display: none;">
                                                <p>Usage limits exceeded.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .entry-content -->

                        </article>
                        <!-- #post-## -->

                    </main>
                    <!-- .site-main -->
                </div>
                <!-- .content-area -->

            </div>
<?php
	include 'includes/footer.php';
?>
