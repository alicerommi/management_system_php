<?php include 'includes/header.php'; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add a Property</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Propiedades</a></li>
                        <li class="breadcrumb-item active">Add a Property</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                 <div class="col-md-12 text-right" >
                          <a class="btn btn-primary" href="view-properties.php"><i class="fa fa-eye"></i>&nbsp;View Propiedades Lists</a>
                      </div>
               <div class="alert alert-success" id="success">The Property Details Has Been Added Successfully</div>
                    <div class="alert alert-danger" id="error">Error In Adding Property Details</div>

              <div class="row " id="wizard">

                  <div class="tab_container">
                    <input id="tab1" type="radio" name="tabs" checked>
                    <label class="tab-nav" for="tab1"><i class="fa fa-home"></i></label>

                    <input id="tab2" type="radio" name="tabs">
                    <label class="tab-nav" for="tab2"><i class="fa fa-info"></i></label>

                    <input id="tab3" type="radio" name="tabs">
                    <label class="tab-nav" for="tab3"><i class="fa fa-building-o"></i></label>

                    <input id="tab4" type="radio" name="tabs">
                    <label class="tab-nav" for="tab4"><i class="fa fa-check"></i></label>

                    <section id="content1" class="tab-content">
                      <h3>PROPERTY INFORMATION</h3>
                      <div class="form-group col-md-3" style="padding: 0;">
                        <label class="property-option" for="property">Property For</label>
                        <select class="form-control" id="propertyType" name="propertyType">
                        <!--   <option value="none">none</option> -->
                            <option value="Alquiler">Alquiler</option>
                            <option value="Venta">Venta</option>
                            <!--  <option value="Reservada">Reservada</option> -->
                          </select>
                      </div>

                      <div class="form-group col-md-3" style="padding: 0;">
                        <label class="status-option" for="status">Status</label>
                        <select class="form-control" id="propertystatus" name="propertystatus">
                          <option value="normal">Normal</option>
                            <option value="Alquilada" id="remove1_status">Alquilada</option>
                            <option value="Vendida" id="remove2_status">Vendida</option>
                             <option value="Reservada">Reservada</option>

                          </select>
                      </div>

                       <div class="form-group col-md-3" style="padding: 0;">
                        <label class="property-option" for="property">Property Name</label>
                          <input type="text" name="propertyName" id="propertyName" maxlength="40" class="form-control">
                      </div>
                    <!--   <div class="m-b-30"> -->
                           <form action="actions/upload-propertyImages.php" class="dropzone">
                          </form>
                      <!--  </div> -->

                      <div class="button-group text-right">
                        <!-- <button class="btn bnt-default" class="tab-content">Previous</button> -->
                        <button class="btn btn-primary tab-content next" name="next" type="button">Next</button>
                      </div>

                    </section>
                    <section id="content2" class="tab-content">
                      <h3>GENERAL INFORMATION</h3>
                     
                    <form>
                      <div class="validate-tab">
                        <div class="form-group">
                          <label for="state" class="control-label col-lg-10">STATE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="state" maxlength="20" name="state"   type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="area" class="control-label col-lg-10">AREA</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="area" maxlength="20" name="area" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="address" class="control-label col-lg-10">ADDRESS</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="address" maxlength="20" name="address" type="text">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="floor" class="control-label col-lg-10">FLOOR</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="floor" maxlength="20" name="floor" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="unit" class="control-label col-lg-10">TYPE OF UNIT</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="unit" maxlength="20" name="unit" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="covered" class="control-label col-lg-12">COVERED SURFACE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="covered" maxlength="20" name="covered" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="total" class="control-label col-lg-10">TOTAL SURFACE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="total" maxlength="20" name="total" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="antiguedad" class="control-label col-lg-10">ANTIGUEDAD</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="antiguedad" maxlength="20" name="antiguedad" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="furnished" class="control-label col-lg-10">FURNISHED</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="furnished" maxlength="20" name="furnished" type="text">
                          </div>
                        </div>


                        <div class="form-group col-md-2" >
                        <label class="property-option" for="Moneda">Moneda</label>
                        <select class="form-control" id="Moneda" name="Moneda">
                          <option value="Dollar">Dollar</option>
                            <option value="Peso">Peso</option>
                           
                          </select>
                      </div>


                        <div class="form-group">
                          <label for="price" class="control-label col-lg-10">PRICE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="price" maxlength="20" name="price" type="text">
                          </div>


                        </div>
                      </div>



                      <div class="button-group text-right col-md-12">
                        <!-- <button class="btn bnt-default tab-content previous" id="prev1">Previous</button> -->
                        <button class="btn btn-primary tab-content next">Next</button>
                      </div>

                    </section>

                    <section id="content3" class="tab-content">
                      <h3>DETAIL OF THE PROPERTY</h3>
                      <div class="validate-tab">
                      

                         <div class="form-group">
                          <label for="autocomplete" class="control-label col-lg-10">LATITUDE </label>
                          <div class="col-lg-12">
                            <input class="form-control" type="text" name="lat" id="lat" maxlength="5">
                          </div>
                        </div>
                       <div class="form-group">
                          <label for="autocomplete" class="control-label col-lg-10">LONGITUDE</label>
                          <div class="col-lg-12">
                            <input class="form-control" type="text" name="lng" id="lng"  maxlength="5">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="orientation" class="control-label col-lg-10">ORIENTATION</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="orientation" maxlength="20" name="orientation"   type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="palier" class="control-label col-lg-10">PALIER</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="palier" maxlength="20" name="palier" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="cstate" class="control-label col-lg-10">STATE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="cstate" maxlength="20" name="cstate" type="text">
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="office" class="control-label col-lg-10">OFFICE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="office" maxlength="20" name="office" type="text">
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="meetingroom" class="control-label col-lg-10">MEETING ROOM</label>
                          <div class="col-lg-12">
                            <input class="form-control"  maxlength="20" name="meetingroom" id="meetingroom" type="text">
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="reception" class="control-label col-lg-10">RECEPTION</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="reception" maxlength="20" name="reception" type="text">
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="heating" class="control-label col-lg-10">HEATING</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="heating" maxlength="20" name="heating" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="hotwater" class="control-label col-lg-10">HOT WATER</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="hotwater" maxlength="20" name="hotwater" type="text">
                          </div>
                        </div>

                         <div class="form-group">
                          <label for="hotwater" class="control-label col-lg-10">LUMINOSITY</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="luminosity" maxlength="20" name="luminosity" type="text">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="brightness" class="control-label col-lg-10">BRIGHTNESS</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="brightness" maxlength="20" name="brightness" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="cfloors" class="control-label col-lg-10">FLOORS</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="cfloors" maxlength="20" name="cfloors" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="bath" class="control-label col-lg-10">BATHROOM BATH</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="bath" maxlength="20" name="bath" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="toilet" class="control-label col-lg-10">TOILETTE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="toilet" maxlength="20" name="toilet" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="expenses" class="control-label col-lg-10">EXPENSES</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="expenses" maxlength="20" name="expenses" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="abl" class="control-label col-lg-10">ABL</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="abl" maxlength="20" name="abl" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="aysa" class="control-label col-lg-10">AYSA</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="aysa" maxlength="20" name="aysa" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="contract" class="control-label col-lg-12">CONTRACT DURATION</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="contract" maxlength="20" name="contract" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="button-group text-right">
                        <!-- <button class="btn bnt-default tab-content previous" id="prev2">Previous</button> -->
                        <button class="btn btn-primary tab-content next">Next</button>
                      </div>
                    </section>
                   

                    <section id="content4" class="tab-content">
                      <h3>DETAIL OF THE BUILDING</h3>
                      <div class="validate-tab">
                        <div class="form-group">
                          <label for="quantity" class="control-label col-lg-12">QUANTITY OF FLOORS</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="quantity" maxlength="20" name="quantity"  type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="office" class="control-label col-lg-12">OFFICES OF FLOORS</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="office" maxlength="20" name="officeOfFloors"  type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="surveillance" class="control-label col-lg-10">SURVEILLANCE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="surveillance" maxlength="20" name="surveillance" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="garage" class="control-label col-lg-10">GARAGE</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="garage" maxlength="20" name="garage" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="baulera" class="control-label col-lg-10">BAULERA</label>
                          <div class="col-lg-12">
                            <input class="form-control" id="baulera" maxlength="20" name="baulera" type="text">
                          </div>
                        </div>
                      </div>

                      <div class="button-group text-right">
                        <!-- <button class="btn bnt-default previous" id="prev3">Previous</button> -->
                        <button class="btn btn-primary finish"  name="addPropertyForm" id="finishPropetyForm">Finish</button>
                      </div>
                    </section>

                 
                  </div>
                </form>
              </div>

</div>



            <!-- End Container fluid  -->


<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
// Tooltips Initialization
$(function () {
$('[data-toggle="tooltip"]').tooltip();
});

// Steppers
$(document).ready(function () {
var navListItems = $('div.setup-panel-2 div a'),
        allWells = $('.setup-content-2'),
        allNextBtn = $('.nextBtn-2'),
        allPrevBtn = $('.prevBtn-2');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-amber').addClass('btn-blue-grey');
        $item.addClass('btn-amber');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allPrevBtn.click(function(){
    var curStep = $(this).closest(".setup-content-2"),
        curStepBtn = curStep.attr("id"),
        prevStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        prevStepSteps.removeAttr('disabled').trigger('click');
});

allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content-2"),
        curStepBtn = curStep.attr("id"),
        nextStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i< curInputs.length; i++){
        if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid)
        nextStepSteps.removeAttr('disabled').trigger('click');
});

$('div.setup-panel-2 div a.btn-amber').trigger('click');
});
</script>

<script>
    var accordion = (function(){

  var $accordion = $('.js-accordion');
  var $accordion_header = $accordion.find('.js-accordion-header');
  var $accordion_item = $('.js-accordion-item');

  // default settings
  var settings = {
    // animation speed
    speed: 400,

    // close all other accordion items if true
    oneOpen: false
  };

  return {
    // pass configurable object literal
    init: function($settings) {
      $accordion_header.on('click', function() {
        accordion.toggle($(this));
      });

      $.extend(settings, $settings);

      // ensure only one accordion is active if oneOpen is true
      if(settings.oneOpen && $('.js-accordion-item.active').length > 1) {
        $('.js-accordion-item.active:not(:first)').removeClass('active');
      }

      // reveal the active accordion bodies
      $('.js-accordion-item.active').find('> .js-accordion-body').show();
    },
    toggle: function($this) {

      if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
        $this.closest('.js-accordion')
               .find('> .js-accordion-item')
               .removeClass('active')
               .find('.js-accordion-body')
               .slideUp()
      }

      // show/hide the clicked accordion item
      $this.closest('.js-accordion-item').toggleClass('active');
      $this.next().stop().slideToggle(settings.speed);
    }
  }
})();

$(document).ready(function(){
  accordion.init({ speed: 300, oneOpen: true });
});
</script>
 <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIJ9XX2ZvRKCJcFRrl-lRanEtFUow4piM&libraries=places"></script> -->




        <script type="text/javascript">
    $(document).ready(function(){

      function reset_fields(){
          $("#propertyName").val("");
          $("#state").val("");
          $("#area").val("");
          $("#address").val("");
          $("#floor").val("");
          $("#unit").val("");
          $("#covered").val("");
          $("#total").val("");
          $("#antiguedad").val("");
          $("#furnished").val("");
          $("#price").val("");
          $("#lat").val("");
          $("#lng").val("");
          $("#orientation").val("");
          $("#palier").val("");
          $("#cstate").val("");
          $("#office").val("");
          $("#meetingroom").val("");
          $("#heating").val("");
          $("#hotwater").val("");
          $("#luminosity").val("");
          $("#brightness").val("");
          $("#cfloors").val("");
          $("#bath").val("");
          $("#toilet").val("");
          $("#expenses").val("");
          $("#abl").val("");
          $("#aysa").val("");
          $("#contract").val("");
          $("#quantity").val("");
          $("#office").val("");
          $("#surveillance").val("");
          $("#garage").val("");
          $("#baulera").val("");
}


       $("#success").hide();
       $("#error").hide();
        $(document).on('click','#finishPropetyForm',function(e){
         
                     if( $("#propertyType").find(':selected').val()==0 && $("#propertyName").val()==""   && $("#address").val()==""){
                        alert("Fill the Form");
                     }  else{
                        var dataString = $("form").serialize()+"&propertyType="+$("#propertyType").find(':selected').val()+"&propertyName="+ $("#propertyName").val()+"&propertystatus="+$("#propertystatus").find(':selected').val();
                      //  console.log(dataString);
                        $.ajax({
                            method:'post',
                            data:dataString,
                            url:'actions/insert.php',
                            success:function(respoonse){
                              if(respoonse==1){
                               
                                    //$('#finishPropetyForm').css('pointer-events','none');
                                    $("#success").show();
                                     $( "#tab1" ).prop( "checked", true );
                                  $("#content1").show();
                              }else{
                                    $("#error").show();
                              }
                              reset_fields();
                            }
                        });
                     }
             e.preventDefault();
         });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
  var clickCounter=1;
    $(document).on('click','.next',function(e){
          clickCounter++;
          if(clickCounter>1){
            $( "#tab"+clickCounter ).prop( "checked", true );
            $("#content"+clickCounter).show();
          }else{
              // $( "#tab"+clickCounter ).prop( "checked", false );
            $("#content"+clickCounter).hide();
          }
          e.preventDefault();
    });

 $('#remove2_status').hide();
    $(document).on('change','#propertyType',function(){
        var type = $(this).find(':selected').val();
      //  alert(type);
        if(type=="Venta"){
          $('#remove2_status').show();
          $('#remove1_status').hide();
        } else{
            $('#remove1_status').show();
          $('#remove2_status').hide();
        }
    });
});//end ready function here 
</script>

