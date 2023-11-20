<?php
include('../../protect.php');
include('../../../db/conexao.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM tbl_cadastro WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
    header("Location: pacientes.php?msg=Paciente deletado com sucesso!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
?>