<?php
    include('../../admin/protect.php');
    include('../../db/conexao.php');
    
    $id = $_GET["id"];

    try {

        // PEGAR DADOS DA TBL_PACIENTE
        $sql_paciente_data = "SELECT p.id_contato, p.id_endereco, p.id_profissao FROM tbl_paciente p WHERE id = ?";
        $stmt_paciente_data = $mysqli->prepare($sql_paciente_data);
        $stmt_paciente_data->bind_param("i", $id);
        $stmt_paciente_data->execute();
        $stmt_paciente_data_result = $stmt_paciente_data->get_result();
        $paciente_data = $stmt_paciente_data_result->fetch_assoc();

        $id_contato = $paciente_data["id_contato"];
        $id_endereco = $paciente_data["id_endereco"];
        $id_profissao = $paciente_data["id_profissao"];

        $stmt_paciente_data->close();

        // PEGAR DADOS DA TBL_ENDERECO
        $sql_endereco_data = "SELECT e.id_bairro, e.id_logradouro FROM tbl_endereco e WHERE id = ?";
        $stmt_endereco_data = $mysqli->prepare($sql_endereco_data);
        $stmt_endereco_data->bind_param("i", $id_endereco);
        $stmt_endereco_data->execute();
        $stmt_endereco_data_result = $stmt_endereco_data->get_result();
        $endereco_data = $stmt_endereco_data_result->fetch_assoc();

        $id_bairro = $endereco_data["id_bairro"];
        $id_logradouro = $endereco_data["id_logradouro"];

        $stmt_endereco_data->close();

        // DELETAR PACIENTE
        $sql_delete_paciente = "DELETE FROM tbl_paciente WHERE id = ?";
        $stmt_paciente = $mysqli->prepare($sql_delete_paciente);
        $stmt_paciente->bind_param("i", $id);
        $stmt_paciente->execute();
        $stmt_paciente->close();

        // DELETAR PROFISSAO
        $sql_delete_profissao = "DELETE FROM tbl_profissao WHERE id = ?";
        $stmt_profissao = $mysqli->prepare($sql_delete_profissao);
        $stmt_profissao->bind_param("i", $id_profissao);
        $stmt_profissao->execute();
        $stmt_profissao->close();

        // DELETAR CONTATO
        $sql_delete_contato = "DELETE FROM tbl_contato WHERE id = ?";
        $stmt_contato = $mysqli->prepare($sql_delete_contato);
        $stmt_contato->bind_param("i", $id_contato);
        $stmt_contato->execute();
        $stmt_contato->close();

        // DELETAR ENDERECO
        $sql_delete_endereco = "DELETE FROM tbl_endereco WHERE id = ?";
        $stmt_endereco = $mysqli->prepare($sql_delete_endereco);
        $stmt_endereco->bind_param("i", $id_endereco);
        $stmt_endereco->execute();
        $stmt_endereco->close();

        // DELETAR BAIRRO
        $sql_delete_bairro = "DELETE FROM tbl_bairro WHERE id = ?";
        $stmt_bairro = $mysqli->prepare($sql_delete_bairro);
        $stmt_bairro->bind_param("i", $id_bairro);
        $stmt_bairro->execute();
        $stmt_bairro->close();

        // DELETAR LOGRADOURO
        $sql_delete_logradouro = "DELETE FROM tbl_logradouro WHERE id = ?";
        $stmt_logradouro = $mysqli->prepare($sql_delete_logradouro);
        $stmt_logradouro->bind_param("i", $id_logradouro);
        $stmt_logradouro->execute();
        $stmt_logradouro->close();

        header("Location: ../pacientes.php?msg=Paciente deletado com sucesso!");

    } catch(Exception $e) {
        echo "Error " . $e;
    }
?>