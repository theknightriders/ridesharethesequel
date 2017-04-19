<?php
session_start();
if ($_SESSION['email'] == "")
	{
		// If they're not logged in, go to the login page
		header("Location:login.php");
	}
else
	{
		// Make the session available as a string variable
		$email = $_SESSION['email'];
	}
?>