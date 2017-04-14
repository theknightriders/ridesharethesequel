<?php
// Swift Mailer Library
require_once 'F:\xampp\htdocs\knightridertest7\swiftmailer\lib\swift_required.php';

// Mail Transport
$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
    ->setUsername('mgaknightriders@gmail.com') // Your Gmail Username
    ->setPassword('addison1'); // Your Gmail Password

// Mailer
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('[MGA KnightRiders] Please verify your email address. | DO NOT REPLY')
    ->setFrom(array($email => '')) // can be $_POST['email'] etc...
    ->setTo(array($email => '')) // your email / multiple supported.
    ->setBody('
	<div class="align" style="display: block;
				position: relative;
				max-width: 75%;
				margin-left: auto;
				margin-right: auto;"
	>
	<img class="logoBig" src="webdav.mga.edu/addison.gernannt/images/KRLogoHorizontal.jpg" alt="big logo"
	style="display: block;
				position: relative;
				max-width:70%;
				margin-left: auto;
				margin-right: auto;"
	>
		<div class="spacer" style="height:26px">
		<br style="line-height:26px">
        </div>
	<div class="paragraph" style="direction: ltr;
				margin: 5px 15px;
				padding-bottom: 20px;
				position: relative;"
	>
			Thank you for signing up with KnightRider! 
		<div class="spacer" style="height:26px">
		<br style="line-height:26px">
        </div>
			By clicking the link below, you are verifying your email address and helping keep us secure. 
		<br>
		<br>
			<a href="http://webdav.mga.edu/addison.gernannt">Verify email address
			</a>

	<hr>
		<br>
			You’re receiving this email because you recently created a new MGA KnightRider account.
			If this wasn’t you, please ignore this email.
		
		
        
	</div>			
			
			', 'text/html'); //The email being sent out now is simply a link back to the login page.

// Send the message
if ($mailer->send($message)) {
    echo 'Registration pending -- please check your email for verification.';
} else {
    echo 'Something is not quite right. Please verify your information.';
}

?>