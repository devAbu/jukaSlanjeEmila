<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];

echo $name;
echo '<br>';
echo $email;
echo '<br>';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    //$mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    //$mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'abdulrahman.almonajed@gmail.com';                 // SMTP username
    //$mail->Password = 'camqaqoelmxzbouh';                           // SMTP password
    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;     
    
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;
// TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@btt.ba', 'BTT');
    $mail->addAddress($email);     // Add a recipient
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'PORUKA OD KORISNIKA';
    $mail->Body    = $name;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

/* ini_set('SMTP','myserver');
ini_set('smtp_port',25);
$admin_email = "someone@example.com";
$subject = $_REQUEST['name'];
$comment = $_REQUEST['name'];

//send email
mail($admin_email, "$subject", $comment, "From:" . $email) */
?>