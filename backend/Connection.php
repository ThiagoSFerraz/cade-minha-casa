<?php

try {

    $pdo = new PDO(
        "mysql:host=localhost; dbname=CADE_MINHA_CASA",
        "root",
        "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {

    echo "Erro: " . $e->getMessage();
}
