<?php
require __DIR__ .'/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com";    // SMTP server example
//$mail->SMTPSecure = "ssl";
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "";            // SMTP account username example
$mail->Password   = "";            // SMTP account password example

// Content
$mail->isHTML(true);                   // Set email format to HTML
$mail->AddAddress("youremail@gmail.com", "Parvez Alam");
//$mail->Subject = 'HTML Content';
//$mail->Body    = 'This is the HTML message body with html, I have added <b>in bold!</b> text.';
$mail->Subject  = "Expired access token of Facebook";
$messageHed = '
  <pre>Dear Admin,
        The Facebook Application Token will expire next couple of days.
        Please, Login and regenerate access token.</pre>';
		
$messageBody = '
<div class="topHeader">
<div class="logo"> <img src="/f_logo.png" alt="abcLogo"></div>
</div>
<div>'.$messageHed.'</div>
<div class="datacontainer">
<div class="Data_table">';

$messageBody .= '
<table cellpadding="0" cellspacing="1" border="0" width="100%" bgcolor="#fff">
<tbody>
<tr>
<th align="left">Application Name</th>
<th align="left">Application SiteId</th>
</tr>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td>test1</td>
<td>123</td>
</tr>
</tbody>
</table>
</div>
</div>
';
$mail->Body = $messageBody; 
if($mail->send()) {
	echo 'Successfully! Email has been sent.';
} else {

    echo "Mailer Error: " . $mail->ErrorInfo;
    exit;
}
?>  