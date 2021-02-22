<?php



function CONTADOR($idImovel){
    require ('Connection.php');
$consultaAssinaturas = $pdo->query(" SELECT IMOV_ABAN_VER.ID_IMOVEL 
,COUNT(ABAIXO_ASSIN.ID_IMOVEL) AS Assinaturas 
FROM ABAIXO_ASSIN INNER JOIN IMOV_ABAN_VER 
ON ABAIXO_ASSIN.ID_IMOVEL = IMOV_ABAN_VER.ID_IMOVEL 
WHERE IMOV_ABAN_VER.ID_IMOVEL = $idImovel 
GROUP BY IMOV_ABAN_VER.ID_IMOVEL;    
");
$total = 0;
while ($linhaRegistros = $consultaAssinaturas->fetch(PDO::FETCH_ASSOC)){
    $total = $linhaRegistros['Assinaturas'];
}
return $total;
}