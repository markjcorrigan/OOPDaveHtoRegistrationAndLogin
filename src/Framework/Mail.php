<?php

namespace Framework;
 
use Framework\Config;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
 
class Mail
{
    /**
     * @throws Exception
     */
    public static function send($to, $subject, $text, $html): void
    {   
        $mail = new PHPMailer();
 
        $mail->isSMTP();
        $mail->Host = Config::SMTP_HOST;
        $mail->Port = Config::SMTP_PORT;
        $mail->SMTPAuth = false;
        $mail->Username = Config::SMTP_USER;
        $mail->Password = Config::SMTP_PASSWORD;
        $mail->SMTPSecure = '';  //'tls'
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->setFrom('mark@stow.co.za');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $html;
        $mail->AltBody = $text;
        $mail->send();
       
   }
}