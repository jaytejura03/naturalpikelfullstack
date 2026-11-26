<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require_once __DIR__ . '/../vendor/autoload.php';

// function sendEmail($to, $subject, $body)
// {
//     $mail = new PHPMailer(true);

//     try {
//         $mail->isSMTP();
//         $mail->Host       = 'smtp.gmail.com';
//         $mail->SMTPAuth   = true;
//         $mail->Username   = 'YOUR_GMAIL@gmail.com';
//         $mail->Password   = 'YOUR_APP_PASSWORD';
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port       = 587;

//         $mail->setFrom('YOUR_GMAIL@gmail.com', 'Natural Pickle');
//         $mail->addAddress($to);

//         $mail->isHTML(true);
//         $mail->Subject = $subject;
//         $mail->Body    = $body;

//         $mail->send();

//         return true;
//     } catch (Exception $e) {
//         return false;
//     }
// }