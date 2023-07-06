/////////this file will only use for insertion.
$(document).ready(function(){
		/////////// contact us page form
		$(document).on('submit','#contact_us_form',function(e){
				var dataString = $("#contact_us_form").serialize()+"&contact_us_form=1&client_site=1";
				$.ajax({
					url:'api/api.php',
					method:'post',
					data:dataString,
					dataType:"JSON",
					success:function(data){
						if(data.success==1){
							$("#contact_us_form")[0].reset();
							// /swal("Good job!", data.msg, "success");
							swal({
								cancel: true,
							  title: "Good job!",
							  text: data.msg,
							  icon: "success",
							   button: true,
							    timer: 5000,
							});
						}else{
								//swal("Error!", data.msg, "error");
								swal({
								 cancel: true,
								  title: "Error!",
								  text: data.msg,
								  icon: "error",
								   button: true,
								    timer: 5000,
								})
						}

					}
				});
				e.preventDefault();
		}); //end contact_us_form

		/////////membership_form

		$(document).on('submit','#membership_form',function(e){
				var dataString = $("#membership_form").serialize()+"&membership_form=1&client_site=1";
				$.ajax({
					url:'api/api.php',
					method:'post',
					data:dataString,
					dataType:"JSON",
					success:function(data){
						if(data.success==1){
							$("#membership_form")[0].reset();
							//swal("Good job!", data.msg, "success");
							swal({
								cancel: true,
							  title: "Good job!",
							  text: data.msg,
							  icon: "success",
							   button: true,
							    timer: 5000,
							});
						}else{
								// swal("Error!", data.msg, "error");
								swal({
								 cancel: true,
								  title: "Error!",
								  text: data.msg,
								  icon: "error",
								   button: true,
								    timer: 5000,
								})
						}

					}
				});
				e.preventDefault();
		}); //end membership_form

		$(document).on('submit','#customer_register_form',function(e){
				var dataString = $("#customer_register_form").serialize()+"&customer_register_form=1&client_site=1";
				$.ajax({
					url:'api/api.php',
					method:'post',
					data:dataString,
					dataType:"JSON",
					success:function(data){
						if(data.success==1){
							$("#customer_register_form")[0].reset();
							swal({
								cancel: true,
							  title: "Good job!",
							  text: data.msg,
							  icon: "success",
							   button: true,
							    timer: 5000,
							});
						
						}else{
							swal({
								 cancel: true,
								  title: "Error!",
								  text: data.msg,
								  icon: "error",
								   button: true,
								    timer: 5000,
								})
						}

					}
				});
				e.preventDefault();
		}); //end customer_register_form


		$(document).on('submit','#customer_login',function(e){
			e.preventDefault();
			var checkbox = $('input[name=remember_me_check]:checked');
			if(checkbox.length>0)
			{
					let customer_email_login = $("#customer_email_login").val();
					let customer_login_password = $("#customer_login_password").val();
					localStorage.setItem("user_email",customer_email_login);
					localStorage.setItem("user_password",customer_login_password);
			}else{
					localStorage.clear();
			}
			var dataString = $("#customer_login").serialize()+"&customer_login=1&client_site=1";
				
				$.ajax({
					url:'api/api.php',
					method:'post',
					data:dataString,
					dataType:"JSON",
					success:function(data){
						// console.log(data);
						if (data.user_type=="customer"){
										if(data.success==1){
													$("#customer_login")[0].reset();
													location.href='setup_sessions.php?customer_id='+data.customer_id;

										}else{
												swal({
													 cancel: true,
													  title: "Error!",
													  text: data.msg,
													  icon: "error",
													   button: true,
													    timer: 5000,
													})
										}
						}else if(data.user_type=="Business Owner"){
											if(data.success==1){
												location.href='setup_sessions.php?business_owner_id='+data.business_owner_id;
											}else{
												swal({
													 cancel: true,
													  title: "Error!",
													  text: data.msg,
													  icon: "error",
													   button: true,
													    timer: 5000,
													})
											}
							}

					}
				});
				
		}); //end customer_register_form


		
});