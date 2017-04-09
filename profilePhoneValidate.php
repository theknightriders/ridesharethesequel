<?php


header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';


  $phoneValidationOutputVariable = $_GET['phoneInput'];
  $phoneLength = strlen((string)$phoneValidationOutputVariable);
  if (empty($phoneValidationOutputVariable)) {
    echo 'good';
  } elseif (preg_match("/^\d{10}$/", $phoneValidationOutputVariable)) {
    echo 'good';    
  } else {
    echo 'Phone Number must be a 10 digit integer!';
  }
echo '</response>';



/*
  header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

  echo '<response>';

  $name = $_GET['phoneInput'];
  $nameArray = array('Mehrshad', 'Alex', 'Tom', 'Aydin');

  if(in_array($name, $nameArray))
  {
      echo 'I do know '. $name . '!';
  }
  else if($name == '')
  {
      echo 'Enter a name you want to know about';
  }
  else
  {
      echo 'Sorry we don\'t have user "'. $name . '" ';
  }

  echo '</response>';
*/


?>
