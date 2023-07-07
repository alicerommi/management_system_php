$(document).ready(function(){
  //check the current page number  then enable or disable the previous button
  var page = $("#currentPage").val();
  if(page==1){
      $("#previous-listpage").hide();
  }
$.ajax({
  url:'actions/fetch.php',
  method:'post',
  data:{getPlans:1},
  success:function(data){
    $("#totalPages").val(data);
      for(var i=1;i<=parseInt(data);i++){
          if(i==1){
               $("#pages-all").append('<li class="page-item"><a class="page-link pagesSelected active" id='+i+'>'+i+'</a></li>');
          }else
               $("#pages-all").append('<li class="page-item"><a class="page-link pagesSelected" id='+i+'>'+i+'</a></li>');
      }
  } 

});//end ajax call here

$(document).on('click','.pagesSelected',function(){
    var id = $(this).attr('id');
    pageNumber=id;
  //   if(id>1){

  //     $("#previous-listpage").show();
  //       $("#currentPage").val(id);
  //       var totalPages = $("#totalPages").val();
  //       if(totalPages ==id){
  //         $("#next-listpage").hide();
  //       }else{
  //         $("#next-listpage").show();
  //       }
  //     $("#next").attr("data-id",parseInt(id)+1);
  //       $("#previous").attr("data-id",parseInt(id)-1);
  //       var start= 5*id-5;
  //       var end = 5*id;

  //       $.ajax({
  //           url:'actions/fetch.php',
  //           method:'post',
  //           data:{start:start,end:end},
  //           dataType:'JSON',
  //           success:function(data){
  //             //console.log(data.length);
  //             $("#allPlans").empty();
  //             //$("#1").attr("class","page-link");
  //             $("#"+id).attr("class","page-link pagesSelected active");
  //             for(var t=1;t<=totalPages;t++){
  //                   if(id!=t)
  //                      $("#"+t).attr("class","page-link pagesSelected");
  //             }

  //             for(var t=0;t<data.length;t++){
  //                 $("#allPlans").append('<div class="diet-con"><h2>'+data[t].dietplan_name+'</h2><p>'+data[t].dietplan_description+'</p></div>');
  //             }
  //           }//end success function here 


  //         });//end ajax function here
  
  // }else{
  //          $("#previous-listpage").hide();
  //         $("#currentPage").val(id);
  //         $("#next-listpage").show();

  //       var totalPages = $("#totalPages").val();
  //       var start= 0;
  //       var end = 5;
  //       $.ajax({
  //           url:'actions/fetch.php',
  //           method:'post',
  //           data:{start:start,end:end},
  //           dataType:'JSON',
  //           success:function(data){
  //             //console.log(data.length);
  //             $("#allPlans").empty();
  //             $("#"+id).attr("class","page-link pagesSelected active");
  //             var totalPages = $("#totalPages").val();
  //             for(var t=2;t<=totalPages;t++){
  //                  $("#"+t).attr("class","page-link pagesSelected");
  //             }
  //             //$("#"+id).attr("class","page-link active");
  //             for(var t=0;t<data.length;t++){
  //                 $("#allPlans").append('<div class="diet-con"><h2>'+data[t].dietplan_name+'</h2><p>'+data[t].dietplan_description+'</p></div>');
  //             }
  //           }//end success function here 


  //   });//end ajax call here
  //     }//end else here
  showList(id);
     // e.preventDefault();
});



$(document).on('click','#next',function(){
    var id = $(this).attr('data-id');
  //alert(id);
  showList(id);
});

$(document).on('click','#previous',function(){
 
  var id = $(this).attr('data-id');
  //alert(id);
  showList(id);
});

function showList(id){

  if(id>1){
      $("#previous-listpage").show();
        $("#currentPage").val(id);
        var totalPages = $("#totalPages").val();
        if(totalPages ==id){
          $("#next-listpage").hide();
        }else{
             $("#next-listpage").show();
        }
        $("#next").attr("data-id",parseInt(id)+1);
        $("#previous").attr("data-id",parseInt(id)-1);
        var start= 5*id-5;
        var end = 5*id;
        $.ajax({
            url:'actions/fetch.php',
            method:'post',
            data:{start:start,end:end},
            dataType:'JSON',
            success:function(data){
              //console.log(data.length);
              $("#allPlans").empty();
              //$("#1").attr("class","page-link");
              $("#"+id).attr("class","page-link pagesSelected active");
              for(var t=1;t<=totalPages;t++){
                    if(id!=t)
                       $("#"+t).attr("class","page-link pagesSelected");
              }

              for(var t=0;t<data.length;t++){
                  $("#allPlans").append('<div class="diet-con"><h2>'+data[t].dietplan_name+'</h2><p>'+data[t].dietplan_description+'</p></div>');
              }
            }//end success function here 


          });//end ajax function here
  
  }else{
            $("#previous-listpage").hide();
          $("#currentPage").val(id);
          $("#next-listpage").show();
        var totalPages = $("#totalPages").val();
         $("#next").attr("data-id",parseInt(id)+1);
        $("#previous").attr("data-id",parseInt(id)-1);
        var start= 0;
        var end = 5;
        $.ajax({
            url:'actions/fetch.php',
            method:'post',
            data:{start:start,end:end},
            dataType:'JSON',
            success:function(data){
              //console.log(data.length);
              $("#allPlans").empty();
              $("#"+id).attr("class","page-link pagesSelected active");
              var totalPages = $("#totalPages").val();
              for(var t=2;t<=totalPages;t++){
                   $("#"+t).attr("class","page-link pagesSelected");
              }
              //$("#"+id).attr("class","page-link active");
              for(var t=0;t<data.length;t++){
                  $("#allPlans").append('<div class="diet-con"><h2>'+data[t].dietplan_name+'</h2><p>'+data[t].dietplan_description+'</p></div>');
              }
            }//end success function here 

    });//end ajax call here
      }//end else here
}//end show list funciton here

  });
