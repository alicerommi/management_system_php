
  $(document).ready(function(){
   var plan_div_traceArr= [];
   var addedItems=[];
 var temp=[];
 var dataFiltered=[];

//for sorting process this is our fucntion 
      function SortByName(x,y) {
      return ((x.item_name == y.item_name) ? 0 : ((x.item_name > y.item_name) ? 1 : -1 ));
    }
        
 //$('#selectorFoodItems').hide();
    //hide all the previous select lists of plans
 //  $(document).on('click','.list-items',function(){
 //     var item_id = $(this).attr('id');
 //    $("#"+item_id).remove();

 // });
/////////////
  //here we will hide the divs when the document will be ready
function div_hider(){
  for(var i=1;i<5;i++){
      
    $("#selectDiv"+i+"Plans").hide();
  }
}

function HideALLModalBtn(){
    for(var i=1;i<5;i++){
      $("#modalBtn"+i).hide();
  }
}

div_hider();
HideALLModalBtn();
function remove_plan(dietplanId,dietDiv){

    var array = [1,2,3,4]; //total divs id are 1,2,3,4,5
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

           var selectPlanID = $(this).find(':selected').val();
            // console.log(selectPlanID);
             var planNumberDiv = selectPlanID.split("div");
              DivNumber = planNumberDiv[1];
              //shwo the modal btn for specific div
              $("#modalBtn"+DivNumber).show();

            //ajax call for fetching the plan details and name
              var dietplanId = $(this).find(':selected').attr('data-id');
              remove_plan(dietplanId,DivNumber);

              /////////////////////
            //  var categoryName = [];
              $.ajax({
                url:'actions/fetch.php',
                method:'post',
                dataType:'JSON',
                data:{dplan_id:dietplanId},
                success:function(data){
                  //data = data.sort(SortByName);
                  //console.log(data);
                       var curr = prev="";
                        for(var a=0;a<data.length;a++){

                          if(a==0){
                                curr = prev = data[a].category_name;
                                  $("#planItemsDiv"+DivNumber).append('<label class="item-category">'+data[a].category_name+'</label>');
                                                   //categoryName.push(data[a].category_name); 
                              }else{
                                curr = data[a].category_name;

                                if(prev==curr){

                                }else{
                                    $("#planItemsDiv"+DivNumber).append('<label class="item-category">'+data[a].category_name+'</label>');
                                                  // categoryName.push(data[a].category_name); 
                                                  prev = curr;
                                }

                              }
                
                          if(data[a].flag=="allowed"){
                        //check whether the item is already exists or not
                       // if("#planItemsDiv1 li#item_3DivNumber1").length==0){
                       if($("#planItemsDiv"+DivNumber+" li#item_"+data[a].item_id+"DivNumber"+DivNumber).length==0)
                           {
                            //$('#planItemsDiv'+DivNumber).append('<li class="list-items"  id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img allowed-items"><p class="green">'+data[a].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                            $('#planItemsDiv'+DivNumber).append('<li class="list-items"  id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="green">'+data[a].item_name+'</p><span class="allowed-icon"><i class="fa fa-square"></i></span></li>');
                           }
                    }else if(data[a].flag=="not allowed" ){
                           if($("#planItemsDiv"+DivNumber+" li#item_"+data[a].item_id+"DivNumber"+DivNumber).length==0)
                        {
                        //  $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img notallowed-items"><p class="red">'+data[a].item_name+' </p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                          $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="red">'+data[a].item_name+' </p><span class="notallowed-icon"><i class="fa fa-square"></i></span></li>');
                        }
                      }else if(data[a].flag=="cautionary"){
                           if($("#planItemsDiv"+DivNumber+" li#item_"+data[a].item_id+"DivNumber"+DivNumber).length==0){
                           //$('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img cuationary-items"><p class="yellow">'+data[a].item_name+' </p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                          $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="yellow">'+data[a].item_name+' </p><span class="cautionary-icon"><i class="fa fa-square"></i></span></li>');
                        }
                      }
                      else{
                          $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="black">'+data[a].item_name+' </p><span class="unfdefined-icon"><i class="fa fa-square"></i></span></li>');
                      }
                    //}
                 //   }//end inner loop here
                  }//end outer for loop
                }
              });



              $("#modalBtn"+DivNumber).attr("data-id",dietplanId);

                   plan_div_traceArr.push({
                                            dietplanId:parseInt(dietplanId),
                                            DivNumber:parseInt(DivNumber),
                                        });


                  // console.log(plan_div_traceArr);

                       $("#plan"+DivNumber).css('opacity','1');
                       $("#dropdownplan"+DivNumber).remove();
                          $.ajax({
                            url:'actions/fetch.php',
                            method:'post',
                            data:{plan_id:dietplanId},
                            dataType:'JSON',
                            success:function(data){
                                  $('#plan'+DivNumber+'PlanName').html(data.dietplan_name);
                                  var str = data.dietplan_shortdescription;
                                  if(str.length>72){
                                   str=str.substr(0,69)+"<span>...</span>";
                                        $('#plan'+DivNumber+'PlanDescription').html(str);
                                  }else{
                                        $('#plan'+DivNumber+'PlanDescription').html(str);
                                }
                                  //$('#plan'+DivNumber+'PlanDescription').html(data.dietplan_shortdescription);
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




  //when the use will chage the plan which is in the panel
$('.select-details-plan').on('change',function(){

// console.log(addedItems);


        var selectDivNum = $(this).attr('id');
        var planNumberDiv = selectDivNum.replace("selectDiv","").replace("Plans","");
        var DivNumber = planNumberDiv;
        var dietplanId  = $(this).find(':selected').val();
          $("#planItemsDiv"+DivNumber).empty();
          $("#modalBtn"+DivNumber).attr("data-id",dietplanId);


                          $.ajax({
                            url:'actions/fetch.php',
                            method:'post',
                            data:{plan_id:dietplanId},
                            dataType:'JSON',
                            success:function(data){
                                  $('#plan'+DivNumber+'PlanName').html(data.dietplan_name);
                                  var str = data.dietplan_shortdescription;
                                  if(str.length>72){
                                    str=str.substr(0,69)+"<span>...</span>";
                                        $('#plan'+DivNumber+'PlanDescription').html(str);
                                        //$('#plan'+DivNumber+'PlanDescription').html(str.substr(0,72));
                                  }else{
                                        $('#plan'+DivNumber+'PlanDescription').html(str);
                                }
                            }

                        });

                      //  console.log("addedItems:"+addedItems);

                       $.ajax({

                          url:'actions/fetch.php',
                          method:'post',
                          dataType:'JSON',
                          data:{dietplan_id:dietplanId,filter:1},
                          success:function(data){
                            //console.log(addedItems);
                             //console.log("data:"+data);
                                  // var categoryName = [];
                                   var curr = prev="";
                                   //var index=0;
                            for(var a= 0 ; a<data.length; a++){
                              
                              if(a==0){
                                curr = prev = data[a].category_name;
                                  $("#planItemsDiv"+DivNumber).append('<label class="item-category">'+data[a].category_name+'</label>');
                                                   //categoryName.push(data[a].category_name); 
                              }else{
                                curr = data[a].category_name;

                                if(prev==curr){

                                }else{
                                    $("#planItemsDiv"+DivNumber).append('<label class="item-category">'+data[a].category_name+'</label>');
                                                  // categoryName.push(data[a].category_name); 
                                                  prev = curr;
                                }

                              }
                              //data  = data.sort(SortByName);
                             // for(var b=0; b<addedItems.length;b++){
                                //if( parseInt(data[a].item_id)==addedItems[b].item_id){
                         //           if(!categoryName.includes(data[a].category_name))
                         // {                      $("#planItemsDiv"+DivNumber).append('<label class="item-category">'+data[a].category_name+'</label>');
                         //                            categoryName.push(data[a].category_name); 
                         //  }
                                  if(data[a].flag=="not allowed"){
                                    // if($("#planItemsDiv"+DivNumber+" li#item_"+data[b].item_id+"DivNumber"+DivNumber).length==0){
                                    //$('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img notallowed-items"><p class="red">'+data[a].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                                      
                                     $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="red">'+data[a].item_name+' </p><span class="notallowed-icon"><i class="fa fa-square"></i></span></li>');
                                      //}
                                  }
                                  else if(data[a].flag=="cautionary"){
                                    // if($("#planItemsDiv"+DivNumber+" li#item_"+data[b].item_id+"DivNumber"+DivNumber).length==0){
                                     //$('#planItemsDiv'+DivNumber).append('<li class="list-items" id="'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img cuationary-items"><p class="yellow">'+data[a].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                                     
                                      $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="yellow">'+data[a].item_name+' </p><span class="cautionary-icon"><i class="fa fa-square"></i></span></li>');
                                     // }
                                  }else if (data[a].flag=="allowed") {
                                    // if($("#planItemsDiv"+DivNumber+" li#item_"+data[b].item_id+"DivNumber"+DivNumber).length==0){
                                    // $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><img src="http://www.pngmart.com/files/1/Red-Onion-PNG-File.png" class="img-responsive items-img allowed-items"><p class="green">'+data[a].item_name+'</p> <span class="font-icon"><i class="fa fa-times"></i></span></li>');
                                     $('#planItemsDiv'+DivNumber).append('<li class="list-items"  id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="green">'+data[a].item_name+'</p><span class="allowed-icon"><i class="fa fa-square"></i></span></li>');
                                   // }
                                  }
                                  else{
//<label class="item-category">abc</label>
                                      $('#planItemsDiv'+DivNumber).append('<li class="list-items" id="item_'+data[a].item_id+'DivNumber'+DivNumber+'"><p class="black">'+data[a].item_name+' </p><span class="unfdefined-icon"><i class="fa fa-square"></i></span></li>');
                                    }

                             //}//end if condtione here
                            }//end inner loop here
                           // }//end outer loop heer
                          }//end success function here

                       }); //end ajx call here






    });//end the function here



$(document).on('change','#foodItems',function(){
  $("#error-msg").hide();
});


//for showing the plan full description in the modal
$(document).on('click','.view-btn',function(){
        var dietplanId = $(this).attr('data-id');
               $.ajax({
                            url:'actions/fetch.php',
                            method:'post',
                            data:{plan_id:dietplanId},
                            dataType:'JSON',
                            success:function(data){
                              $('.modal-title').html(data.dietplan_name+" Description");
                              $("#planFullDescription").html(data.dietplan_description);
                            }
              });
    });  //end show modal function here

    // $( "#planItemsDiv1 .list-items .font-icon .icon-button" ).on( "click", function() {
    //   console.log('Hello world');
    // });




  });//end ready function here
