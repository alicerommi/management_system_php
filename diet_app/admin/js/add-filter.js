

//for adding the dietplan filters here 
$(document).ready(function(){
	//get the item id and check it whether it exists in the deitplan or not
	//for getting the item id
	// var item_id;

$('#item-error').hide();

$('#item-success').hide();
	$(document).on('change','#choosenItem',function(){
		item_id = $('#choosenItem').find(':selected').val();
		// if(item_id.length==0){
		// 	$('#choosenItem').focus();
		// 	$("#item-error").css('color','red');
		// 	$("#item-error").html("Select A Food Item First");
		// }else{
			//ajax call
			var totalRows = $('#totalRows').val();
			$.ajax({
					url:'actions/fetch.php',
					method:'post',
					dataType:'JSON',
					data:{item_id:item_id},
					success:function(data) {
						//show the data in other dropdowns 
						var index;
						for(var a = 0; a<data.length;a++){
							index = a+1;
							var dietplan_id = data[a].dietplan_id;
							var filter = data[a].flag;
							//$('#select_cp'+index+' option[value='+dietplan_id+']').prop('selected','selected').change();
							$('#select_cf'+index+' option[value="'+filter+'"]').prop('selected','selected').change();
							$('#saveBtn'+index).html("Update");
							//$('#saveBtn'+index).attr("class", "btn btn-primary updateFilter");
						}
						// console.log(index);

						for(var b=index+1; b<=totalRows;b++ ){
								//$('#select_cp'+b+' option[value=""]').prop('selected','selected').change();
								$('#select_cf'+b+' option[value=""]').prop('selected','selected').change();
								$('#saveBtn'+b).html("Save");
								//$('#saveBtn'+index).attr("class", "btn btn-primary saveFilter");

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
			var item_id = $('#choosenItem').find(':selected').val();
			
			if(item_id!=null && item_id.length!=0){
//	if($('#select_cf'+btnRowNumber).find(':selected').val().length!=0){
				var dietplan_id	 = $('#select_cf'+btnRowNumber).attr('data-id');
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
			}else{
				$('#item-error').html("Choose the Food Item First");
				$("#choosenItem").focus();
								$('#item-error').show();
			}
			

			e.preventDefault();
			//get the selected values of that row 


});




});
