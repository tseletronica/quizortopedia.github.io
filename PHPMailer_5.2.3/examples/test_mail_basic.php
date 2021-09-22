<html>

<head>
  <title>PHPMailer - Mail() basic test</title>
</head>

<body>

  <?php

  require_once '../class.phpmailer.php';
  
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
  $subject = $_POST['assuntoSelect']; 


  $mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

  try {
    $mail->AddReplyTo('quizmed@softbuilder.com.br', 'quizmed');
    $mail->AddAddress('contato@quizmed.com.br', 'Contato pelo Site');
    $mail->SetFrom('quizmed@softbuilder.com.br', 'quizmed');
    $mail->AddReplyTo($email);
    $mail->Subject = ($subject);
    $mail->AltBody = 'Para visualizar a mensagem, use um visualizador de e-mail compatível com HTML'; // optional - MsgHTML will create an alternate automatically
    $mail->msgHTML("
                    <h2> de:{$nome} </h2> <br/>
                    <h3> mensagem:<br>{$mensagem}</h3>
                    <h3> email:{$email} </h3><br/>
                  ");
    //$mail->MsgHTML(file_get_contents('contents.html'));
    //$mail->AddAttachment('images/phpmailer.gif');      // attachment
    //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
    $mail->Send();
    echo "Mensagem enviada com sucesso,obrigado\n";
  } catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
  } catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
  }

  ?>

</body>

</html>