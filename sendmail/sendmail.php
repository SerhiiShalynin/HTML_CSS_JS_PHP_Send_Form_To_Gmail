<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 's.shalynin@gmail.com';
	$mail->Password = 'apooifykgrqqudoc';
	$mail->Port = '587';
	$mail->SMTPSecure = 'TLS';

	$mail->setFrom('soglasie.sergey@gmail.com', 'Soglasie test');
	$mail->addAddress('s.shalynin@gmail.com');
	$mail->Subject = 'Email from Soglasie!';

	$body = '<h1>Заголовок письма!</h1>';
	
	if(trim(!empty($_POST['name']))){
		$body.='<p>Name: <strong>'.$_POST['name'].'</strong></p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.='<p>Email: <strong>'.$_POST['email'].'</strong></p>';
	}
	if(trim(!empty($_POST['message']))){
		$body.='<p>Message: <strong>'.$_POST['message'].'</strong></p>';
	}
	if(trim(!empty($_POST['like']))){
		$body.='<p>Do you like simple-form? <strong>'.$_POST['like'].'</strong></p>';
	}
	if(trim(!empty($_POST['example']))){
		$body.= '<strong>This is a good <a href="https://farm-vest-serhiishalynin.vercel.app">example</a>!</strong>';
	}
	if (trim(!empty($_FILES['image']['tmp_name']))) {
		$fileTmpName = $_FILES['image']['tmp_name'];
		$fileName = $_FILES['image']['name'];
		$mail->addAttachment($fileTmpName, $fileName);
	}

	$mail->Body = $body;

	$mail->send();
	$mail->smtpClose();
?>