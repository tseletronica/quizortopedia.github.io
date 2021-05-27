<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Variáveis
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Habilita o modo debug
    $mail->isSMTP(); //Habilita para SMTP
    $mail->Host = 'smtp.gmail.com'; //Host do servidor de email
    $mail->SMTPAuth = true; //Habilita autenticação via SMTP
    $mail->Username = 'tiagoserafim2014@gmail.com'; //usuario do email
    $mail->Password = '050191Aa'; //senha do email
    $mail->Port = 587; //Porta usada pelo servidor SMTP do gmail

    $mail->setFrom('tiagoserafim2014@gmail.com'); //Email remetente
    $mail->addAddress('tseletronica@hotmail.com'); //Email destino

    $mail->isHTML(true); //Habilita o modo HTML
    $mail->Subject = 'Assunto do Email';
    $mail->Body =   "<p><strong>'.$nome.'</p></strong>";
                    "<p><strong>'.$email.'</p></strong>";
                    "<p><strong>'.$mensagem.'</p></strong>";                    

    $mail->AltBody = 'Caso receba essa menssagem procurar o suporte ';

    if ($mail->send()) {
        echo 'Email enviado com sucesso por  ' . $nome;
    } else {
        echo 'Email não enviado';
    }
} catch (Exception $e) {
    echo "Erro ao enviar menssagem:{$mail->ErrorInfor}";
}
