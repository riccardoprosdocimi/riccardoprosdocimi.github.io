<?php
	if (!isset($_POST['submit'])) {
		echo "error; you need to submit the form!";
	}
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$message = $_POST['message'];
	if (empty($name) || empty($visitor_email)) {
		echo "Name and email are mandatory!";
		exit;
	}
	$email_from = 'ric_pro@icloud.com';
	$email_subject = "$name submitted the form on your portfolio";
	$email_body = "Name: $name\nEmail: $email\nMessage: $message"
	$to = "ric_pro@icloud.com";
	$headers = "From: $email_from \r\n";
	mail($to, $email_subject, $email_body, $headers);
	function IsInjected($str) {
		$injections = array(
			'(\n+)',
			'(\r+)',
			'(\t+)',
			'(%0A+)',
			'(%0D+)',
			'(%08+)',
			'(%09+)'
		);     
		$inject = join('|', $injections);
		$inject = "/$inject/i";
		if (preg_match($inject,$str)) {
			return true;
		} else {
			return false;
		}
	}
	if (IsInjected($visitor_email)) {
		echo "Bad email value!";
		exit;
	}
?>