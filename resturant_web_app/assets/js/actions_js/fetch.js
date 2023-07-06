$(document).ready(function(){
//fetch the cities on the selection of countries
		$(document).on('change','#business_country',function(){
			let country_id = $(this).find(':selected').val();
			$.ajax({url:'api/api.php',method:'post',data:{fetch_cities:1,country_id:country_id,client_site:1},success:function(d){if (d.length>0) {$("#business_city").empty().append(d); $("#city_chooser").show()}}});
		});

		$(document).on('change','#business_city',function(){
			let city_id = $(this).find(':selected').val();
			$.ajax({url:'api/api.php',method:'post',dataType:'JSON',data:{fetch_city_zipcode:1,city_id:city_id,client_site:1},success:function(d){$("#zip_code_info").html("ZipCode: "+d['location_city_zipcode']); }});
		});
})