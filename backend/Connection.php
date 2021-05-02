<?php

try {

    $pdo = new PDO(
        "mysql:host=localhost; dbname=cade_minha_casa",
        "root",
        "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {

    echo "Erro: " . $e->getMessage();
}
