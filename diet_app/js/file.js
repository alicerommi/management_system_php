
  $(document).ready(function(){
   var plan_div_traceArr= [];
   var addedItems=[];

    //hide all the previous select lists of plans
  $(document).on('click','.list-items',function(){
     var item_id = $(this).attr('id');
    $("#"+item_id).remove();   
        
 });
/////////////
  //here we will hide the divs when the document will be ready
function div_hider(){
  for(var i=1;i<6;i++){
          // $("#selectDiv1Plans").hide();
            // $("#selectDiv2Plans").hide();
            // $("#selectDiv3Plans").hide();
            // $("#selectDiv4Plans").hide();
            // $("#selectDiv5Plans").hide();
    $("#selectDiv"+i+"Plans").hide();
  }
}

   div_hider();
          

function remove_plan(dietplanId,dietDiv){
    
    var array = [1,2,3,4,5]; //total divs id are 1,2,3,4,5
    var index = array.indexOf(parseInt(dietDiv));
    if (index > -1) {
      array.splice(index, 1);
    }

   for(var i=0;i<array.length;i++){
      var divNum = array[i];
      $("#div"+divNum+"dietplan"+dietplanId).hide(); 
   }
}
                

  $('.selectedPlan').on('change',function(){
$("#error-msg2").hide();
          // alert("ss");
           var selectPlanID = $(this).find(':selected').val();
            // console.log(selectPlanID);      
             var planNumberDiv = selectPlanID.split("div");
              DivNumber = planNumberDiv[1];
            //ajax call for fetching the plan details and name
              var dietplanId = $(this).find(':selected').attr('data-id');
              remove_plan(dietplanId,DivNumber);
                   plan_div_traceArr.push({
                                            dietplanId:parseInt(dietplanId),
                                            DivNumber:parseInt(DivNumber),
                                        });

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

    });
   



//on the click of add Button for add item in the plans
$(document).on('click','#AddItem',function(){

  if(plan_div_traceArr.length==0){
    $('#dropdownplan1').focus();
    $("#error-msg2").html("Select Any Diet Plan First");
    $("#error-msg2").css("color","red");
  }else{
    var item_id = $('#foodItems').find(':selected').val();
    var removeItem_id = $('#foodItems').find(':selected').attr('id');
    $("#"+removeItem_id).remove();
    if(item_id.length!=0){  
    
     addedItems.push({
                        item_id:parseInt(item_id),
            });

     
     // console.log("When we click on the add Button : ");
     // console.log(addedItems);

    

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

  }//end else here

});


  //when the use will chage the plan which is in the panel 
  //for div 1

$('.select-details-plan').on('change',function(){

        var selectDivNum = $(this).attr('id'); 
        var planNumberDiv = selectDivNum.replace("selectDiv","").replace("Plans","");
        var DivNumber = planNumberDiv;
        var dietplanId  = $(this).find(':selected').val();
           $("#planItemsDiv"+DivNumber).empty();


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
                       

                       $.ajax({
                          url:'actions/fetch.php',
                          method:'post',
                          dataType:'JSON',
                          data:{dietplan_id:dietplanId,filter:1},
                          success:function(data){
                            for(var a= 0 ; a<data.length; a++){
                              for(var b=0; b<addedItems.length;b++){
                                if( parseInt(data[a].item_id)==addedItems[b].item_id){
                                  if(data[a].flag=="not allowed"){
                                    $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img notallowed-items"><p class="red">'+data[a].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                                  }
                                  else if(data[a].flag=="cautionary"){
                                     $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img cuationary-items"><p class="yellow">'+data[a].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                                  }else{
                                    $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img allowed-items"><p class="green">'+data[a].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                                  }
                             
                              }//end if condtione here
                            }//end inner loop here 
                            }//end outer loop heer
                          }//end success function here

                       }); //end ajx call here






    });//end the function here 



$(document).on('change','#foodItems',function(){
  $("#error-msg").hide();
});

  });//end ready function here 



