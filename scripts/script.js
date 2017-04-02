//supposed to swap viewable and editable modes for profile page
//not yet working

$(document).ready(function() {

  $(".editableProfile").hide();
  $( ".showHideProfileButton" ).click(function() {
    $(".viewableProfile").toggle();
    $(".editableProfile").toggle();
  });

})


