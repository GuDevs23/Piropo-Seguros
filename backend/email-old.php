<?php
$nome = $_POST['nome'];

$email = $_POST['email'];

$telefone = $_POST['telefone'];

$assunto = $_POST['assunto'];

$mensagem = $_POST['mensagem'];

$destino = "contatopiropoplanosdesaude@gmail.com";
$formulario = $assunto;

$corpo = "Nome:" . $nome . "\n" . "E-mail:" . $email . "\n" . "Telefone:" . $telefone . "\n";
$cabeca = "From: contatopiropoplanosdesaude@gmail.com" . "\n" . "Reply-To: " . $email . "\n" . "X-Mailer: PHP/" . phpversion();

if(mail($para, $formulario, $corpo, $cabeca)){
    echo "<meta http-equiv='refresh' content='10;URL=https://piroposplanosdesaude.com.br/contato.html'>";
} else {
    echo "Houve um erro ao enviar o e-mail!";
}
