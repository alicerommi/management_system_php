    // Data Table
  $(document).ready(function() {



    $(document).on('change','#vehicle_type',function(){
      $("#vehicle_model").empty();
      
      let vehicle_type_id = $(this).find(':selected').val();
      $.ajax({
        url:'actions/fetch.php',
        data:{
          vehicle_type_id:vehicle_type_id,
          fetch_manufacture_of_vehicle:1,
        },
        method:'post',
        success:function(d){
            //$("#vehicle_model_div").show();
            // $("#vehicle_manufacture_div").show();

            $("#vehicle_manufacture").empty().append(d);
        } //end success

      });
    });




    $(document).on('change','#vehicle_manufacture',function(){
      let vehicle_manufacture_id = $(this).find(':selected').val();
         let vehicle_type_id = $("#vehicle_type").find(':selected').val(); 
      $.ajax({
        url:'actions/fetch.php',
        data:{
          vehicle_manufacture_id:vehicle_manufacture_id,
          fetch_models_of_vehicle:1,
          vehicle_type_id:vehicle_type_id,
        },
        method:'post',
        // dataType:'json',
        success:function(d){
           $("#vehicle_model").empty().append(d);
            

        } //end success

      });
    });



    /////////// on form submit 
    // $(document).on('submit','#add_vehicle_form',function(e){
    //     let dataString = $(this).serialize()+"&add_vehicle_form=1";
    //       var form_data = new FormData();

    //         // Read selected files
    //        var totalfiles = document.getElementById('vehicles_images').files.length;
    //        for (var index = 0; index < totalfiles; index++) {
    //           form_data.append("image_files[]", document.getElementById('vehicles_images').files[index]);
    //        }


    //         var totalfiles_vi = document.getElementById('video_file').files.length;
    //        for (var index = 0; index < totalfiles_vi; index++) {
    //           form_data.append("video_file", document.getElementById('video_file').files[index]);
    //        }

    //        form_data.append('form_fields',dataString);


    //     // AJAX request
    //        $.ajax({
    //          url: 'actions/insert.php', 
    //          type: 'post',
    //          data: form_data,
    //          dataType: 'json',
    //          contentType: false,
    //          processData: false,
    //          success: function (response) {

    //            // for(var index = 0; index < response.length; index++) {
    //            //   var src = response[index];

    //            //   // Add img element in <div id='preview'>
    //            //   $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
    //            // }

    //          } //end success
    //        });  //end ajax here
    //        e.preventDefault();
    // });

} );