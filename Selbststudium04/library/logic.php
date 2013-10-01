<?php
	define('DEBUG',false);
	date_default_timezone_set('Europe/Zurich');

	if(DEBUG){
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
	}

	$status = array();
	
	if( isset( $_POST['submit'] ) && $_POST['submit'] === '1' ){

		if( $_POST['username'] !== 'wayne' && $_POST['password'] !== 'interessierts' ){ 
			$status[] = 'Login failed';
		} else {
			if(!DEBUG) {
				require_once('library/recaptcha.php');
				$privatekey = "6LeS7ecSAAAAACL0XbZPH9sz5c4vipCXoShzvJyX";
				$resp = recaptcha_check_answer ($privatekey,
											$_SERVER["REMOTE_ADDR"],
											$_POST["recaptcha_challenge_field"],
											$_POST["recaptcha_response_field"]);
			}
			if (!DEBUG && !$resp->is_valid) {
				$status[] = "The reCAPTCHA was not correctly... Please try again";
			} else {

				$filepath= '';
				if( isset( $_FILES["file"] ) && $_FILES['file']['size'] > 0 ){
					if ($_FILES["file"]["error"] > 0){
						$status[] = " fileupload error: " . $_FILES["file"]["error"] . "";
					} else {
						if( is_file( 'bugLog/bugAttachment/'.basename($_FILES["file"]["name"]) ) ) {
							$status[] = 'Fileupload failed';
						} else {
							$filepath = 'bugLog/bugAttachment/'.basename($_FILES["file"]["name"]);
							move_uploaded_file($_FILES['file']['tmp_name'],$filepath );
						}
					}
				}

				if(empty($_POST['name']) ){
					$status[] = 'Validation: name empty';
				}

				if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					$status[] = 'Validation: mail not valid';
				}

				if(empty($_POST['web']) ){
					$status[] = 'Validation: web empty';
				} else if ( filter_var($_POST['web'], FILTER_VALIDATE_URL) === false ){
					$status[] = 'Validation: url invalid';
				}

				if(empty($_POST['text']) ){
					$status[] = 'Validation: text empty';
				}

				if(empty($_POST['date']) ){
					$status[] = 'Validation: date empty';
				} else {
					$format = 'Y-m-d';
					$d = DateTime::createFromFormat($format, $_POST['date']);

					if( !$d || $d->format($format) != $_POST['date'] )
						$status[] = 'Validation: date format error';
				}

				if( count($status) === 0 ){
					$data = array();
					$data['name'] = $_POST['name'];
					$data['text'] = $_POST['text'];
					$data['submittime'] = @time('H:i:s');
					$data['submitdate'] = @date('Y.m.d');
					$data['filepath'] = $filepath;
					$data['email'] = $_POST['email'];
					$data['web'] = $_POST['web'];
					$data['username'] = $_POST['username'];
					file_put_contents('bugLog/bugContent/'.$data['submitdate'].'-'.$data['submittime'].'.txt',serialize($data));

					include 'library/smtpmail/library.php';
					include "library/smtpmail/classes/class.phpmailer.php";

					$host = "smtp.googlemail.com"; // smtp server
					$port = "465"; // port
					$mailuser = "murch.buchheim@gmail.com"; // mail account
					$mailpassword = "murch.buchheim2013"; // password

					$emailFrom = $_POST['email'];
					$emailTo = "christian.koller@gmx.ch";
					$emailSubject = "bug report";
					$emailText = 'Name: '.$data['name'].' Text: '.$data['text'].' Date: '.$data['submitdate'].' Time: '.$data['submittime'].' Email: '.$data['email'].' Website: '.$data['web'];
					$headers = 'From: '.$_POST['email'].'';

					$mail = new PHPMailer; // call the class
					$mail->IsSMTP();
					$mail->Host = $host; //Hostname of the mail server
					$mail->Port = $port; //Port of the SMTP like to be 25, 80, 465 or 587
					$mail->SMTPAuth = true; //Whether to use SMTP authentication
					$mail->Username = $mailuser; //Username for SMTP authentication any valid email created in your domain
					$mail->Password = $mailpassword; //Password for SMTP authentication
					$mail->AddReplyTo($_POST['email'], " "); //reply-to address
					$mail->SetFrom($mailuser, "PHP Mailer"); //From address of the mail
					$mail->SMTPSecure = 'ssl';
					$mail->SMTPDebug = 1;

					$mail->Subject = $emailSubject; //Subject od your mail
					$mail->AddAddress($emailTo, " "); //To address who will receive this email
					$mail->MsgHTML($emailText); //Put your body of the message you can place html code here
					$mail->AddAttachment($data['filepath']);
					$result = $mail->Send(); //Send the mails
	
					//something does not work :(
	
					/*require "library/dropbox-php-sdk-1.1.1/Dropbox/autoload.php";
					echo "1";
					$accessToken = '1OOHAlFwjSMAAAAAAAAAAX_4bq57F9B3WgGr2aLSxNxZzJyoySw30ebDGjCJ7Mgc';
					$dbxClient = new Dropbox\Client($accessToken, "PHP-Example/1.0");
					echo "2";
					if( is_file( $data['filepath'] ) ) {
						echo "3";
						$f = fopen( $data['filepath'], "rb");
						$result = $dbxClient->uploadFile( '/lordcoffee/'.$data['submitdate'].'/'.$data['submittime'].'_'. basename($data['filepath']), Dropbox\WriteMode::add(), $f);
						fclose($f);
					}*/
					
					$status[] = 'Bug Report was Successful';
					$_POST = array();
				}
			}
		}
	}
?>