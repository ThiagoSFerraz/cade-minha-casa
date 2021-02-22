<?php

require ('Connection.php');



    $imovel_id = $_POST['imovel_id'];
    $logradouro = $_POST['endereco'];
    $number = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    
    if(isset($logradouro) && isset($number) && isset($bairro) && isset($cep)){
   
    
    try {
      
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $stmt = $pdo->prepare('UPDATE IMOV_ABAN_SIN SET LOGRADOURO = :logradouro, NUMERO = :num, BAIRRO = :bairro, CEP = :cep WHERE ID_IMOVEL = :id_imovel');
      $stmt->execute(array(
        ':id_imovel'   => $imovel_id,
        ':logradouro' => $logradouro,
        ':num' => $number,
        ':bairro' => $bairro,
        ':cep' => $cep
      ));
    
      echo '
      <script>
          alert("Atualização realizada com sucesso!")
          location.href = "../frontend/pages/sinalizacao.php"
      </script>
  ';

    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
}else{
    echo '
    <script>
        alert("Atualização Não realizada!")
        location.href = "../frontend/pages/sinalizacao.php"
    </script> 
    ';
}