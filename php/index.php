<?php
//Load Composer's autoloader
require 'phpmailer/PHPMailerAutoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->isSMTP();
    $mail->SMTPDebug = 2;                             // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'rcarneiropro@gmail.com';                 // SMTP username
    $mail->Password = 'cardoso96carneiro';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPAutoTLS = false;
    $mail->Port = 587;                                    // TCP port to connect to

    //Workaround - makes it work for PHPMailer 5.2.10 and newer versions
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
    );
    //Recipients
    $mail->setFrom('rcarneiropro@gmail.com', 'Mailer', 0);
    $mail->addAddress('28457@esccb.pt');     // Add a recipient

    //Email Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Inscrição GymStar';
    $mail->Body    = 'Olá' <?echo $first_name;?> <?echo $last_name;?>', <br> Obrigado por ter submetido a sua inscrição. Vamos analisá-la e caso seja aceite será notificado.
    Os dados que submeteu foram os seguintes:<br> <ul>Nome:' <?echo $first_name;?> <?echo $last_name;?> '<ul>'<?echo $email;?> '<ul>'<?echo $city;?>'.<br> Cumprimentos, <br> GymStar.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>
