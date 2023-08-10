<!-- testmail.php is a template for sending mail via suGullcode@gmail.com email account; this will be used for su email account verification this code functions but more work is needed on what should actually be in the email -->
<html>
<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true);
// $newUserEmail = $_POST['su_email'];

try {
    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'sugullcode@gmail.com';
    $mail->Password = 'zxvjuspeliothdvq';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = "sugullcode@gmail.com";
    $mail->FromName = "SU Math & Computer Science Club";
    //needs to be changed to $newUserEmail
    // $mail->addAddress('johnls1986@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Verify Email';
    $mail->Body = 'You recently requested to created a new account on the Salisbury University GullCode website.  Please use the temporary password below';

    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

</html>