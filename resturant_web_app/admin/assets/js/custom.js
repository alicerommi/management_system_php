/// for hiding the insert,update, delete actions messages from the admin panel
setTimeout (function(){
	$('.actions_messages').fadeOut('slow');
},10000);

// if a page reloaded or refreshed two time then alert will not visible
if (performance.navigation.type == 1) {
    // console.info( "This page is reloaded" );
    $('.actions_messages').hide();
}