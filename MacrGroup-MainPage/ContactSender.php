<?php
	require_once "swiftmailer/swift_required.php";
	session_start();

	if($_POST["captcha"] == $_SESSION["captcha_code"]){
		$name = $_POST["contactName"];
		$phone = $_POST["contactPhone"];
		$content = $_POST["contactMessage"];
		$email = $_POST["contactMail"];
		
		$senderEmail = "macrgroup.contact@gmail.com";
		$senderPassword = "dienthoaiiphone";
		$subject = "[Macrgroup][Contact] Tên: " + $name + ", Phone: " + $phone + ", Email: " + $email;

		$fromEmail = array("macrgroup.contact@gmail.com" => "Macrgroup Contact Mailer");
		$toEmail = array("taidh@macrgroup.com");

		$transport = Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl")->setUsername($senderEmail)->setPassword($senderPassword);
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance($subject)->setFrom($fromEmail)->setTo($toEmail)->setBody($content);

		$result = $mailer->send($message);
		echo "conctact_form_code_success";
	}else{
		echo "conctact_form_code_failed";
	}
?>