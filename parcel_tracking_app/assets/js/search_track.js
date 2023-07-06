$(document).ready(function(){
	$(document).on('click','#aSearch',function(){
		let search_track = $('#txtsearch').val();
		// alert(search_track);
		if(search_track.length==0){
			alert('Enter The Tracking Id');
		}else{
				location.href='tracking.php?track_id='+search_track;
		}
	});	

});