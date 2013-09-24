<?php
	include 'smtpmail/library.php';
	include "smtpmail/classes/class.phpmailer.php";
	
	//error_reporting(E_ALL);
	ini_set('display_errors', '1');

	if(isset($_POST['send'])) {

		$host = "smtp.googlemail.com"; // smtp server
		$port = "465"; // port
		$user = "murch.buchheim@gmail.com"; // mail account
		$password = "murch.buchheim2013"; // password

		$emailFrom = $_POST['emailFrom'];
		$emailTo = $_POST['emailTo'];
		$emailSubject = $_POST['emailSubject'];
		$emailText = $_POST['emailText'];
		$headers = 'From: '.$emailFrom.'';
		
		$mail = new PHPMailer; // call the class
		$mail->IsSMTP();
		$mail->Host = $host; //Hostname of the mail server
		$mail->Port = $port; //Port of the SMTP like to be 25, 80, 465 or 587
		$mail->SMTPAuth = true; //Whether to use SMTP authentication
		$mail->Username = $user; //Username for SMTP authentication any valid email created in your domain
		$mail->Password = $password; //Password for SMTP authentication
		$mail->AddReplyTo($emailFrom, " "); //reply-to address
		$mail->SetFrom($user, "PHP Mailer"); //From address of the mail
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPDebug = 1;
	
		$mail->Subject = $emailSubject; //Subject od your mail
		$mail->AddAddress($emailTo, " "); //To address who will receive this email
		$mail->MsgHTML($emailText); //Put your body of the message you can place html code here
		$result = $mail->Send(); //Send the mails
	}
?>