<?php


session_start();

if (!isset($_SESSION['id'])) {
    header("Location: http://localhost/cade-minha-casa/frontend/pages/login.php");
} else {
    require 'Connection.php';
}

$cep = $_POST["cep"];
$rua = $_POST["rua"];
$bairro = $_POST["bairro"];
$num = $_POST["numero"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$id_user = $_SESSION['id'];
$complemento;

$iluminacao = $_POST["iluminacao"];
$calcada = $_POST["calcada"];
$seguranca = $_POST["seguranca"];
$sinTexto = $_POST["sinTexto"];


if (strlen($rua) >= 3 && strlen($bairro) >= 3 && strlen($cep) > 3 && strlen($num) >= 1) {

    $sql = "INSERT INTO IMOV_ABAN_SIN (ID_USUARIO, LOGRADOURO, NUMERO, COMPLEMENTO, BAIRRO, CEP) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_user, $rua, $num, $complemento, $bairro, $cep]);

    $last_id = $pdo->lastInsertId();

    $sql = "INSERT INTO SIT_IMOV_SIN (ID_IMOVEL, ID_USUARIO, SEG_PUBLICA, ILUMINACAO, SIT_CALCADA, COND_EXTRAS) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$last_id, $id_user, $seguranca, $iluminacao, $calcada, $sinTexto]);

    header("Location: http://localhost/cade-minha-casa/frontend/pages/avancos.php");
} else {
    echo '
    <script>
        alert("Campos obrigatórios não foram preenchidos")
        location.href = "../frontend/pages/cadastro_sinalizacao"
    </script>
';
}
