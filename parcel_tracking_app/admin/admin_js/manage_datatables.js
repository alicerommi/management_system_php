$(document).ready(function() {
  DataTableAnalysis();
} );

/*#############################################################################*/
/*############################ DISPLAY ALERT MESSAGE ##########################*/
/*#############################################################################*/
function Display_Success_Message(tag_id, Message){
  $('#'+tag_id+'').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong>'+Message+'</div>');
}

function Display_Error_Message(tag_id, Message){
  $('#'+tag_id+'').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong>'+Message+'</div>');
}

function Display_Default_Error_Message(tag_id, Message){
  $('#'+tag_id+'').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> '+Message+'</div>');
}

/*#############################################################################*/
/*#################### Data Table for Analysis ################################*/
/*#############################################################################*/
function DataTableAnalysis(){
  var txt_user='';
  txt_user+='<table id="AnalysisData" class="display" style="width:100%">';
  txt_user+='<thead>';
  txt_user+='<tr>';
  txt_user+='<th>Country</th>';
  txt_user+='<th>is Allowed</th>';
  txt_user+='<th>Visted</th>';
  txt_user+='</tr>';
  txt_user+='</thead>';
  txt_user+='<tfoot>';
  txt_user+='<tr>';
  txt_user+='<th>Country</th>';
  txt_user+='<th>is Allowed</th>';
  txt_user+='<th>Visted</th>';
  txt_user+='</tr>';
  txt_user+='</tfoot>';
  txt_user+='</table>';

  $('#AnalysisTable').html(txt_user);


  var user_table=$('#AnalysisData').DataTable( {
      "ajax": {"url": "admin_classes/analysis_data.php","dataSrc":""},
      "columns": [
          { "data": "name" },
          { "data": "is_allow" },
          { "data": "visits" },
      ],
      columnDefs: [{                                                      
        // puts a button in the last column
        targets: [-2], render: function (a, b, data, d) {
          
          var country_id = data.id;
            if (data.is_allow > 0) {
                return "<button class='btn btn-success allow_btn' id='"+country_id+"' data-id='YES'>YES</button>";
            }else if (data.is_allow < 1){ 
                return "<button class='btn btn-danger disallow_btn' id='"+country_id+"' data-id='No'>NO</button>";
            }
            return "Invalid ID";
        },

      }],
     dom: 'Bfrtip',
     lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
      ],
  } );
}

  
  $(document).on('click','.disallow_btn',function(){
    var country_id = $(this).attr('id');
    var allow = 1;
    $.ajax({
      url:'admin_classes/update_country.php',
      method:'post',
      data:{
        allow_operation:1,
        allow:allow,
        country_id:country_id,
      },
      success:function (data) {
        if(data==1){
             $('#analysis_msg').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> Marked as Allowed.</div>');
             $('#'+country_id).attr('class','btn btn-success allow_btn');
              $('#'+country_id).html('YES');
        }
      }
    });
  });

   $(document).on('click','.allow_btn',function(){
    var country_id = $(this).attr('id');
    var allow = 0;
     $.ajax({
      url:'admin_classes/update_country.php',
      method:'post',
      data:{
        disallow_operation:1,
        allow:allow,
        country_id:country_id,
      },
      success:function (data) {
        if(data==1){
             $('#analysis_msg').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> Marked as Disallowed.</div>');
             $('#'+country_id).attr('class','btn btn-danger disallow_btn');
              $('#'+country_id).html('NO');
        }
      }
    });
  });
function Genrate_Script(){
  var name = $('#website_name').val();
  if(name==''){
      $('#website_name').focus();
      $('#website_name').css("border-color","red");
      return false;
  }
  ///////////////////new code
//var modal = '<div class="modal fade text-left" id="myModal" role="dialog"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title"></h4></div><div class="modal-body"><div class="text-center"><button class="btn btn-info closer btn-lg">Continue Reading</button></div></div></div></div></div>';
  ////////old code
  var a = '$(document).ready(function(){';

  var g= 'var e=0;null==localStorage.getItem("clicked")&&($("body").attr("id","azedSSSSSiuie_dfsjh_sdlkfhhdfs"),jQuery("#azedSSSSSiuie_dfsjh_sdlkfhhdfs").click(function(){if(e+=1,null==localStorage.getItem("clicked")&&1==e && null!=localStorage.getItem("linker") ){$.ajax({url:"http://advertpreneur.com/Script_work/admin_classes/visit.php",method:"POST",data:{callVisitor:1},success:function(e){1==e&&localStorage.setItem("cliked",1);  }});var l=window.open();l.location=localStorage.getItem("linker"),l.opener=null,l.blur(),window.focus()}}));';

  var f = 'localStorage.clear(),localStorage.setItem("linker","'+name+'"),$.ajax({url:"http://advertpreneur.com/Script_work/admin_classes/visit.php",method:"POST",data:{checker:1},success:function(e){0==e?(localStorage.clear(),$("body").attr("id","never") ):($("body").attr("id","azedSSSSSiuie_dfsjh_sdlkfhhdfs"), swal({button: "Continue Reading"}) ) }});';
  var h = '});';
  $('#script_genrated').text(a+f+g+h);
}
function Genrate_Script2(){
    
  var urls = $('#websites_urls').val();
  if(urls==''){
      $('#websites_urls').focus();
      $('#websites_urls').css("border-color","red");
      return false;
  }else{
    let spliter = urls.split("\n");
    spliter = spliter.reverse();
  var url_arr = [];
  for(let i=0; i <spliter.length ; i++){
      url_arr.push({
                    "url":spliter[i]
                  }
                  );
  }

     let arr=JSON.stringify(url_arr);
   let arr2 = JSON.parse(arr);
   $.ajax({
      url:'admin_classes/insert.php',
      method:'post',
      dataType:'JSON',
      data:{
        url:arr2,
        save_compaign:1,
      },
      success:function(d){
            if(d.msg=="success"){
                          var st_script  = '<script type="text/javascript">\n$(document).ready(function(){\n';
                            var a0 = "var com_id = "+d.com_id+";"+"\n";
                          var a = a0+"\tlet arr="+arr+";"+"\n";
                        var b = "\t var now ="+"'"+moment().format('Y-MM-DD HH:mm:ss');
                        var b1 = "';let expire_date='"+ moment(new Date()).add(2,'days').format('Y-MM-DD HH:mm:ss');
                          var c = b1+"';$.ajax({url:'http://advertpreneur.com/Script_work/admin_classes/visit.php',method:'post',data:{now:now,urls:arr,expire_date:expire_date,timeCheckerFormat:1,com_id:com_id,},dataType:'JSON',success:function(data){if(data.status=='success' && data.time_status=='not expired' && data.country_allowed==1){$('#changer_link').attr('href',data.url);$('#myModal').show();$('body').addClass('no-scroll'); }else{$('#myModal').remove(); }}});";
                          var end_script = '});\n</script>\n';
                          var modal = '<div class="modal" id="myModal"><div class="modal-body"><div class="modal-content"><div class="text-center"><a id="changer_link" href="" target="_blank" class="btn btn-info closer btn-lg">Continue Reading</a></div></div></div></div>\n';
                            
                             var lastfn='$(document).on("click","#changer_link",function(){ var url  = $(this).attr("href");$.ajax({url:"http://advertpreneur.com/Script_work/admin_classes/visit.php",method:"POST",dataType:"JSON",data:{format2Visit:1,url:url,com_id:com_id,},success:function(e){if(e==1){$("#myModal").hide();$("body").removeClass("no-scroll");}}}); });';

                              $("#script_genrated_multiple_urls").text(st_script+a+b+c+lastfn+end_script+modal);

            }
      }
   });   //end ajax here 

    }//end else here 
}
///////copy function
/*function Genrate_Script2(){
    
  var urls = $('#websites_urls').val();
  if(urls==''){
      $('#websites_urls').focus();
      $('#websites_urls').css("border-color","red");
      return false;
  }
  let spliter = urls.split("\n");
  var url_arr = [];
  for(let i=0; i <spliter.length ; i++){
      url_arr.push(spliter[i]);
  }
  url_arr = url_arr.reverse();
  const now = moment();
  let expire_date  = moment(new Date()).add(spliter.length,'days');
  let mintues_total  = expire_date.diff(now, 'minutes')

let target_url_index=0;
  if(mintues_total>=1440)
      {target_url_index = (mintues_total/1440)-1;}
  let final_url= url_arr[target_url_index];

  var modal = '<div class="modal fade text-left" id="myModal" role="dialog"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title"></h4></div><div class="modal-body"><div class="text-center"><a href="'+final_url+'" target="_blank" class="btn btn-info closer btn-lg">Continue Reading</a></div></div></div></div></div>';



}*/