<?php

if(isset($_POST['id'])){
    include('../../protect.php');
    include('../../../db/conexao.php');
    $id = $_POST['id'];

    $id_aprovacao = 1;

    $sql_aprovacao = "UPDATE filiais SET id_aprovacao = '$id_aprovacao' WHERE id = $id";

    $result = mysqli_query($mysqli, $sql_aprovacao);

    header ('Location: afiliados.php');
} else {
    header ('Location: afiliados.php');
}

