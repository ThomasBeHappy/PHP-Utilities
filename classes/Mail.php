<?php

use PHPMailer\PHPMailer\PHPMailer;

class Mail {
    public static function send($to, $from, $fromName, $subject, $body, $altBody, $replyTo = null) {
        try {
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = Configuration::$Mail_host;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = Configuration::$Mail_SMTPAuth;                               // Enable SMTP authentication
            $mail->Username = Configuration::$Mail_Username;                 // SMTP username
            $mail->Password = Configuration::$Mail_Password;                           // SMTP password
            $mail->SMTPSecure = Configuration::$Mail_SMTPSecure;                            // Enable encryption, 'ssl' also accepted

            $mail->From = $from;
            $mail->FromName = $fromName;
            $mail->addAddress($to);     // Add a recipient
            if($replyTo != null) {
                $mail->addReplyTo($replyTo);
            }
            $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
            $mail->isHTML(true);                                  // Set email format to HTML
            
            
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $altBody;
            $mail->send();
            return true;
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
        return false;
    }
}