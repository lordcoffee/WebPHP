<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	if(isset($_POST['send'])) {

		$emailFrom = $_POST['emailFrom'];
		$emailTo = $_POST['emailTo'];
		$emailSubject = $_POST['emailSubject'];
		$emailText = $_POST['emailText'];
		$header = 'From: '.$emailFrom.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($emailTo,$emailSubject,$emailText,$header);
	}
?>