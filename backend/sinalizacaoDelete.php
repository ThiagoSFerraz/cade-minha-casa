<?php

require 'Connection.php';

$id = $_POST['idImovel'];

$consulta = $pdo->query(" SELECT * FROM SIT_IMOV_SIN WHERE ID_IMOVEL =  $id;");

    while ($pega = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $idSit = $pega['ID_SIT'];
    }

try {
     
    $stmtb = $pdo->prepare('DELETE FROM SIT_IMOV_SIN WHERE ID_SIT = :id');
    $stmtb->bindParam(':id', $idSit);
    $stmtb->execute();
    
  
    $stmt = $pdo->prepare('DELETE FROM IMOV_ABAN_SIN WHERE ID_IMOVEL = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    
  
    echo '
    <script>
        alert("Imóvel excluído com sucesso!")
        location.href = "../frontend/pages/sinalizacao.php"
    </script>
';

} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}