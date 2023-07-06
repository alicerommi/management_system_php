  <?php include 'includes/header.php';
   include 'includes/site_visitors.php';
 ?>

<style>

body {
  overflow-y: hidden;
}

@media screen and (max-width: 800px) {
  body {
    overflow-y: scroll;
  }
}

#toast{
position:fixed;
top:-10%;
right: -10%;
transform:translate(-50%);
padding:16px;
border-radius:4px;
text-align:center;
z-index:10000;
box-shadow:0 0 20px rgba(0,0,0,0.3);
color: #3c763d;
background-color: #dff0d8;
border-color: #d6e9c6;
opacity:0;
font-size: 15px;
font-family: Arial;
font-weight: 600;
}

#toast2{
position:fixed;
top:-10%;
right: 0;
transform:translate(-50%);
padding:16px;
border-radius:4px;
text-align:center;
z-index:10000;
box-shadow:0 0 20px rgba(0,0,0,0.3);
background-color: #f2dede;
border-color: #ebcccc;
color: #a94442;
opacity:0;
font-size: 15px;
font-family: Arial;
font-weight: 600;
}

#toast.show{
visibility:visible;
animation:fadeInOut 3s;
}


#toast2.show{
visibility:visible;
animation:fadeInOut2 3s;
}

@keyframes fadeInOut2{
5%,95%{opacity:1;top:50px}
15%,85%{opacity:1;top:30px}
}

@keyframes fadeInOut{
5%,95%{opacity:1;top:50px}
15%,85%{opacity:1;top:30px}
}


/* .alert-success {
  position: absolute;
} */

</style>

  <!-- Start: Navbar Section -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       <a class="navbar-brand" href="index.php">
      <img src="asset/images/logo_new01.png" alt="">
    </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
 <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="index.php">Proyectos <span class="sr-only">(current)</span></a></li>
          <li><a  href="properties.php">Propiedades</a></li>
          <li><a  href="about.php">Nuestra compañía</a></li>
          <li><a   class="active" href="contact.php">Contacto</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>
  <!-- End: Header Section -->
  <!-- Start: Banner Section -->
  <div class="banner" id="banner">
    <div class="text-center">
      <h2>Contáctate con nosotros</h2>
      <?php
       $query2 = mysqli_query($conn,"SELECT * FROM `footer_text` WHERE footer_text_id= 1");
        $row2 = mysqli_fetch_array($query2);
        $footer_text   = $row2['footer_text'];
      ?>
    </div>
  </div>
  <!-- End: Banner Section -->
  <!-- Contact Detail -->
  <div class="contact-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
              if(isset($_GET['added'])){
                if($_GET['added']==1){
                  echo '<input type="hidden" value="1" id="success" class="successmsg">';

                  ?>
                    <!-- <script>showToast("Tu consulta ha sido enviada. Gracias por comunicarte con nosotros.");</script> -->
                    <?php
                }else if($_GET['added']==0){
                  echo '<input type="hidden" value="2" id="success" class="warning">';
                   //echo '<div class="alert alert-warning">Error in Sending Message</div>';
                }
              }

              echo '<input type="hidden" value="0" id="success">';
          ?>
          <!-- <div class="image-detail">
            <img src="asset/images/hero-image.jpg" alt="">
        </div> -->

         <?php
          //comdetails
          $query5 = mysqli_query($conn,"SELECT * FROM `com_detail` WHERE com_detail_id=1");
          $row5 = mysqli_fetch_array($query5);
          $com_address = $row5['com_address'];
          $com_contact = $row5['com_contact'];
          $com_email = $row5['com_email'];

          ?>
         <div class="col-md-3 address-detail">
            <h3>Dirección and Teléfono</h3>
            <p><?php echo $com_address; ?></p>
          </div>
          <div class="col-md-4 contact-info">
            <h3>Contact info for Teléfono (10 - 18hs)</h3>
            <p><?php  echo $com_contact;  ?></p>
          </div>


          <div class="col-md-7 message-detail" style="margin-top: .5em; padding: 0;">
           <!--  <h4>Message Us</h4> -->
            <div class="panel-body">
              <form method="post" action="actions/insert.php">
                <div class="col-md-4" style="padding: none;">
                  <div class="form-group">
                    <label for="form-contact-name">Nombre</label>
                    <input type="text" class="form-control" id="form-contact-name" name="name" required maxlength="40">
                  </div>
                </div>

                <div class="col-md-4" style="padding: none;">
                  <div class="form-group">
                    <label for="form-contact-email">Email</label>
                    <input type="email" class="form-control" id="form-contact-email" name="email" required maxlength="50">
                  </div>
                </div>

                <div class="col-md-4" style="padding: none;">
                  <div class="form-group">
                    <label for="form-contact-email">Phone Number</label>
                    <input type="text" class="form-control" id="form-contact-email" name="cnumber" required maxlength="30">
                  </div>
                </div>

                <div class="col-md-12" style="padding: none;">
                  <div class="form-group">
                    <label for="form-contact-message">Mensaje</label>
                    <textarea class="form-control" id="form-contact-message" rows="4" name="message" required maxlength="500" style="max-width: 700px; resize: none;"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-left">
                  <div class="form-group">
                    <button class="btn btn-success" type="submit" name="contactForm">Enviar</button>
                  </div>
                </div>
              </form>
            </div>

          </div>

          <div class="col-md-5 map-detail" style="margin-top: -5em;"  >
           <h4>Nuestra Ubicación</h4>

            <div id="map" style="height: 242px;"></div>

          </div>
        </div>
          <div id="toast"></div>

          <div id="toast2"></div>
      </div>


    </div>
  </div>
  <!-- //Contact Detail -->


  <?php include 'includes/footer.php'; ?>
<script>


      function initMap() {
        var myLatLng = {lat: -34.597533, lng: -58.378389};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatLng
        });
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Piso 5 Oficina 2, Esmeralda 910, 1057ABL CABA, Argentina'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAln1-3UqcHsYrNSWdOcQrdqwbWJF9MqYk&callback=initMap">
    </script>


<script type="text/javascript">
function showToast(text){
var x=document.getElementById("toast");
x.classList.add("show");
x.innerHTML=text;
setTimeout(function(){
  x.classList.remove("show");
},10000);
}

function showToast2(text){
var x=document.getElementById("toast2");
x.classList.add("show");
x.innerHTML=text;
setTimeout(function(){
  x.classList.remove("show");
},10000);
}


$(document).ready(function(){
  var val = $("#success").val();
if(val==1){
    showToast("Tu consulta ha sido enviada. Gracias por comunicarte con nosotros.");
}else if(val==2){
    showToast2("Error in Sending Message");
}


});


</script>
