<?php
$servername = "168.16.222.102";
$username = "addisongernannt";
$serverpassword = "ILiveInMacon2!";
$dbname = "addisongernannt1617db";

// Create connection
$conn = new mysqli($servername, $username, $serverpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

?>
