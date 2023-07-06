<footer>
    <div class="container">
        <h2>Let’s work together!</h2>
        <a href="#" class="btn-orange various"  name="0" data-fancybox="" data-src="#popupform" href="javascript:;" title="Get a Quote">Submit your Brief</a>
        <div class="row">
            <div class="col-md-3 mb-hide">
                <h4>Services</h4>
                <ul>
                    <li><a href="game_app_development.php">Game Development</a></li>
                    <li><a href="ios_app_develpment.php">iOS Development</a></li>
                    <li><a href="android_app_development.php">Android App Development</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-hide">
                <h4>Premium Prism</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pricing.php">Pricing</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-md-offset-2 mb-hide">
                <h4>Find Us</h4>
                <ul class="address-list">
                    <li><i class="icon-map"></i> Address XXXXXXXXXXXX</li>
                    <li><i class="icon-phone"></i> +X-XXX-XXX-XXXX</li>
                    <li><i class="icon-msg"></i> customerservice@premiumprism.com</li>
                </ul>
            </div>
            <div class="col-md-12 disclaimer">
                <div class="col-md-4">All Rights Reserved &copy; premiumprism </div>
                <!-- <div class="col-md-8 text-right">
                    <a href="terms-and-conditions/index.html">Terms of use</a> |
                    <a href="privacy-policy/index.html">Privacy policy</a>
                </div> -->
            </div>
        </div>
    </div>
</footer>

<div style="display: none;" class="popupform" id="popupform">
 
    <div class="popup-bann"><img src="assets/images/popup-ban.jpg" alt=""></div>
    <div class="popup-content">
        <h2>GET A FREE QUOTE</h2>
        <p>Discuss your app idea with our consultants and we'll help you <br>transform them to multi-million dollar reality. It's Free!</p>
        <form action="https://www.retrocube.com/order/mail.php" method="post" class="popup-form">
        <div class="col-md-6">
            <input type="text" class="required" required name="cn" placeholder="Your Name">
            <input type="email" class="required email" required name="em"  placeholder="Your Email">
            <input type="tel" class="required  ftpn" required name="pn" minlength="7" maxlength="14"  placeholder="Your Phone">
                   </div> 
        <div class="col-md-6">
           
            <textarea name="msg" class="required" placeholder="Enter a brief description of your App Project"></textarea>
            
        </div>
        <div class="col-md-12 text-center">
                    
            <button type="submit" class="hvr-ripple-out">Submit</button>
        </div>
    </form>
    </div>
</div>

<div id="ouibounce-modal" style="display:none">
  <div class="underlay" onclick="document.getElementById('ouibounce-modal').style.display = 'none';"></div>
  <div class="modal">
    <div class="modal-body">
      <div class="popup-bann"><img src="assets/images/popup-ban.jpg" alt=""></div>
      <div class="popup-content">
        <h2>GET A FREE QUOTE</h2>
        <p>Discuss your app idea with our consultants and we'll help you <br>
          transform them to multi-million dollar reality. It's Free!</p>
        <form action="https://www.retrocube.com/order/mail.php" method="post" class="popup-form">
          <div class="col-md-6">
            <input type="text" class="required" required name="cn" placeholder="Your Name">
            <input type="email" class="required email" required name="em"  placeholder="Your Email">
            <input type="tel" class="required  ftpn" required name="pn"   minlength="7" maxlength="14" placeholder="Your Phone">
          </div>
          <div class="col-md-6">
            <textarea name="msg" class="required" placeholder="Enter a brief description of your App Project"></textarea>
            
          </div>
          <div class="col-md-12 text-center">
            <button type="submit" class="hvr-ripple-out">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer"> <a onclick="document.getElementById('ouibounce-modal').style.display = 'none';"></a> </div>
  </div>
</div>
<script src="assets/js/lib.js"></script>
<script src="assets/js/functions.js"></script>
<!-- <script src="chat/core.js"></script> -->

<script>
  
    $(".ftpn").keydown(function (e) {
       
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<script>
        $("#portfolio>div.tile.iOS").addClass("scale-anm");
        $(".toolbar>button:nth-child(3)").addClass("active-pf");
        </script>
</body>
</html>