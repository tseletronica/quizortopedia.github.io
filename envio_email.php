<html>

<head>
  <title>Quizmed - envio de email</title>
</head>

<body>

  <?php

  require_once './PHPMailer_5.2.3/class.phpmailer.php';
 

  $nome = $_POST['nome'];

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  } else {
    $email = "quizmed@softbuilder.com.br";
  }

  if (isset($_POST['assuntoSelect'])) {
    if ($_POST['assuntoSelect'] === 'Assunto') {
      $subject = 'Assunto Indefinido';
    } else {
      $subject = $_POST['assuntoSelect'];
    }
  } else {
    $subject = "Novo depoimento do usuário registrado!!";
  }
  
  $mensagem = $_POST['mensagem'];
  $assunto = $subject;
  

  $mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch
 

  try {
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
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
    
    $mail->Send();
    echo '<!DOCTYPE html>';
    echo '<html xmlns="http://www.w3.org/1999/xhtml">';
    echo '<head>';
    echo '   <meta http-equiv="refresh" content="10; url=http://softbuilder.com.br/site-quizmed/index.html">';
    echo '</head>';
    echo '<body>';
    echo '<p>Seu email foi enviado com sucesso.</p>';
    echo '<a href="http://softbuilder.com.br/site-quizmed/index.html">Prosseguir</a>';
    echo '</body>';
    echo '</html>';    
    
  } catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
     
  } catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
  }

  ?>

</body>

</html>