<?php
if($_POST){
  if (empty($_POST["first_name"])){
    $first_nameError = "Nome é um campo obrigatório!!";
  }else{
    $first_name = test_input($_POST["first_name"]);
  }

  if (empty($_POST["last_name"])){
    $last_nameError = "Apelido é um campo obrigatório!!";
  }else{
    $last_name = test_input($_POST["last_name"]);
  }

  if (empty($_POST["email"])){
    $emailError = "Email é um campo obrigatório!!";
  }else{
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["city"])){
    $cityError = "Localidade é um campo obrigatório!!";
  }else{
    $city = test_input($_POST["city"]);
  }

  if (!empty($_FILES['uploaded_file'])){
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);/* mudar o path mais tarde*/
    $ext = pathinfo($path, PATHINFO_EXTENSION); //extensão do ficheiro submetido
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo 'O ficheiro '. basename( $_FILES['uploaded_file']['name']). 'foi submetido.';
    }else{
      echo 'Ocorreu um erro durante o upload.';
    }
  }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//Load Composer's autoloader

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
    $mail->Host = 'smtp.gmail.com';  // Especificar o servidor SMTP
    $mail->SMTPAuth = true;                               // Abilitar autentificação do SMTP
    $mail->Username = 'rcarneiropro@gmail.com';                 // Adicionar email válido
    $mail->Password = 'Cardoso96carneiro';                           // Adicionar password desse email
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAutoTLS = false;
    $mail->Port = 587;

    //Workaround - makes it work for PHPMailer 5.2.10 and newer versions
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
    );
    //Recipients
    $mail->setFrom('rcarneiropro@gmail.com', 'GymStar', 0);
    $mail->addAddress($email);     // Alterar para o email no qual se pretendem receber os dados

    //Email Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Inscrição GymStar';
    $mail->Body    = 'Olá ' . $first_name . ' ' . $last_name . ',
    <br>Obrigado por ter submetido a sua inscrição. Vamos analisá-la e caso seja aceite será notificado.
    <br>Os dados que submeteu foram os seguintes:
    <br><ul><b>Nome: </b>' . $first_name . ' ' . $last_name . '</ul>
    <ul><b>Email: </b>' .  $email . '</ul>
    <ul><b>Localidade: </b>' . $city . '</ul>
    <ul><b>Ficheiro: </b>' . $ext . '</ul>
    <br> Cumprimentos, <br> GymStar.';

    $mail->send();
    echo 'Messagem foi enviada.';
} catch (Exception $e) {
    echo 'Messagem não foi enviada. Erro de Mail: ', $mail->ErrorInfo;
}

?>
