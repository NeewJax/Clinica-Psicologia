<?php
include('../../protect.php');
include('../../../db/conexao.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM tbl_professor WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
    header("Location: terapeutas.php?msg=Professor deletado com sucesso!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
?>