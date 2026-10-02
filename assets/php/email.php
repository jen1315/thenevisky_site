<?php

//manda e-mail
$to = "thenevisky@altervista.org";
$headers = "From: yukkin126@gmail.com". "\r\n".
		"Reply-To: thenevisky@altervista.org". "\r\n".
		"X-Mailer: PHP/". phpversion();
if(!empty($_POST["messaggio"])) {
	$subject = "data: ". time();
	$message = $_POST["messaggio"];
	mail($to, $subject, $message, $headers);
}//if

?>