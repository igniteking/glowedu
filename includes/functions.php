<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function SendMail($email, $content)
{
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail = new PHPMailer();
        $mail->SMTPDebug = true;
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 465;
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Username = "learn.glowedu@gmail.com";
        $mail->Password = "zwbcxasfteugfrmo";

        $mail->setFrom('GlowEdu', 'Team GlowEdu');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Greetings!';
        $mail->Body = $content;

        $mail->send();
        //echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php?log=1\">";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
