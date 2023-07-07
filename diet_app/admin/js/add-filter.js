

//for adding the dietplan filters here 
$(document).ready(function(){
	//get the item id and check it whether it exists in the deitplan or not
	//for getting the item id
	// var item_id;
$('#item-error').hide();
$('#item-success').hide();
$("#choosenCate").attr("disabled",true);
	$(document).on('change','#choosenPlan',function(){
		$('#item-error').hide();

			$("#choosenCate").attr("disabled",false);

		var plan_id = $(this).find(':selected').val();
			var totalRows = $('#addPlanFilterTable tr').length-1;
			//console.log(totalRows);

			//get the category id
			//var cate_id = $('#choosenCate').find(':selected').val();

			$.ajax({
					url:'actions/fetch.php',
					method:'post',
					dataType:'JSON',
					data:{dplan_id:plan_id,role:'Admin'},
					success:function(data) {
						//show the data in other dropdowns 
						var index=0;
							
							$('#select_cf'+b+' option[value=""]').prop('selected','selected').change();
						
						for(var a = 0; a<data.length;a++){
							index = a+1;
							var filter = data[a].flag;
							//$('#select_cp'+index+' option[value='+dietplan_id+']').prop('selected','selected').change();
							$('#select_cf'+index+' option[value="'+filter+'"]').prop('selected','selected').change();
							$('#saveBtn'+index).html("Update");
							$('#saveBtn'+index).attr("class", "btn btn-primary updateFilter");
						}
						
						if(index==0){
								for(var b=index+1; b<=totalRows;b++ ){
								//$('#select_cp'+b+' option[value=""]').prop('selected','selected').change();
								$('#select_cf'+b+' option[value=""]').prop('selected','selected').change();
								$('#saveBtn'+b).html("Save");
								//$('#saveBtn'+index).attr("class", "btn btn-primary saveFilter");

						}
						}
						else{					
						for(var b=index+1; b<=totalRows;b++ ){
								$('#select_cf'+b+' option[value=""]').prop('selected','selected').change();
								$('#saveBtn'+b).html("Save");

						}
					}
						

					}
			});
		//}
	});





///when the user will clicks on the save or update button
$(document).on('click','.btn-primary',function(e){
			//get the button class name
			var action = $(this).text();
			var btnRowNumber =$(this).attr('id').replace("saveBtn",""); 
			var item_id = $(this).attr('data-id');

			//if(item_id!=null && item_id.length!=0){
	if($("#choosenPlan").find(':selected').val().length!=0){
				//var dietplan_id	 = $('#select_cf'+btnRowNumber).attr('data-id');
				var dietplan_id = $("#choosenPlan").find(':selected').val();
				var filter = $('#select_cf'+btnRowNumber).find(':selected').val();
				
				//	if(item_id.length==0){
				if($('#select_cf'+btnRowNumber).find(':selected').val().length==0){
							$("#item-error").html("Please Select The Filter First");
							$('#select_cf'+btnRowNumber).focus();
							$('#item-error').show();
				}else{

					
					if(action == "Save"){
							var dataString = "choosenItem="+item_id+"&choosenPlan="+dietplan_id+"&choosenFilter="+filter+"&addPlanFilter=1";
						$.ajax({
							url:'actions/insert.php',
							method:'post',
							data:dataString,
							success:function(data){
								if(data==1){
										$('#item-success').html("The Filter has successfully applied to this item");
										$('#item-success').show();
										$('#item-error').hide();
								} else if(data==0){
										$("#item-error").html("Error in applying filter");
										$('#item-error').show();
										$('#item-error').hide();

									}
									$("#saveBtn"+btnRowNumber).html("Update");
									$("#saveBtn"+btnRowNumber).css("pointer-events","none");
							}//end success function
						});//end ajax call here 
										

						}else if(action=="Update"){
							// var res = update_filter(item_id,dietplan_id,filter);
							var dataString = "choosenItem="+item_id+"&choosenPlan="+dietplan_id+"&choosenFilter="+filter+"&editPlanFilter=1";
								$.ajax({
								url:'actions/update.php',
								method:'post',
								data:dataString,
								success:function(data){
									if(data==1){
											$('#item-success').html("The Filter has successfully updated");
											$('#item-success').show();
											$('#item-error').hide();
									}else{
										$("#item-error").html("Error in applying filter");
										$('#item-error').show();

									}
									$("#saveBtn"+btnRowNumber).css("pointer-events","none");
							}//end success function here
						

						});//end ajx call here
						}

				}
				
				//alert(dietplan_id);	
			}
			else{
						$('#item-error').html("Choose the Diet Plan First");
						$("#choosenPlan").focus();
						$('#item-error').show();
			}
		
			e.preventDefault();
			//get the selected values of that row 


});



$(document).on('change','#choosenCate',function(){
						
						var cate_id = $(this).find(':selected').val();

						var dietplan_text= $("#choosenPlan").find(':selected').text();
						

						if(dietplan_text=="Nothing Selected"){
							$('#item-error').html("Choose the Diet Plan First");
							$("#choosenPlan").focus();
							$('#item-error').show();
						}else{
						
							 var count=0;
						
						
						

						if(cate_id=="all"){
								$("tr").fadeIn();
						}else{
						
							 var arr = [];
							var arr2 = [];
							$("#addPlanFilterTable tr").each(function() {
								   	if(count==0){}else
								   {			arr.push($(this).attr('data-id'));
								   				arr2.push($(this).attr('class'));
								   	}
								   	count++;
							 });
						//console.log(arr);

						for(var t=0;t<arr2.length;t++){
							var a = arr2[t].split("_");
							var id=a[0];
							if(cate_id==id){
								$("."+arr2[t].replace(" even","").replace(" odd","")).fadeIn();
							}else{
								$("."+arr2[t].replace(" even","").replace(" odd","")).fadeOut();
							}	
						}

					}
	

						//console.log(arr);
						//console.log(arr2);

					}//end else here

					});//end choosenCate

	


});
