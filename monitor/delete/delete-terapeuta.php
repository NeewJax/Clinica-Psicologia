<?php
    include('../../admin/protect.php');
    include('../../db/conexao.php');
    
    $id = $_GET["id"];
    $sql = "DELETE FROM tbl_user_terapeuta WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
    header("Location: ../terapeutas.php?msg=Estagiário deletado com sucesso!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
?>