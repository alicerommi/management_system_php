$(document).ready(function(){
	let api_url = '../api/api.php';
	let business_owner_images_path = '../uploads/business_owner/business_owner_images/';
	//on dash board function calling
	//---------------------------------------SOME CUSOTM FUNCITONS///////////////////
	function alert_msg(str,type){
		return '<div class="alert alert-'+type+' text-center" >'+str+'</div>';
	}


	var business_owner_id =$("#busines_owner_id").val();
	$.ajax({
			url:api_url,
			data:{
			business_owner_id:business_owner_id,
			get_business_owner_profile:1,
			business_owner_site_app:1,	
			},
			dataType:'JSON',
			method:'post',
			success:function(d){
				let member_email = d['owner_details'].member_email;
				let member_cell_phone_number = d['owner_details'].member_cell_phone_number;
				let member_home_phone_number = d['owner_details'].member_home_phone_number;
				let member_office_number = d['owner_details'].member_office_number;
				let member_business_existence_durantion = d['owner_details'].member_business_existence_durantion;
				let owner_pic = business_owner_images_path+"business_owner_simple.png";
				let business_type = d['owner_details'].member_business_type;
				let business_location = d['owner_details'].member_business_location;
				let request_date_time  = d['owner_details'].request_datetime;
				let approval_request_datetime = d['owner_details'].approval_request_datetime;
				let owner_full_name =d['owner_details'].member_first_name+" "+d['owner_details'].member_last_name;
				let member_first_name = d['owner_details'].member_first_name;
				let member_last_name = d['owner_details'].member_last_name;
				let member_about = d['owner_details'].member_about;

				//let member_email = d['owner_details'].member_email;
				if (d['owner_details'].member_pic!=""){
					owner_pic = business_owner_images_path+d['owner_details'].member_pic;
				}else{
					$("#msg_alert").empty().append('<div class="alert alert-info">Your Profile is incompelte. Click Here To Update It</div>');
					$("#msg_alert").css('cursor','pointer');
				}

				$("#admin_name").html(owner_full_name);
				$("#admin_image").attr('src',owner_pic);
				var page_name = document.location.pathname.match(/[^\/]+$/)[0];
				if (page_name=="business_owner_profile.php")
					{
						$("#admin_image1").attr('src',owner_pic);
						$("#member_full_name").html(owner_full_name);
						$("#member_full_name2").html(owner_full_name);

						$("#member_email").html(member_email);
						$("#cell_phone_number").html(member_cell_phone_number);
						$("#home_phone_number").html(member_home_phone_number);
						$("#member_office_number").html(member_office_number);
						$("#business_duration").html(member_business_existence_durantion);
						$("#business_type").html(business_type);
						$("#business_location").html(business_location);
						$("#request_date_time").html(request_date_time);
						$("#request_approval_date_time").html(approval_request_datetime);
						/////////for updating admin profile
						$("#first_name").attr('value',member_first_name);
						$("#last_name").attr('value',member_last_name);
						$("#Email").attr('value',member_email);
						$("#AboutMe").html(member_about);
						let login_activities = $.ajax({
							url:api_url,
							data:{
								get_business_owner_all_login_activity:1,
								business_owner_site_app:1,
								business_owner_id:business_owner_id,
							},
							dataType:'JSON',
							method:'post',
							success:function(data){
								for ( let i =0 ; i<data.login_track.length ; i++){
									let member_login_activity_id = data.login_track[i].member_login_activity_id;
									let member_login_activity_ip = data.login_track[i].member_login_activity_ip;
									let member_login_datetime = data.login_track[i].member_login_datetime;
									let row = '<tr><td>'+member_login_activity_id+'</td><td>'+member_login_activity_ip+'</td><td>'+member_login_datetime+'</td></tr>';	
									$("#owner_login_activities").append(row);
								}
								
							}
						}); //end ajax call
						

					} //



					//////////////// update business profile and password
					$(document).on('submit','#update_business_owner_profile_details',function(e){
						e.preventDefault(); 
						var dataStr = new FormData(this);
						$.ajax({
							url:api_url,
							method:'post',
							data:dataStr,
							dataType:'JSON',
							contentType: false,
							cache: false,
							processData:false,
							success:function(d){

								if (d.success==1){
									if(d.have_image==1){
										$("#update_business_owner_profile_details_err_msg").empty().append('<div class="alert alert-success">'+d.msg+'</div>');
										let admin_image = d.image_name;
										$("#admin_image1").attr('src',business_owner_images_path+admin_image);
										$("#admin_image").attr('src',business_owner_images_path+admin_image);
										let owner_first_name = d.owner_first_name;
										let owner_last_name = d.owner_last_name;
										let owner_full_name = owner_first_name+" "+owner_last_name;
										$("#member_full_name").html(owner_full_name);
										$("#member_full_name2").html(owner_full_name);
										$("#admin_name").html(owner_full_name);

									}else if(d.have_image==0){
										$("#update_business_owner_profile_details_err_msg").empty().append('<div class="alert alert-success">'+d.msg+'</div>');
										let owner_first_name = d.owner_first_name;
										let owner_last_name = d.owner_last_name;
										let owner_full_name = owner_first_name+" "+owner_last_name;
										$("#member_full_name").html(owner_full_name);
										$("#member_full_name2").html(owner_full_name);
										$("#admin_name").html(owner_full_name);
									}
								}else if(d.success==0){
										$("#update_business_owner_profile_details_err_msg").empty().append('<div class="alert alert-warning">'+d.msg+'</div>');
								}

							}
						});  //end ajax

						
					});  //end update_business_owner_profile_details here

					// for updating the password 
					$(document).on('submit','#update_password_form',function(e){
						e.preventDefault();
						let dataString = $(this).serialize();
						$.ajax({
								url:api_url,
								method:'post',
								data:dataString,
								dataType:'JSON',
								success:function(data){
									if(data.success==1){
										$("#update_business_owner_profile_details_err_msg").empty().append(alert_msg(data.msg,'success'));
										$("#update_password_form")[0].reset();
									}else if(data.fail==1){
										$("#update_business_owner_profile_details_err_msg").empty().append(alert_msg(data.msg,'warning'));
									}
								}
						}); //end ajax call
					
					}); //end update_password_form


				//general request to check whether the owner has purchased the package or not
				$.ajax({
					
						url: api_url,
						method:'post',
						dataType:'JSON',
						data:{
							check_owner_purchased_package_or_not:1,
							business_owner_site_app:1,
							business_owner_id:business_owner_id,
						},
						success:function(d){
							if(d.success==1){
									if(d.have_purchased_package==1){
										$(".hider").hide(); //make it hide after 
									}else{
										$(".hider").show();
									}
							}
						} //end success
					
				});//end ajax call

				//var page_name = document.location.pathname.match(/[^\/]+$/)[0];
				//console.log(page_name);
				if(page_name=="all_membership_packages.php"){
					$.ajax({
						url:api_url,
						method:'post',
						data:{
							fetch_all_membership_packages:1,
							business_owner_id:business_owner_id,
							business_owner_site_app:1,
						},
						dataType:'json',
						success:function(d){
							$("#package_container").empty().append('<div id="msg_alert"></div>');
							if (d.owner_exists==1){
								if(d.success==1){
									let data = d['all_packages'];
									for(var o=0;o<data.length;o++){
										let arr = data[o];
										
										// {"status":"success","success":1,"business_owner_id":"1","owner_exists":1,"all_packages":[{"package_id":"1","package_name":"Basic","package_details":"Lorem Ipsum","package_price_per_month":"180","package_per_customer":"2","package_location":"karachi","package_added_datetime":"09\/10\/2019 12:56 pm","last_update_package_datetime":"2019-10-09 13:51:38","package_price_per_month_usd":"$180","package_per_customer_usd":"$2"}]}

										let package_id = arr['package_id'];
										let package_name = arr['package_name'];
										let package_details = arr['package_details'];
										let package_price_per_month_usd = arr['package_price_per_month_usd'];
										let package_per_customer_usd = arr['package_per_customer_usd'];
										let package_location = arr['package_location'];
										// var hidden_package_details = '<input id ="package_details_'+package_id+'" type="hidden" class="'+package_details+' shower_details">'
										
										var d = '<div class="col-sm-6 col-lg-3"><div class="price_card text-center"><div class="pricing-header bg-primary"><span class="price">'+package_price_per_month_usd+'/month</span><span class="name">'+package_name+'</span></div><ul class="price-features"><li>'+package_per_customer_usd+'/Per Customer</li><li>Location: '+package_location+'</li></ul><button type="button" class="btn btn-info waves-effect waves-light w-md read_package_details" id="'+package_id+'" data-toggle="modal" data-toggle="modal" data-target="#myModal">Read Package Details</button><button type="button" class="btn btn-purple waves-effect waves-light w-md purchase_package" id="'+package_id+'">Purchase This Package</button></div></div>';

										$("#package_container").append(d);



									}
								}

							}
						}
					});

						//read the package details
					$(document).on('click','.read_package_details',function(){
						let package_id = $(this).attr('id');
						$.ajax({
							url:api_url,
							method:'post',
							dataType:'JSON',
							data:{
								package_id:package_id,
								business_owner_id:business_owner_id,
								business_owner_site_app:1,
								get_specific_package_details:1,

							},
							success:function(d){
									if(d.success==1){
										$("#modal_header").empty().append('Package Details');
										$("#modal_data").empty().append(d.package_details);
										$("#myModal").show();
									}else if(d.success==0){
										$("#msg_alert").empty().append(alert_msg(d.msg,"danger"));
									}
							}	
						});
					});  // end read_package_details


					////////purchase a package 
					$(document).on('click','.purchase_package',function(){


							$.ajax({
								url:api_url,
								method:'post',
								dataType:'JSON',
								data:{
									package_id:package_id,
									business_owner_id:business_owner_id,
									business_owner_site_app:1,
									purchase_specific_package:1,
								},
								success:function(d){
										if(d.success==1){
											
										}else if(d.success==0){
												
										}
								}	
							});  //end ajax

					}); //end purchase_package

				} // end package condition 


			}




		

	});

	$(document).on('click','#msg_alert',function(){
		location.href="business_owner_profile.php";
	});

});   //end ready here

