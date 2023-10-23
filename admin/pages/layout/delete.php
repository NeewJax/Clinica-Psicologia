<?php
include('../../protect.php');
include('../../../db/conexao.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM filiais WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
    header("Location: afiliados.php?msg=Dados deletados com sucesso!");
    } else {
    echo "Failed: " . mysqli_error($conn);
    }
?>