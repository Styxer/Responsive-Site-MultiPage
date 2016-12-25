<?php
if(isset($_POST['submit'])) 
{

$message=
'Full Name:	'.$_POST['contact_name'].'<br />
Email:	'.$_POST['contact_email'].'<br />
Phone:	'.$_POST['contact_phone'].'<br />
Subject:	'.$_POST['contact_subject'].'<br />
Comments:	'.$_POST['contact_message'].'
';
    require "phpmailer/PHPMailerAutoload.php"; //include phpmailer class
      
    // Instantiate Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
    $mail->SMTPSecure = 'tls';      // Connect using a TLS connection  
    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
    $mail->Port = 587;  //Gmail SMTP port
    
    // Authentication  
    $mail->Username   = 'gennin@gmail.com'; // Your full Gmail address
    $mail->Password   = 'w00t!eran$'; // Your Gmail password
      
    // Compose
    $mail->SetFrom($_POST['contact_email'], $_POST['contact_name']);
    $mail->AddReplyTo($_POST['contact_email'], $_POST['contact_name']);
    $mail->Subject = "New Contact Form Enquiry";      // Subject (which isn't required)  
    $mail->MsgHTML($message);
 
    // Send To  
    $mail->AddAddress('gennin@gmail.com', 'Mehayom LeHayom Website'); // Where to send it - Recipient
    $result = $mail->Send();		// Send!  
	$message = $result ? 'Successfully Sent!' : 'Sending Failed!';      
	unset($mail);

}
?>
