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
   
  if( $_POST['assuntoSelect']==='Assunto'){
    $subject = 'Assunto Indefinido';
  }elseif (empty($_POST['assuntoSelect'])) {
    $subject = 'Novo depoimento do usuário registrado!';
  }else {
    $subject = $_POST['assuntoSelect'];
  }
  $assunto = $subject;
    
  $mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

  try {
    $mail->AddReplyTo('quizmed@softbuilder.com.br', 'quizmed');
    $mail->AddAddress('contato@quizmed.com.br', 'Contato pelo Site');
    $mail->SetFrom('quizmed@softbuilder.com.br', 'quizmed');
    $mail->AddReplyTo($email);
    $mail->Subject = ($subject); 
    $mail->AltBody = 'Para visualizar a mensagem, use um visualizador de e-mail compatível com HTML'; // optional - MsgHTML will create an alternate automatically
    $mail->msgHTML("
                    <h1> {$assunto} </h1> 
                    <h2> De:{$nome} </h2>
                    <font color='#000099'><h3> mensagem:<h3></font>
                    <p> {$mensagem}</p><br><br><br>
                    <h5> email:{$email} </h5>
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