<?php

require 'Connection.php';

$nomeAss = $_POST['nome'];
$emailAss = $_POST['email'];
$cpfAss = $_POST['CPF'];
$idImovel = $_POST['idImovel'];



if (strlen($nomeAss) > 3 && strlen($emailAss) > 3 && strlen($cpfAss) >= 11) {

    $consulta = $pdo->query("SELECT * FROM ABAIXO_ASSIN WHERE CPF = '$cpfAss' AND ID_IMOVEL = '$idImovel'");

    $resultado = $consulta->fetchAll();

    if (count($resultado) > 0) {
        echo '
        <script>
            alert("CPF já Assinou!")
            location.href = "../frontend/pages/assinado.php"
        </script>
    ';
    } else {

        
        $sql = "INSERT INTO ABAIXO_ASSIN (ID_IMOVEL, NOME, EMAIL, CPF) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idImovel, $nomeAss, $emailAss, $cpfAss]);


        header("Location: http://localhost/cade-minha-casa/frontend/pages/assinado.php");
    }
} else if (strlen($nomeAss) <= 3) {
    echo '
        <script>
            alert("Nome inválido!")
            location.href = "../frontend/pages/assinado.php"
        </script>
    ';
} else if (strlen($emailAss) <= 3) {
    echo '
        <script>
            alert("Email inválido!")
            location.href = "../frontend/pages/assinado.php"
        </script>
    ';
} else if (strlen($cpfAss) <= 10) {
    echo '
        <script>
            alert("CPF formato incorreto!")
            location.href = "../frontend/pages/assinado.php"
        </script>
    ';
} 