// Data Table
$(document).ready(function() {
    $('#example').DataTable();
} );

// Side Bar
$(document).ready(function () {

    $('.sidebartoggler').on('click', function () {
        $('.left-sidebar').toggleClass('active');
        // $('.page-wrapper').toggleClass('active-wrapper');
    });

});
// Mobile Sidebar
$(document).ready(function () {

    $('.nav-toggler').on('click', function () {
        $('.left-sidebar').toggleClass('active');
    });

});
