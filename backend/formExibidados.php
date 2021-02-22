<?php

require 'Connection.php';

$idImovel = $_GET['id'];

$consulta = $pdo->query("SELECT * FROM IMOV_ABAN_VER WHERE ID_IMOVEL = $idImovel");