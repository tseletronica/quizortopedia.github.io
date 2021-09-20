<?php
if(isset($_POST["email"]) && !empty($_POST["email"])){
    
    $nome = addslashes($_POST["name"]);
    $menssagem = addslashes($_POST["mesage"]);

    $to = "contato@quizortopedia.com.br";
    $subject = "Novo depoimento do usuário registrado!!!";
    $body = "Nome ". $nome. "\n".
            "Mensagem ". $menssagem. "\n";
    $header = "From:serafim@softbuilder.com.br"."\r\n".
            "X=Mailer:PHP/".phpversion();  
                
    if(mail($to,$subject,$body,$header)) {
        echo("Email Enviado com sucesso");
        header("Refresh: 10;Location: http://softbuilder.com.br/site-quizmed/index.html/");

    }else{
        echo("O Email não pode ser enviado");
        header("Refresh: 10;Location: http://softbuilder.com.br/site-quizmed/index.html#depoimentos");
    }          

};



?>