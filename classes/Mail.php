<?php
include("../config/Configuration.php");
use PHPMailer\PHPMailer\PHPMailer;

class Mail {
    public static function send($to, $from, $fromName, $subject, $body, $altBody, $replyTo = null) {
        try {
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = MAIL_SMTPAUTH;                               // Enable SMTP authentication
            $mail->Username = MAIL_USERNAME;                 // SMTP username
            $mail->Password = MAIL_PASSWORD;                           // SMTP password
            // $mail->SMTPSecure = MAIL_SMTPSECURE;                            // Enable encryption, 'ssl' also accepted

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