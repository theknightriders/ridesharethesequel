<?php
// Needed to access the user's account
session_start();

// Housekeeping
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

// Anything echoed between these response tags is returned to ajaxValidation.js
echo '<response>';
  
  // Get the POST data and put it into variables
  $oldPword = $_POST['oldPwordInputValue'];
  $newPword = $_POST['newPwordInputValue'];
  $newPwordCheck = $_POST['newPwordInputValueCheck'];
  $phoneValidationOutputVariable = $_POST['phoneInputValue'];
  $fnameCheck = $_POST['fnameInputValue'];
  $lnameCheck = $_POST['lnameInputValue'];
  $deptCheck = $_POST['deptInputValue'];

  // If everything is empty..
  if (empty($phoneValidationOutputVariable) && empty($oldPword) && empty($newPword) && empty($newPwordCheck) && empty($fnameCheck) && empty($lnameCheck) && $deptCheck == "Department") {

    // Send this message
    echo "All Empty";

  // If something changed in the profile form that doesn't require validation
  } elseif(empty($oldPword) && empty($newPword) && empty($newPwordCheck) && (!empty($fnameCheck) || !empty($lnameCheck) || $deptCheck != "Department")) {

    // Send this message
    echo "Something Changed";

  // If something requires validation
  } else {

    // If we're working with passwords..
    if (empty($phoneValidationOutputVariable)) {

      // Start building the message to send back
      $pwordMessage = 'password message';

      // If the two new password fields match and contain something..
      if ($newPword == $newPwordCheck && !empty($newPword)) {

        // Connect to the database
        include ('mysqli_connect.php');

        // Check the password for the current user
          // Prepare the SQL statement
          $sql = "SELECT pword FROM users WHERE email = '" . $_SESSION['email'] . "'";

          // Bind the result set to a variable
          $result = $conn->query($sql);

          // Put the result set into an array..
          if ($result->num_rows > 0) {
            // Store each element of the array in its own global variable
            while($row = $result->fetch_assoc()) {
              // This is the variable we'll use to verify the one they entered
              $actPword = $row['pword'];
            }
          }

        // Close the database connection
        $conn->close();

        // Check to see if the old password matches the one we pulled from the database..
        if (!empty($oldPword) && $oldPword == $actPword) {
          // Send this message if the old password is correct
          $pwordMessage = $pwordMessage . "Yep";
        } else {
          // Send this message if the old password is incorrect
          $pwordMessage = $pwordMessage . "Nope";
        }
      // If the two new password fields match, but are empty..
      } elseif ($newPword == $newPwordCheck && empty($newPword)) {
        $pwordMessage = $pwordMessage . "Empty";
      // Send this message if the old password is incorrect
      } else {
        $pwordMessage = $pwordMessage . "NoMatch";
      }


      echo $pwordMessage;
    }

    // If we're working with phone number validation..
    if (empty($oldPword) && empty($newPword) && empty($newPwordCheck)) {
      // If it's an empty field or a 10 digit number..
      if (empty($phoneValidationOutputVariable) || preg_match("/^\d{10}$/", $phoneValidationOutputVariable)) {
        // It's all good
        echo 'Phone Number is good';
      // If it's neither empty nor a 10 digit number..
      } else {
        // It's not all good
        echo 'Phone Number must be a 10 digit integer!';
      }

    }
  }
  
echo '</response>';


?>
