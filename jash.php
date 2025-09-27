<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nellurujaswanth2004@gmail.com';
    $mail->Password = 'irmbflgxudgmdjqe';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('nellurujaswanth2004@gmail.com', 'Smart Learn Hub');
    $mail->addAddress('jaswantharjun20@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email.';

    $mail->send();
    echo 'Message has been sent successfully';
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
