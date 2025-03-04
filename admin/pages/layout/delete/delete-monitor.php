<?php
include('../../../protect.php');
include('../../../../db/conexao.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM tbl_monitor WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
    header("Location: ../monitor.php?msg=Monitor deletado com sucesso!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
?>