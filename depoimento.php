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
$assunto = $_POST['assuntoSelect'];
$mensagem = $_POST['mensagem'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

if ($assunto =='Assunto'){
        $assunto = 'Dúvida';
}else{
    $assunto = $assunto;
};

$mail->CharSet = 'UTF-8';
$mail = new PHPMailer(true);

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Habilita o modo debug
   // $mail->SMTPDebug = 3;
    //$mail->SMTPSecure = 'tls';
    $mail->isSMTP(); //Habilita para SMTP
    $mail->Host = 'mail.softbuilder.com.br'; //Host do servidor de email
    $mail->SMTPAuth = true; //Habilita autenticação via SMTP
    $mail->Username = 'quizmed@softbuilder.com'; //usuario do email
    $mail->Password = '@sb4414@'; //senha do email
    $mail->Port = 587; //Porta usada pelo servidor SMTP do gmail

    $mail->setFrom('quizmed@softbuilder.com.br'); //Email remetente
    $mail->addAddress('contato@quizmed.com.br'); //Email destino

    $mail->isHTML(true); //Habilita o modo HTML
    $mail->Subject = $assunto;
    $mail->Body ="<html>
                        <head> <head> 
                        <h2><b>Nome: </b>$assunto</h2>      
                        <p><b>Nome: </b>$nome</p>
                        <p><b>E-mail: </b>$email</p>
                        <p><b>Mensagem: </b>$mensagem</p>
                        <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
                </html>";
    $mail->AltBody = 'Caso receba essa menssagem procurar o suporte ';

    if ($mail->send()) {
        echo "<script> window.location='index.html';alert('$nome, sua mensagem foi enviada com sucesso! Estaremos retornando em breve');</script>";
    } else {
        echo 'Email não enviado';
    }
} catch (Exception $e) {
    echo "Erro ao enviar menssagem:{$mail->ErrorInfor}";
}
