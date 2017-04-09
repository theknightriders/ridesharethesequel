<?php
$servername = "168.16.222.102";
$username = "addisongernannt";
$password = "ILiveInMacon2!";
$dbname = "addisongernannt1617db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

// TESTING add data to a table (DOES NOT WORK YET)
  /*
  $sql = "INSERT INTO MyGuests (fname, lname, email)
  VALUES ('John', 'Doe', 'john@example.com')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  */



// Close connection
//$conn->close();
?>
