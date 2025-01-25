<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($dataMail){

$mail = new PHPMailer(true);

try {
                        
    $mail->isSMTP();   
    $mail->Host = MAIL_HOST;
    $mail->Port = MAIL_PORT; 
    $mail->SMTPAuth = false;
    $mail->SMTPSecure = false;
    $mail->Password   = 'Psscode_Pr0fitline'; 
   
    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);      
    $mail->addAddress($dataMail['email'], $dataMail['name']);
    $mail->addReplyTo(MAIL_REPLY_TO, MAIL_REPLY_TO_NAME);

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = $dataMail['subject'];
    $mail->Body    = $dataMail['body'];
    $mail->AltBody = $dataMail['altBody'];

    dd($mail->send() , 1);
    return true;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    flash('ErrorRegisterInUser', " مشکلی پیش آمده لطفا جهت فعال سازی حساب خود با پشتیبانی در تماس باشید ", "alert alert-danger");

}
}
