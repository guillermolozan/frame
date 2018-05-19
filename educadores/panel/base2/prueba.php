<html>
<head>
<title>PHPMailer - SMTP advanced test with no authentication</title>
</head>
<body>

<?php
require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "mail.olva.com.pe"; // SMTP server
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier  
  $mail->Host       = "mail.olva.com.pe"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "boletin001@olvacourier.info"; // SMTP account username
  $mail->Password   = "compraonlinecourier2011";        // SMTP account password
  $mail->SMTPAuth   = true;                  // enable SMTP authentication


  $mail->AddReplyTo('olva@olvacompras.info', 'Olva Compras');
  $mail->AddAddress('guillermolozan@gmail.com', 'Guillermo Lozán');
  $mail->SetFrom('olva@olvacompras.info', 'Olva Compras');
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->Body = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

</body>
</html>
