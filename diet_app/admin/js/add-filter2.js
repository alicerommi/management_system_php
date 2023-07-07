

//for adding the dietplan filters here 
$(document).ready(function(){
	//get the item id and check it whether it exists in the deitplan or not
	//for getting the item id
	// var item_id;
$('#item-error').hide();
$('#item-success').hide();
	$(document).on('change','#choosenPlan',function(){
		$('#item-error').hide();
		var plan_id = $(this).find(':selected').val();
			var totalRows = $('#addPlanFilterTable tr').length-1;
			//console.log(totalRows);

			//get the category id
			var cate_id = $('#choosenCate').find(':selected').val();

			$.ajax({
					url:'actions/fetch.php',
					method:'post',
					dataType:'JSON',
					data:{dplan_id:plan_id,role:'Admin',cate_id:cate_id},
					success:function(data) {
						//show the data in other dropdowns 
						// var index=0;

						$("#tableBody").empty();
						var counter = 0;
						// if(cate_id!="all"){
						for(var a = 0; a<data.length;a++){
							counter++;
							var flag  = data[a].flag;
							if(flag=="allowed")
										$("#tableBody").append('<tr id="'+data[a].item_id+'" ><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed" selected>Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
							else if(flag=="not allowed")
										$("#tableBody").append('<tr id="'+data[a].item_id+'" ><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed" selected>Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
								else  if(flag=="cautionary")
										$("#tableBody").append('<tr id="'+data[a].item_id+'" ><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary" selected>Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
								else{
										//if(cate_id==data[a].category_id)
											$("#tableBody").append('<tr id="'+counter+'"><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+counter+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+counter+'" >Save</button></td></tr>');
									}
						}//end for loop here
					//}
					// else{
					// 	for(var a = 0; a<data.length;a++){
					// 		counter++;
					// 		$("#tableBody").append('<tr id="'+data[a].item_id+'"><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
					// 	}//end for loop here

					//}//end else here 


						// $('#select_cf'+b+' option[value=""]').prop('selected','selected').change();
						
						// for(var a = 0; a<data.length;a++){
						// 	index = a+1;
						// 	var filter = data[a].flag;
						// 	//$('#select_cp'+index+' option[value='+dietplan_id+']').prop('selected','selected').change();
						// 	$('#select_cf'+index+' option[value="'+filter+'"]').prop('selected','selected').change();
						// 	$('#saveBtn'+index).html("Update");
						// 	$('#saveBtn'+index).attr("class", "btn btn-primary updateFilter");
						// }




						
						// if(index==0){
						// 		for(var b=index+1; b<=totalRows;b++ ){
						// 		//$('#select_cp'+b+' option[value=""]').prop('selected','selected').change();
						// 		$('#select_cf'+b+' option[value=""]').prop('selected','selected').change();
						// 		$('#saveBtn'+b).html("Save");
						// 		//$('#saveBtn'+index).attr("class", "btn btn-primary saveFilter");

						// }
						// }
						// else{					
						// for(var b=index+1; b<=totalRows;b++ ){
						// 		$('#select_cf'+b+' option[value=""]').prop('selected','selected').change();
						// 		$('#saveBtn'+b).html("Save");

						// }
						//}
					//}
						

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


					//if we change the chosen category
					$(document).on('change','#choosenCate',function(){
						var cate_id = $(this).find(':selected').val();
						var dietplan_text= $("#choosenPlan").find(':selected').text();
						// alert(dietplan_text);
						if(dietplan_text=="Nothing Selected"){
											$('#item-error').html("Choose the Diet Plan First");
											$("#choosenPlan").focus();
											$('#item-error').show();
						}else{
									var plan_id= $("#choosenPlan").find(':selected').val();
									

									$.ajax({
										url:'actions/fetch.php',
										method:'post',
										dataType:'JSON',
										data:{dplan_id:plan_id,role:'Admin',cate_id:cate_id},
										success:function(data) {
											//show the data in other dropdowns 
											// var index=0;

											$("#tableBody").empty();
											var counter = 0;
											//if(cate_id!="all"){
											for(var a = 0; a<data.length;a++){
												counter++;
												var flag  = data[a].flag;
												if(flag=="allowed")
												$("#tableBody").append('<tr id="'+data[a].item_id+'" ><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed" selected>Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
												else if(flag=="not allowed")
													$("#tableBody").append('<tr id="'+data[a].item_id+'" ><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed" selected>Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
												else  if(flag=="cautionary")
													$("#tableBody").append('<tr id="'+data[a].item_id+'" ><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary" selected>Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
												else{
													$("#tableBody").append('<tr id="'+counter+'"><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+counter+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+counter+'" >Save</button></td></tr>');
												}
											}//end for loop here
										//}
										//else{
										//	for(var a = 0; a<data.length;a++){
										//		counter++;
										//		$("#tableBody").append('<tr id="'+data[a].item_id+'"><td><div class="input-group"><p><span>'+data[a].item_name+'</span></p></div></td> <td><div class="form-group"><select class="form-control chose_filter" id="select_cf'+counter+'" data-id="'+data[a].item_id+'" ><option selected disabled value="">Choose Status</option><option value="allowed">Allowed</option><option value="not allowed">Not Allowed</option><option value="cautionary">Cautionary</option></select></div></td><td><button class="btn btn-primary saveFilter" id="saveBtn'+counter+'" data-id="'+data[a].item_id+'" >Save</button></td></tr>');
										//	}//end for loop here

										//}//end else here 
									}//end success funtion here
								});//end ajax call here


					}//end else here

					});//ed chosen category function here











});//end ready function here 

