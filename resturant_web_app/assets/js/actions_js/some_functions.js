$(document).ready(function(){
	// check customer is blocked or not
	let customer_block = $("#customer_block").val();
	// console.log(customer_block);
	//location.href="customer_login.php?customer_blocked_from_admin=1";

	if(customer_block==1){
		$.ajax({
			url:'api/api.php',
			method:'post',
			data:{
				block_this_customer:1,
				client_site:1,
			},
			dataType:"JSON",
			success:function(d){
				if(d.status=='success'){
						location.href="customer_login.php?customer_blocked_from_admin=1";
				}
			}
			});
	}

	//customer tabs functions with url
	$(document).on('click','.customer_menus',function(){
		var id = $(this).attr('id');
		location.href=id+'.php';
		//$("#"+id).attr('class','customer_menus uk-active');


	});

});