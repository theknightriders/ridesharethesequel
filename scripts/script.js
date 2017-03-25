//supposed to swap viewable and editable modes for profile page
//not yet working

$(document).ready(function() {

  $("#editableProfile").hide();
  $( "#editProfileButton" ).click(function() {
    $("#viewableProfile").hide();
    $("#editableProfile").show();
  });

})


