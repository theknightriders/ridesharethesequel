<?php
// Swift Mailer Library
require_once 'F:\xampp\htdocs\knightridertest4\switftmailer\lib\swift_required.php';

// Mail Transport
$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
    ->setUsername('mgaknightriders@gmail.com') // Your Gmail Username
    ->setPassword('addison1'); // Your Gmail Password

// Mailer
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Knight Riders Registration -- DO NOT REPLY')
    ->setFrom(array($email => $fname)) // can be $_POST['email'] etc...
    ->setTo(array($email => $lname)) // your email / multiple supported.
    ->setBody('Thank you for signing up with Knight Riders! \r\n
					Please click on or copy/paste the URL below to login. \r\n
					(http://webdav.mga.edu/addison.gernannt/)', 'text/html');

// Send the message
if ($mailer->send($message)) {
    echo 'Registration pending -- please check your email for verification';
} else {
    echo 'Something is not quite right. Please check your information and resubmit.';
}

?>