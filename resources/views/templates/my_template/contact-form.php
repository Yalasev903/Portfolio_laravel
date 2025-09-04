<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$comments = $_POST['comments'];

if (isset($name) && isset($email)) {
	global $to_email, $vpb_message_body, $headers;
	$to_email = "slasev903@gmail.com"; // Здесь указываем новый адрес получателя
	$email_subject = "Inquiry From Contact Page";
	$vpb_message_body = nl2br("Dear Admin,\n
	The user whose detail is shown below has sent this message from ".$_SERVER['HTTP_HOST']." dated ".date('d-m-Y').".\n
	
	name: ".$name."\n
	Email Address: ".$email."\n
	Subject: ".$subject."\n
	Message: ".$comments."\n
	User Ip:".getHostByName(getHostName())."\n
	Thank You!\n\n");
	
	// Set up the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n"; 
	if (@mail($to_email, $email_subject, $vpb_message_body, $headers)) {
		$status = 'Success';
		// Displays the success message when email message is sent
		$output = "Congrats ".$name.", your email message has been sent successfully! We will get back to you as soon as possible. Thanks.";
	} else {
		$status = 'error';
		// Displays an error message when email sending fails
		$output = "Sorry, your email could not be sent at the moment. Please try again or contact this website admin to report this error message if the problem persist. Thanks.";
	}		
} else {
	$status = 'error';
	$output = "Please fill in the required fields";
}

echo json_encode(array('status' => $status, 'msg' => $output));

?>
