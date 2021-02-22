<?php

require 'Connection.php';

$nomelUsuario = $_POST['nome'];
$emailUsuario = $_POST['email'];
$senhaUsuario = $_POST['senha'];
$confSenhaUsuario = $_POST['conf_senha'];



if (strlen($nomelUsuario) > 3 && strlen($emailUsuario) > 3 && strlen($senhaUsuario) > 3 && $senhaUsuario == $confSenhaUsuario) {

    $consulta = $pdo->query("SELECT * FROM USUARIOS WHERE EMAIL = '$emailUsuario'");

    $resultado = $consulta->fetchAll();

    if (count($resultado) > 0) {
        echo '
        <script>
            alert("E-mail já cadastrado!")
            location.href = "../frontend/pages/cadastro.php"
        </script>
    ';
    } else {

        $criptoSenha = md5($senhaUsuario);

        $sql = "INSERT INTO USUARIOS (NOME_COMPLETO, EMAIL, SENHA) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nomelUsuario, $emailUsuario, $criptoSenha]);


        header("Location: http://localhost/cade-minha-casa/frontend/pages/login.php");
    }
} else if (strlen($nomelUsuario) <= 3) {
    echo '
        <script>
            alert("Nome de usuário inválido!")
            location.href = "../frontend/pages/cadastro.php"
        </script>
    ';
} else if (strlen($emailUsuario) <= 3) {
    echo '
        <script>
            alert("Email de usuário inválido!")
            location.href = "../frontend/pages/cadastro.php"
        </script>
    ';
} else if (strlen($senhaUsuario) <= 3) {
    echo '
        <script>
            alert("Senha muito curta!")
            location.href = "../frontend/pages/cadastro.php"
        </script>
    ';
} else if ($senhaUsuario = !$confSenhaUsuario) {
    echo '
        <script>
            alert("A confirmação de senha está errada!")
            location.href = "../frontend/pages/cadastro.php"
        </script>
    ';
}
