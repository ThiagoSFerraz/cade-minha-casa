<?php

require ('Connection.php');

$idUserLogado = $_SESSION['id'];

$consulta = $pdo->query("SELECT * FROM IMOV_ABAN_SIN WHERE ID_USUARIO = $idUserLogado");
