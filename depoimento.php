<?php
if(isset($_POST["submit"]) && !empty($_POST["submit"])){
    
    $name = addslashes($_POST["name"]);
    $message = addslashes($_POST["message"]);

    $to = "contato@quizmed.com.br";
    $subject = "Novo depoimento do usuário registrado!!!";
    $body = "Nome ". $name. "\n".
            "Mensagem ". $message. "\n";
    $header = "From:serafim@softbuilder.com.br"."\r\n".
                 "X=Mailer:PHP/".phpversion();  
                
    if(mail($to,$subject,$body,$header)) {
        echo("Menssagem Enviada com sucesso");
        header("Refresh: 10;Location: http://softbuilder.com.br/site-quizmed/index.html/");

    }else{
        echo("O Email não pode ser enviado");
        header("Refresh: 10;Location: http://softbuilder.com.br/site-quizmed/index.html#depoimentos");
    }          

};



?>