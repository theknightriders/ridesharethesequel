//supposed to swap viewable and editable modes for profile page
//not yet working

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


