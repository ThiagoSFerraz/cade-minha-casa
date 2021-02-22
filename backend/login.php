<?php

session_start();

require 'Connection.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

if (strlen($email) > 7 && strlen($senha) >= 4) {
    
    $criptoSenha = md5($senha);

    $consulta = $pdo->query("SELECT * FROM USUARIOS WHERE EMAIL = '$email' AND SENHA = '$criptoSenha'");

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        
        $_SESSION['id'] = $linha['ID_USUARIO'];
        $_SESSION['nome'] = $linha['NOME_COMPLETO'];
    }

    header("Location: http://localhost/cade-minha-casa/frontend/pages/avancos.php");

} else {
    
    echo '
        <script>
            alert("E-mail ou Senha inválidos!")
            location.href = "http://localhost/cade-minha-casa/frontend/pages/login.php"
        </script>
    ';
}