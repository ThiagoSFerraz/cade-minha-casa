<?php

function SEGURANCA($idImovel)
{
    require('Connection.php');
    $consultaSeguranca = $pdo->query(" SELECT * FROM SIT_IMOV_SIN WHERE ID_IMOVEL =  $idImovel;");

    while ($seg = $consultaSeguranca->fetch(PDO::FETCH_ASSOC)) {
        $dadoA = $seg['SEG_PUBLICA'];
        $dadoB = $seg['ILUMINACAO'];
        $dadoC = $seg['SIT_CALCADA'];
        $texto = $seg['COND_EXTRAS'];
    }
    if ($dadoA == 0 && $dadoB == 0 && $dadoC == 0) {
        $sit = "<b>Péssima</b>";
    } elseif ($dadoA == 0 || $dadoB == 0 || $dadoC == 0) {
        $sit = "<b>Regular</b>";
    } else {
        $sit = "<b>Bem avaliada</b>";
    }
    if (isset($texto)) {
        $coment = $texto;
    } else {
        $coment = "";
    }
    $result = $sit . ".<br />Seu Comentário:<br />" . $coment;
    return $result;
}
