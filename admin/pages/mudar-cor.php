<?php
include('../../db/conexao.php');
?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1;
}

if (isset($_POST['salvar'])) {
    $id_terapeuta = $_POST['id_terapeuta'];
    $id_paciente = $_POST['id_paciente'];
    $id_status = $_POST['id_status'];

    //echo "<script>alert('". $id_terapeuta ."')</script>";
    //PEGAR O NOME DO TERAPEUTA
    $stmt_terapeuta = $mysqli->prepare("SELECT nome FROM tbl_user_terapeuta WHERE id = ?");
    $stmt_terapeuta->bind_param("i",  $id_terapeuta);
    $stmt_terapeuta->execute();

    $result_terapeuta = $stmt_terapeuta->get_result();
    $terapeuta = $result_terapeuta->fetch_assoc();
    $nome_terapeuta = $terapeuta['nome'] ?? "";
    $stmt_terapeuta->close();
    

    //PEGAR O NOME DO PACIENTE
    $stmt_paciente = $mysqli->prepare("SELECT nome FROM tbl_paciente WHERE id = ?");
    $stmt_paciente->bind_param("i", $id_paciente);
    $stmt_paciente->execute();

    $result_paciente = $stmt_paciente->get_result();
    $paciente = $result_paciente->fetch_assoc();
    $nome_paciente = $paciente['nome'] ?? "";
    $stmt_paciente->close();

    $sala =  $nome_terapeuta . " - " . $nome_paciente;

    //ATUALIZAR SALA
    $id_terapeuta_bind = $id_terapeuta != null ? $id_terapeuta : null;
    $id_paciente_bind = $id_paciente != null ? $id_paciente : null;

    $stmt_sala_reservada = $mysqli->prepare("UPDATE tbl_sala_reservada 
                                            SET id_status = ?, 
                                            id_terapeuta = ?, 
                                            id_paciente = ?,
                                            sala = ? 
                                            WHERE id = ?");
    $stmt_sala_reservada->bind_param("iiisi",  
                                    $id_status, 
                                    $id_terapeuta_bind, 
                                    $id_paciente_bind,
                                    $sala,
                                    $id);

    $stmt_sala_reservada->execute();
    $stmt_sala_reservada->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon">
    <title>Mudar Cor</title>
    <style>
        body {
            background-color: rgb(185, 232, 232);
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            margin-top: 10%;
        }

        input {
            width: 100%;
            margin-top: 5%;
            text-align: center;
        }

        select {
            width: 80%;
            padding: .6%;
            text-align: center;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 10px;
            margin-bottom: 10%;
        }

        select option {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .div-button {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button {
            margin-top: 8%;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            width: 80%;
            border: none;
            border-radius: 10px;
            font-size: bold;
            font-weight: bold;
            background-color:rgb(0, 109, 148);
            color: white;
            transition: .5s;
        }

        button:hover {
            background-color: rgb(0, 65, 89);
            color: rgb(201, 200, 200);
        }

        .fechar {
            background-color: rgb(238, 41, 41);
        }

        .fechar:hover {
            color: rgb(201, 200, 200);
            background-color: rgb(179, 30, 30);
        }

        .reservada {
            background-color: yellow;
        }

        .reservada:hover {
            background-color: rgb(152, 152, 0);
        }

        .livre {
            background-color: white;
        }

        .livre:hover {
            background-color: rgb(148, 147, 147);
        }


        .encaixe {
            background-color: rgb(198, 89, 17);
        }

        .encaixe:hover {
            background-color: rgb(103, 47, 9);
        }


        .triagem {
            background-color: rgb(0, 176, 240);
        }

        .triagem:hover {
            background-color: rgb(0, 109, 148);
        }

        .mudar_cor {
            background-color: lightgray;
        }
        .divSala {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            color:black;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <form action="" method="post">

            <?php
                $sql_sala_status_name_sala = "SELECT id, sala, id_status FROM tbl_sala_reservada WHERE id = $id";
                $stmt_sala_status_name_sala = $mysqli->prepare($sql_sala_status_name_sala);
                $stmt_sala_status_name_sala->execute();

                $stmt_sala_status_name_sala_result = $stmt_sala_status_name_sala->get_result();
                $sala_status = $stmt_sala_status_name_sala_result->fetch_assoc();
                $name_sala = $sala_status['sala'];
                $sala_id = $sala_status['id_status'];
            ?>

            <div class="divSala">
                <h3><?php echo $name_sala ?></h3>
            </div> <br><br>
        

            <select name="id_status">
                <option class="mudar_cor" value="<?php echo $sala_id ?>" selected>Mudar Cor</option>
                <?php
                    $sql_sala_status = "SELECT s.id, s.status FROM tbl_status_sala s";
                    $stmt_sala_status = $mysqli->prepare($sql_sala_status);
                    $stmt_sala_status->execute();
                    $stmt_sala_status_result = $stmt_sala_status->get_result();

                    //$result_status = mysqli_query($mysqli, $sql_status);
                    while ($sala_status_row = $stmt_sala_status_result->fetch_assoc()) {
                ?>
                        <option value='<?php echo $sala_status_row['id'] ?>' class='<?php echo $sala_status_row['status'] ?>'> 
                            <?php echo $sala_status_row['status'] ?> 
                        </option>
                <?php
                    }
                ?>
            </select>

            <select name="id_terapeuta">
                <?php
                    $sql_terapeuta_fixo = "SELECT t.id, t.nome FROM tbl_user_terapeuta t INNER JOIN tbl_sala_reservada s ON s.id_terapeuta = t.id WHERE s.id = $id;";
                    // $stmt_terapeuta_fixo = $mysqli->prepare($sql_terapeuta_fixo);
                    // $stmt_terapeuta_fixo->execute();
                    // $stmt_terapeuta_fixo_result = $stmt_terapeuta_fixo_result->get_result();
                    // $terapeuta_fixo = $stmt_terapeuta_fixo_result->fetch_assoc();
                    // $id_nome_terapeuta_fixo = $terapeuta_fixo['id'] ?? "";
                    // $nome_terapeuta_fixo = $terapeuta_fixo['nome'] ?? "";


                    $result_terapeuta_fixo = mysqli_query($mysqli, $sql_terapeuta_fixo);
                    $row_terapeuta_fixo = mysqli_fetch_assoc($result_terapeuta_fixo);

                    $nome_terapeuta_fixo = $row_terapeuta_fixo['nome'];
                    $id_terapeuta_fixo = 0;

                    if(!$row_terapeuta_fixo['nome'] == NULL) {
                        $id_terapeuta_fixo = $row_terapeuta_fixo['id'];
                        echo '<option value="' . $id_terapeuta_fixo . '" select> '. $nome_terapeuta_fixo .' </option>';
                    } else if($name_sala == '---') {
                        echo '<option value="' . NULL . '" select> </option>';
                    }
                ?>
                    
                <?php
                    $sql_terapeuta = "SELECT t.id, t.nome FROM tbl_user_terapeuta t WHERE t.id != $id_terapeuta_fixo ORDER BY t.nome";
                    $result_terapeuta = mysqli_query($mysqli, $sql_terapeuta);
                    while ($row_terapeuta = mysqli_fetch_assoc($result_terapeuta)) {
                ?>
                        <option value='<?php echo $row_terapeuta['id'] ?>' class='livre'> 
                            <?php echo $row_terapeuta['nome'] ?> 
                        </option>
                <?php
                    }
                ?>
            </select>

            <select name="id_paciente">
            <?php
                    $sql_paciente_fixo = "SELECT p.id, p.nome FROM tbl_paciente p INNER JOIN tbl_sala_reservada s ON s.id_paciente = p.id WHERE s.id = $id;";
                    $result_paciente_fixo = mysqli_query($mysqli, $sql_paciente_fixo);
                    $row_paciente_fixo = mysqli_fetch_assoc($result_paciente_fixo);

                    $nome_paciente_fixo = $row_paciente_fixo['nome'];
                    $id_paciente_fixo = 0;

                    if(!$row_paciente_fixo['nome'] == NULL) {
                        $id_paciente_fixo = $row_paciente_fixo['id'];
                        echo '<option value="' . $id_paciente_fixo . '" select> '. $nome_paciente_fixo .' </option>';
                    } else if($name_sala == '---') {
                        echo '<option value="' . NULL . '" select> </option>';
                    }
                ?>

                <?php
                    $sql_paciente = "SELECT p.id, p.nome FROM tbl_paciente p WHERE p.id != $id_paciente_fixo  ORDER BY p.nome";
                    $result_paciente = mysqli_query($mysqli, $sql_paciente);
                    while ($row_paciente = mysqli_fetch_assoc($result_paciente)) {
                ?>
                        <option value='<?php echo $row_paciente['id'] ?>' class='livre'> 
                            <?php echo $row_paciente['nome'] ?> 
                        </option>
                <?php
                    }
                ?>
            </select>
            
            <div class='div-button'>
                <button type="submit" name="salvar" onclick="reloadWindow()">SALVAR</button>
                <button class="fechar" onclick="closePopup()">FECHAR</button>
            </div>
        </form>
    </div>
    <script>
        function reloadWindow() {
            if(window.opener) {
                window.opener.location.reload();
            }
        }

        function closePopup() {
            if(window.opener) {
                window.close();
            }
        }
    </script>
</body>
</html>