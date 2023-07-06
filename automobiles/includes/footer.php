<!-- <div class="directional_class"> -->
<!-- start footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="footer-letter abc">
            <h4 class="subhead ">אודות</h4>
            <p>כחלק משירותי האיתור לאופנועים  שלנו אנו עוזרים לקשר בין בעלי עסקים שונים, ספקים, ארגונים,  ובעלי עניין. אנו נעזור לכם להשיג מוצר או שירות שתוכלו למכור, ולהפך, אם אתם מחפשים מישהו שימכור את המוצר או השירות שלכם, נוכל לקשר אתכם לבעלי עסקים שיש להם מערך מכירות. ניתן להצליח וגם להצליח בגדול ללא קשרים עסקיים, אך הרבה יותר קל, נוח ומהיר לקבל עזרה מחברים עסקיים שרכשנו במהלך הדרך</p> 
          </div>
        </div>
        


        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pl-lg-10">
          <div class="left-footer">
            <h4 class="subhead text-right">שעות פתיחה</h4>

            <span class="footer_title_regular text-right">
              <span class="footer_title_time ">9:00 - 18:00</span>
              <span class="footer_title_week text-right"> :ימים א - ה</span>
            </span>
<span class="footer_title_regular text-right">
              <span class="footer_title_time ">077-4042414</span>
              <span class="footer_title_week text-right"> :טלפון</span>
            </span>
            <span class="footer_title_regular text-right">
              <span class="footer_title_time ">nyc@gbh.co</span>
              <span class="footer_title_week text-right"> :מייל</span>
            </span>

          </div>
        </div>


        

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"  >
          <div class="left-footer link-list-footer 0footer_last_items text-right">
            <h4 class="subhead text-right">קישורים</h4>

            <ul class="link-list text-right">
              <li><a href="index.php"> <?php echo  to_hebrew("Home",$language_array); ?></a></li>
               <li><a href="about.php"> <?php echo  to_hebrew("About",$language_array); ?></a></li>
              <li><a href="customer_dashboard.php"> <?php    echo to_hebrew("My Dashboard",$language_array);?></a></li>
              <li><a href="all_sold_vehicles.php"> <?= to_hebrew("All Sold Vehicles",$language_array) ?></a></li>
            </ul>
          </div>
        </div>

        

        <div class="col-md-12 text-center abc">
          <div class="copyright abc">
            <p>GBH2 &copy; - All Rights Reversed</p>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!-- end footer -->
<!-- </div> -->
  <!-- back to top -->
  <a href="#0" class="cd-top"><i class="fas fa-chevron-up"></i></a>
  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/swiper.min.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <!-- isotope -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- ui jquery js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <!-- main js -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
  <script src="assets/lightbox-dist/ekko-lightbox.min.js"></script>
  <!-- <script src="assets/js/lightslider.js"></script> -->
</body>
</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({

          "language": {
                "url": "translations/Hebrew.json",
            },
      });
  });
</script>
