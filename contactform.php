<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
  $email_from = 'ric_pro@icloud.com';
  $email_subject = "$name submitted the form on your portfolio";
  $email_body = "Here's the message from $name:\n $message"
  $to = "ric_pro@icloud.com";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $visitor_email \r\n";
  mail($to,$email_subject,$email_body,$headers);
  function IsInjected($str) {
  	$injections = array('(\n+)',
       '(\r+)',
       '(\t+)',
       '(%0A+)',
       '(%0D+)',
       '(%08+)',
       '(%09+)'
       );     
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str)) {
      return true;
    } else {
      return false;
   	}
  }
  if(IsInjected($visitor_email)) {
    echo "Bad email value!";
    exit;
   }
?>