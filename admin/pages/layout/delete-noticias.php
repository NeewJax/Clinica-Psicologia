<?php
include('../../protect.php');
include('../../../db/conexao.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM noticias WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
    header("Location: noticias.php?msg=Notícia deletada com sucesso!");
    } else {
    echo "Failed: " . mysqli_error($conn);
    }
?>