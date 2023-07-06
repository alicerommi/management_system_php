// Side Bar
$(document).ready(function () {

    $('.sidebartoggler').on('click', function () {
        $('.left-sidebar').toggleClass('active');
        $('.page-wrapper').toggleClass('active-wrapper');
    });

});
// Mobile Sidebar
$(document).ready(function () {

    $('.nav-toggler').on('click', function () {
        $('.left-sidebar').toggleClass('active');
    });

});

// Upload Image Section
$(document).ready(function() {

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('.company-logo .view-img img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#upload").change(function() {
    readURL(this);
  });

  $('.uploadbtn').on('click', function() {
    $('#upload').trigger('click');

  });
});


// State Option Function
function malaysiaFunction() {
  $('#malaysia').show();
  // $('#malaysia-label').show();
  // $('#singapore-label').hide();
  $('#singapore').hide();
}
function singaporeFunction() {
  $('#singapore').show();
  // $('#singapore-label').show();
  // $('#malaysia-label').hide();
  $('#malaysia').hide();
}


// Manage Notifications Function
function anEmployer() {
  $('.notification_name1').show();
  $('.notification_name2').hide();
}

function aJobseeker() {
  $('.notification_name1').hide();
  $('.notification_name2').show();
}

function allSelect() {
  $('.notification_name1').hide();
  $('.notification_name2').hide();
}

function allJobseeker() {
  $('.notification_name1').hide();
  $('.notification_name2').hide();
}

function allEmployer() {
  $('.notification_name1').hide();
  $('.notification_name2').hide();
}


// Modal Section
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
