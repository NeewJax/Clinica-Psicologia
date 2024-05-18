<?php
    $host = 'bancodowill.mysql.dbaas.com.br';
    $usuario = 'bancodowill';
    $senha = 'MyDataBase@2';
    $database = 'bancodowill';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if ($mysqli->error) {
        die("Falha ao conectar no banco de dados: " . $mysqli->error);
    }

    date_default_timezone_set("America/Sao_Paulo");
?>