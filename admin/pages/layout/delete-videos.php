<?php
include('../../protect.php');
include('../../../db/conexao.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM videos WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
    header("Location: videos.php?msg=Vídeo deletado com sucesso!");
    } else {
    echo "Failed: " . mysqli_error($conn);
    }
?>