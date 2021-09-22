<?php

//checka variavel
if(isset($_POST(['mensagem'])) && !empty($_POST(['mensagem']))){
    //variaveis
    $nome = addslashes($_POST(['nome']));
    $mensagem = addslashes($_POST(['mensagem']));
}

//
$to = "contato@quizmed.com.br";
$subject = "Novo depoimento do usuário registrado!!!";
$body = "'Nome: '.$nome.'\n'
        'Mensagem: '.$mensagem.'\n'";
$header ="From:quizmed@softbuilder.com.br";
        
if(mail($to,$subject,$body,$header)){
    echo("Obrigado, sua mensagem foi enviada com sucesso!");
}else{
    echo("sua mensagem não foi enviada,por favor tente novamente!");
}

?>