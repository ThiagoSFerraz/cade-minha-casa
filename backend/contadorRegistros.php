<?php

$idUserLogado = $_SESSION['id'];

require ('Connection.php');

$consultaRegistros = $pdo->query(" SELECT USUARIOS.ID_USUARIO
    ,COUNT(IMOV_ABAN_SIN.ID_USUARIO) AS Registros
    FROM IMOV_ABAN_SIN 
    INNER JOIN USUARIOS 
    ON IMOV_ABAN_SIN.ID_USUARIO = USUARIOS.ID_USUARIO
    WHERE USUARIOS.ID_USUARIO = $idUserLogado
    GROUP BY USUARIOS.ID_USUARIO;    
");