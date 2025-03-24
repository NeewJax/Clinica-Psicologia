<?php
    include('../../../db/conexao.php');
    include('../../../admin/protect.php');
?>

<?php

$id = $_GET['id'] ?? NULL;

try {
    $id_terapeuta = NULL;
    $id_paciente = NULL;
    $id_status = 2;

    $sala = "---";

    $stmt_sala_reservada = $mysqli->prepare("UPDATE tbl_sala_reservada 
                                            SET id_status = ?, 
                                            id_terapeuta = ?, 
                                            id_paciente = ?,
                                            sala = ? 
                                            WHERE id = ?");
    $stmt_sala_reservada->bind_param("iiisi",  
                                    $id_status, 
                                    $id_terapeuta, 
                                    $id_paciente,
                                    $sala,
                                    $id);

    $stmt_sala_reservada->execute();
    $stmt_sala_reservada->close();

    //echo "ID recebido: " . htmlspecialchars($id);
    header('Location: mudar-cor.php');
} catch(Exception $e) {
    echo "Error " . $e;
}

?>