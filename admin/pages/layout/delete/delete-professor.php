<?php
    include('../../../protect.php');
    include('../../../../db/conexao.php');

    $id = $_GET["id"];

    try {

        $sql_terapeuta_data = "SELECT id FROM tbl_user_terapeuta WHERE id_professor = ?";
        $stmt_terapeuta_data = $mysqli->prepare($sql_terapeuta_data);
        $stmt_terapeuta_data->bind_param("i", $id);
        $stmt_terapeuta_data->execute();
        $stmt_terapeuta_data_result = $stmt_terapeuta_data->get_result();
        $terapeuta_data = $stmt_terapeuta_data_result->fetch_assoc();
        $stmt_terapeuta_data_result->close();

        if($terapeuta_data) {

            header("Location: ../professores.php?msg=Erro: Professor está vinculado a um estagiário e não pode ser excluído.");
            exit;
        }

        $sql = "DELETE FROM tbl_professor WHERE id = $id";
        $result = mysqli_query($mysqli, $sql);

        if ($result) {
        header("Location: ../professores.php?msg=Professor deletado com sucesso!");
        } else {
            echo "Failed: " . mysqli_error($mysqli);
        }
        

    } catch(Exception $e) {
        echo "Error " . $e->getMessage();
    }
?>