<!-- Start: Footer Section -->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="about">
          <!-- <h4>About Us</h4> -->
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione accusamus sint, officiis inventore ipsam perferendis labore magni reiciendis ipsa, iure in libero amet nemo aspernatur ut obcaecati neque blanditiis accusantium.</p>
          <ul class="social-list">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="links">
          <h4>Recent Links</h4>
          <ul>
            <li><a href="#">Links 1</a></li>
            <li><a href="#">Links 2</a></li>
            <li><a href="#">Links 3</a></li>
            <li><a href="#">Links 4</a></li>
            <li><a href="#">Links 5</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="links">
          <h4>Get in Touch</h4>
          <div class="address">
            <h5><i class="fa fa-map-marker"></i> Office Address</h5>
            <p>#209, Al-Ameen Plaza, Saddar Rawalpindi.</p>
          </div>
          <div class="call">
            <h5><i class="fa fa-phone"></i> Call Us 24/7</h5>
            <p>+92 331 440 9752</p>
          </div>
          <div class="call">
            <h5><i class="fa fa-envelope-o"></i> Email Address</h5>
            <p>contact@arksols.com</p>
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="links">
          <h4>Usefull Links</h4>
          <ul>
            <li><a href="#">Links 1</a></li>
            <li><a href="#">Links 2</a></li>
            <li><a href="#">Links 3</a></li>
            <li><a href="#">Links 4</a></li>
            <li><a href="#">Links 5</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 text-center copyright">
    <p>Copyright &copy; 2018. All Right Reserved.</p>
  </div>
</div>
<!-- End: Footer Section -->
<!-- Back to top -->
<a href="#0" class="cd-top">Top</a>
<!-- //Back to top -->


<!-- All Jquery -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap Js -->
<script src="js/bootstrap.min.js"></script>
<!-- Main Js -->
<script src="js/main.js"></script>

<script src="js/materialize.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
  $('.slider').slider();

  //for inserting the message form

  $(document).on('submit','#MSGform',function(e){
       var dataString=$("form").serialize()+"&contactForm=1";
       $.ajax({
          url:'actions/insert.php',
          data:dataString,
          method:'post',
          success:function(data){
              if(data==1){
                $("#success").show();
                 $("#error").hide();
                 $("#form-contact-name").val("");
                  $("#form-contact-email").val("");
                  $("#form-contact-message").val("");
                $("#success").html("Message Has Been Successfully Send");
              }else{
                $("#success").hide();
                $("#error").show();
                  $("#form-contact-name").val("");
                  $("#form-contact-email").val("");
                  $("#form-contact-message").val("");
                $("#error").html("Error in sending Message");
              }
          }
       });
       e.preventDefault();
  });
});
</script>
<script type="text/javascript" src="js/file.js"></script>
</body>
</html>
