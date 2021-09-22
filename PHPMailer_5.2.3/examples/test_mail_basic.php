<html>
<head>
<title>PHPMailer - Mail() basic test</title>
</head>
<body>

<?php

require_once '../class.phpmailer.php';
$body = " '<h1> teste /h1>'";

$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

try {
  $mail->AddReplyTo('quizmed@softbuilder.com.br', 'First Last');
  $mail->AddAddress('contato@quizmed.com.br', 'Formulário de Contato');
  $mail->SetFrom('quizmed@softbuilder.com.br', 'First Last');
  $mail->AddReplyTo('quizmed@softbuilder.com.br', 'First Last');
  $mail->Subject = 'Novo depoimento do usuário registrado!!!';
  $mail->AltBody = 'Para visualizar a mensagem, use um visualizador de e-mail compatível com HTML'; // optional - MsgHTML will create an alternate automatically
  $mail->msgHTML( $body);
  //$mail->MsgHTML(file_get_contents('contents.html'));
  $mail->AddAttachment('images/phpmailer.gif');      // attachment
  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

?>

</body>
</html>
