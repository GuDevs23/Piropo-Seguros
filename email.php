<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome     = htmlspecialchars($_POST['nome']);
    $email    = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $assunto  = htmlspecialchars($_POST['assunto']);
    $mensagem = nl2br(htmlspecialchars($_POST['mensagem']));

    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

    $corpo = "
    <html>
        <body>
            <p><b>Nome:</b> $nome</p>
            <p><b>E-mail do visitante:</b> $email</p>
            <p><b>Telefone:</b> $telefone</p>
            <p><b>Assunto:</b> $assunto</p>
            <p><b>Mensagem:</b><br>$mensagem</p>
            <hr>
            <p>Enviado em: $data_envio às $hora_envio</p>
        </body>
    </html>
    ";

    $destino = "contato@piroposeguros.com.br";
    $titulo  = "Contato - $assunto";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Piropo Seguros <contato@piroposeguros.com.br>\r\n";
    $headers .= "Reply-To: contato@piroposeguros.com.br\r\n";
    $headers .= "Return-Path: contato@piroposeguros.com.br\r\n";

    if (mail($destino, $titulo, $corpo, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!');</script>";
        echo "<meta http-equiv='refresh' content='2;URL=https://piroposeguros.com.br'>";
    } else {
        echo "Erro ao enviar o e-mail.";
    }
}
?>
