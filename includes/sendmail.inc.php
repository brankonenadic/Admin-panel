<?php

function send_mail($to, $body, $subject)
{
	require '../PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	/*
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'lanintata.dev@mail.com';
	$mail->Password = '2810Lana15!';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	*/
	$mail->From = 'lanintata.dev@mail.com';
	$mail->FromName = 'LaninTata';
	$mail->addAddress($to);
	$mail->addReplyTo('lanintata.dev@mail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send())
	{
	return false;
	} 
	else 
	{
	return true;
	}
}
 
?>

