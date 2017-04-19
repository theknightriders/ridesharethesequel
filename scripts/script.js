


$(document).ready(function() {

  $(".editableProfile").hide();
  $( ".showHideProfileButton" ).click(function() {
    $(".viewableProfile").toggle();
    $(".editableProfile").toggle();
  });


  $(".repeatTripFromTo").hide();
  $("input[name='oneOrRepeatTrip']").click(function () {
      $('.repeatTripFromTo').css('display', ($(this).val() === 'yes') ? 'block':'none');
  });


  $(".packageNotice").hide();
  $("input[name='packageYesOrNo']").click(function () {
      $('.packageNotice').css('display', ($(this).val() === 'yes') ? 'block':'none');
  });


  $(".messageToPassengers").hide();
  $("input[name='messageYesOrNo']").click(function () {
      $('.messageToPassengers').css('display', ($(this).val() === 'yes') ? 'block':'none');
  });


})

function cancelProfileForm() {
  $('#profileFname').val('');
  $('#profileLname').val('');
  $('#profilePhone').val('');
  $(".viewableProfile").toggle();
  $(".editableProfile").toggle();
}

function cancelPwordForm() {
  $('#changePasswordOld').val('');
  $('#changePasswordNew').val('');
  $('#changePasswordNew02').val('');
  $('#changePasswordModal').modal('toggle');
}
