<?php
        $to = $email;
        $subject = "Knight Riders Registration";
        
        $message = "Thank you for signing up with Knight Riders! \r\n
					Please click on or copy/paste the URL below to login. \r\n
					(Insert URL Here)";
		$message = wordwrap($message, 70, "\r\n"); //Wordwrap in case a line exceeds 70 characters
		$message = str_replace("\n.", "\n..",$message); //Account for PHP-to-SMTP full stop
        
        $header = "From:MGAKnightRiders@mga.edu";
        
        mail($to,$subject,$message,$header);
?>
      