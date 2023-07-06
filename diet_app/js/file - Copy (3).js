
  $(document).ready(function(){
   var plan_div_traceArr= [];

    //hide all the previous select lists of plans
  $(document).on('click','.list-items',function(){
     var item_id = $(this).attr('id');
    $("#"+item_id).remove();   
        
 });
/////////////


    $("#selectDiv1Plans").hide();
        $("#selectDiv2Plans").hide();
            $("#selectDiv3Plans").hide();
                $("#selectDiv4Plans").hide();
                 $("#selectDiv5Plans").hide();
  $('.selectedPlan').on('change',function(){

          // alert("ss");
           var selectPlanID = $(this).find(':selected').val();
            // console.log(selectPlanID);      
             var planNumberDiv = selectPlanID.split("div");
              DivNumber = planNumberDiv[1];
            //ajax call for fetching the plan details and name
              var dietplanId = $(this).find(':selected').attr('data-id');
              // planidsArr.push(dietplanId);


                plan_div_traceArr.push({
                                            dietplanId:parseInt(dietplanId),
                                            DivNumber:parseInt(DivNumber),
                                        });


          //  if(DivNumber==1){
                       $("#plan"+DivNumber).css('opacity','1');
                       $("#dropdownplan"+DivNumber).remove();
                          $.ajax({
                            url:'actions/fetch.php',
                            method:'post',
                            data:{plan_id:dietplanId},
                            dataType:'JSON',
                            success:function(data){
                                  $('#plan'+DivNumber+'PlanName').html(data.dietplan_name);
                                  $('#plan'+DivNumber+'PlanDescription').html(data.dietplan_description);
                            }
                        })
                          var elementAllptions ='';
                        $.ajax({
                            url:'actions/fetch.php',
                            method:'post',
                            data:{allplans:1},
                            dataType:'JSON',
                            success:function(data){
                              $('#selectDiv'+DivNumber+'Plans').empty();
                              for(var a = 0;a<data.length;a++){
                                  options = '<option value="'+data[a].dietplan_id+'">'+data[a].dietplan_name+'</option>';
                                   $('#selectDiv'+DivNumber+'Plans').append(options);
                              }
                              //select which plan which is already selected by the user
                             $('#selectDiv'+DivNumber+'Plans option[value="'+dietplanId+'"]').prop('selected', 'selected');
                               $('#selectDiv'+DivNumber+'Plans').show();
                            }
                        });//end ajax function here


                    //     //show the item which are in the a plan

                    //    //get all the food items for the selected plan
                       
                        $("#planItemsDiv"+DivNumber).empty();
                       // $.ajax({
                       //    url:'actions/fetch.php',
                       //    method:'post',
                       //    dataType:'JSON',
                       //    data:{dietplan_id:dietplanId,filter:'allowed'},
                       //    success:function(data){
                           
                          
                       //  }//end success function here
                       // }); //end ajx call here


                       //   $.ajax({
                       //    url:'actions/fetch.php',
                       //    method:'post',
                       //    dataType:'JSON',
                       //    data:{dietplan_id:dietplanId,filter:'not allowed'},
                       //    success:function(data){
                       //      $("#foodItemsDiv"+DivNumber).empty();
                       //  }//end success function here

                       // }); //end ajax call here 



    });
   
  //when the use will chage the plan which is in the panel 
  //for div 1
$('.select-details-plan').on('change',function(){

        var selectDivNum = $(this).attr('id'); 
        var planNumberDiv = selectDivNum.replace("selectDiv","").replace("Plans","");
        var DivNumber = planNumberDiv;
        var dietplanId  = $(this).find(':selected').val();
           
                          $.ajax({
                            url:'actions/fetch.php',
                            method:'post',
                            data:{plan_id:dietplanId},
                            dataType:'JSON',
                            success:function(data){
                                  $('#plan'+DivNumber+'PlanName').html(data.dietplan_name);
                                  $('#plan'+DivNumber+'PlanDescription').html(data.dietplan_description);
                            }
                        });
                       
                    //     //show the item which are in the a plan

                    //    //get all the food items for the selected plan
                       
                       $.ajax({
                          url:'actions/fetch.php',
                          method:'post',
                          dataType:'JSON',
                          data:{dietplan_id:dietplanId,filter:'allowed'},
                          success:function(data){
                            $("#planItemsDiv"+DivNumber).empty();
                            for(var b=0; b<data.length;b++){
                                $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[b].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img allowed-items"><p class="green">'+data[b].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                            }
                          }

                       }); //end ajx call here


                         $.ajax({
                          url:'actions/fetch.php',
                          method:'post',
                          dataType:'JSON',
                          data:{dietplan_id:dietplanId,filter:'not allowed'},
                          success:function(data){
                            $("#foodItemsDiv"+DivNumber).empty();
                            for(var b=0; b<data.length;b++){
                              if(data[b].flag=="not allowed"){
                                $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[b].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img notallowed-items"><p class="red">'+data[b].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                              }
                            else{
                                 $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="'+data[b].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img cuationary-items"><p class="yellow">'+data[b].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                            }
                            // for(var c=0; c<data.length;c++){
                            //    $("#foodItemsDiv"+DivNumber).append('<option value="'+data[c].item_id+'" id="'+data[c].item_id+'DivNumber'+DivNumber+'"  >'+data[c].item_name+'</option>');
                            }
                          }
                       }); //end ajax call here

    });//end the function here 



//on the click of add Button for add item in the plans
$(document).on('click','#AddItem',function(){

    var item_id = $('#foodItems').find(':selected').val();
    var removeItem_id = $('#foodItems').find(':selected').attr('id');
    $("#"+removeItem_id).remove();
    if(item_id.length!=0){  
     // console.log(plan_div_traceArr);
      $.ajax({
          method:'POST',
          dataType:'JSON',
          url:'actions/fetch.php',
          data:{item_id:item_id},
          success:function(data){
              // console.log(data);
              for(var a = 0 ; a<data.length;a++){
                var dietplan_id = parseInt(data[a].dietplan_id);
                var array =plan_div_traceArr;
                for(var b=0; b<array.length;b++){
                    var dietplan_id2 = array[b].dietplanId;
                    if(dietplan_id==dietplan_id2){
                      var DivNumber = array[b].DivNumber;
                       $("planItemsDiv"+DivNumber).empty();
                      if(data[a].flag=="allowed"){
                         $('#planItemsDiv'+DivNumber).append('<li class="list-items"  id="item_'+data[b].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img allowed-items"><p class="green">'+data[b].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                      }else if(data[a].flag=="not allowed"){
                         $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[b].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img notallowed-items"><p class="red">'+data[b].item_name+' </p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                      }else if(data[a].flag=="cautionary"){
                           $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[b].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img cuationary-items"><p class="yellow">'+data[b].item_name+' </p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                      }

                    }
                }//end ineer loop here
              }//end outer loop here
                        }

      });

    }else{
      $('#foodItems').focus();
       $('#error-msg').css('color','red');
      $('#error-msg').html("Select the Food Item First");
    }

});

$(document).on('change','#foodItems',function(){
  $("#error-msg").hide();
});


  });//end ready function here 



