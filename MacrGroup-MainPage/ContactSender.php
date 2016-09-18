<?php
	require_once 'swiftmailer/swift_required.php';

	$name = $_POST["contactName"];
	$phone = $_POST["contactPhone"];
	$content = $_POST["contactMessage"];
	$email = $_POST["contactMail"];
	
	$senderEmail = 'macrgroup.contact@gmail.com';
	$senderPassword = 'dienthoaiiphone';
	$subject = '[Macrgroup][Contact] Tên: ' + $name + ', Phone: ' + $phone + ', Email: ' + $mail;
	$fromEmail = array('macrgroup.contact@gmail.com' => 'New Contact From Customer');
	$toEmail = array('taidh@macrgroup.com');

	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")->setUsername($senderEmail)->setPassword($senderPassword);

	$mailer = Swift_Mailer::newInstance($transport);

	$message = Swift_Message::newInstance()->setSubject($subject)->setFrom($fromEmail)->setTo($toEmail)->setBody($content);

	$result = $mailer->send($message);
?>