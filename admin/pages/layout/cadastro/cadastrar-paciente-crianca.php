<?php
    include('../../../protect.php');
    include('../../../../db/conexao.php');
?>

<?php

  if (isset($_POST['enviar'])) {
    $nome_responsavel = $_POST['nome_responsavel'];
    $nome = $_POST['nome'];
    $id_genero = $_POST['sexo'];
    $idade = $_POST['idade'];
    $nascimento = $_POST['nascimento'];
    $localidade = $_POST['localidade'];

    $id_escolaridade = $_POST['escolaridade'];
    $profissao = $_POST['profissao'];
    $id_renda_familiar = $_POST['renda_familiar'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];

    $id_estado_civil = $_POST['estado_civil'];
    $composicao_familiar = $_POST['composicao_familiar'];
    $mora_com = $_POST['mora_com'];
    //$endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];

    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $telefone_residencial = $_POST['telefone_residencial'];
    $telefone_recado = $_POST['telefone_recado'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];

    $id_contato = 1;
    $id_profissao = 1;
    $id_endereco = 1;
    $id_maturidade = 2;

    try {
        //INSERIR CONTATO
        $stmt_id_contato = $mysqli->prepare("INSERT INTO tbl_contato (id, email, telefone) VALUES (NULL, ?, ?)");
        $stmt_id_contato->bind_param("ss", $email, $celular);
        $stmt_id_contato->execute();
        $id_contato = $mysqli->insert_id;
        $stmt_id_contato->close();

        //INSERT PROFISSAO
        $stmt_id_profissao = $mysqli->prepare("INSERT INTO tbl_profissao (id, profissao) VALUES (NULL, ?)");
        $stmt_id_profissao->bind_param("s", $profissao);
        $stmt_id_profissao->execute();
        $id_profissao = $mysqli->insert_id;
        $stmt_id_profissao->close();

        //INSERT BAIRRO
        $stmt_id_bairro = $mysqli->prepare("INSERT INTO tbl_bairro (id, bairro) VALUES (NULL, ?)");
        $stmt_id_bairro->bind_param("s", $bairro);
        $stmt_id_bairro->execute();
        $id_bairro = $mysqli->insert_id;
        $stmt_id_bairro->close();

        //INSERT LOGRADOURO
        $stmt_id_logradouro = $mysqli->prepare("INSERT INTO tbl_logradouro (id, logradouro) VALUES (NULL, ?)");
        $stmt_id_logradouro->bind_param("s", $localidade);
        $stmt_id_logradouro->execute();
        $id_logradouro = $mysqli->insert_id;
        $stmt_id_logradouro->close();

        //INSERT ENDEREÇO
        $stmt_id_endereco = $mysqli->prepare("INSERT INTO tbl_endereco (id, id_bairro, id_logradouro, cep) VALUES (NULL, ?, ?, ?)");
        $stmt_id_endereco->bind_param("iis", $id_bairro, $id_logradouro, $cep);
        $stmt_id_endereco->execute();
        $id_endereco = $mysqli->insert_id;
        $stmt_id_endereco->close();

        // INSERIR PACIENTE
        $stmt_id_paciente = $mysqli->prepare("INSERT INTO tbl_paciente (id, nome, nascimento, rg, cpf, id_genero, id_contato, id_escolaridade, id_profissao, id_renda_familiar, id_estado_civil, id_endereco, id_maturidade, nome_responsavel) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_id_paciente->bind_param("ssiiiiiiiiiis", $nome, $nascimento, $rg, $cpf, $id_genero, $id_contato, $id_escolaridade, $id_profissao, $id_renda_familiar, $id_estado_civil, $id_endereco, $id_maturidade, $nome_responsavel);
        $stmt_id_paciente->execute();
        $id_paciente = $mysqli->insert_id;
        $stmt_id_paciente->close();

        //ATUALIZAR TABELAS
        // $stmt_update_contato = $mysqli->prepare("UPDATE tbl_contato SET id_paciente = ? WHERE id = ?");
        // $stmt_update_contato->bind_param("ii", $id_paciente, $id_contato);
        // $stmt_update_contato->execute();
        // $stmt_update_contato->close();

        // $stmt_update_contato = $mysqli->prepare("UPDATE tbl_endereco SET id_paciente = ? WHERE id = ?");
        // $stmt_update_contato->bind_param("ii", $id_paciente, $id_endereco);
        // $stmt_update_contato->execute();
        // $stmt_update_contato->close();

        header('Location: cadastro-sucesso.php');

    }  catch(Exception $e) {
        echo "Error: " . $e;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../../img/favicon.png" type="image/x-icon">
    <title>CLÍNICA | ADMIN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 50%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }

        .btnCancelar {
            background-color: rgb(248, 49, 49);
        }

        .btnCancelar:hover {
            background-color: rgb(218, 41, 41);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Paciente - Criança</h2>
        <form method="post">

            <label>Nome do(a) Responsável:</label>
            <input type="text" id="nome_responsavel" name="nome_responsavel" placeholder="Nome do Responsável" required required>
           
            <label>Nome da Criança:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome da criança" required required>
            
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo">
                <option value='' disabled selected>Sexo</option>
                <?php
                    $sql_genero = "SELECT * FROM tbl_genero";
                    $result_genero = mysqli_query($mysqli, $sql_genero);
                    while ($row = mysqli_fetch_assoc($result_genero)) {
                ?>
                        <option value='<?php echo $row['id'] ?>'> <?php echo $row['sexo'] ?> </option>
                <?php
                    }
                ?>
            </select>
            
            <label>Idade:</label>
            <input  type="number" id="idade" name="idade" placeholder="Idade" required>
            
            <label>Nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" placeholder="Nascimento" required>
            
            <label>Localidade:</label>
            <input type="text" id="localidade" name="localidade" placeholder="Localidade" required>
            
            <label for="escolaridade">Escolaridade:</label>
            <select id="escolaridade" name="escolaridade">
                <option value='' disabled selected>Escolaridade</option>
                <?php
                    $sql_escolaridade = "SELECT * FROM tbl_escolaridade";
                    $result_escolaridade = mysqli_query($mysqli, $sql_escolaridade);
                    while ($row = mysqli_fetch_assoc($result_escolaridade)) {
                ?>
                        <option value='<?php echo $row['id'] ?>'> <?php echo $row['escolaridade'] ?> </option>
                <?php
                    }
                ?>
            </select>
            
            <label>Profissão do(a) Responsável:</label>
            <input type="text" id="profissao" name="profissao" placeholder="Profissão" required>
            
            <label>Renda Familiar:</label>
            <select id="renda_familiar" name="renda_familiar">
                    <option value='' disabled selected>Renda Familiar</option>
                    <?php
                        $sql_renda_familiar = "SELECT * FROM tbl_renda_familiar";
                        $result_renda_familiar = mysqli_query($mysqli, $sql_renda_familiar);
                        while($row = mysqli_fetch_assoc($result_renda_familiar)) {
                    ?>
                            <option value='<?php echo $row['id']?>'> <?php echo $row['renda'] ?> </option>
                    <?php
                        }
                    ?>
            </select>
            
            <label>RG:</label>
            <input type="number" id="rg" name="rg" placeholder="RG ORGÃO EXPEDIDOR" required>
            
            <label>CPF:</label>
            <input type="number" id="cpf" name="cpf" placeholder="CPF" required>
            
            <label>Composição Familiar:</label>
            <input type="text" id="composicao_familiar" name="composicao_familiar" placeholder="Composição familiar" required>
            
            <label>Estado Civil do(a) Responsável:</label>
            <select id="estado_civil" name="estado_civil">
                <option value='' disabled selected>Estado Civil</option>
                <?php
                    $sql_estado_civil = "SELECT * FROM tbl_estado_civil";
                    $result_estado_civil = mysqli_query($mysqli, $sql_estado_civil);
                    while ($row = mysqli_fetch_assoc($result_estado_civil)) {
                ?>
                        <option value='<?php echo $row['id'] ?>'> <?php echo $row['estado_civil'] ?> </option>
                <?php
                    }
                ?>
            </select>
            
            <label>Mora com quem?</label>
            <input type="text" id="mora_com" name="mora_com" placeholder="Mora Com Quem?" required>
            
            <label>Bairro:</label>
            <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
            
            <label>Cidade:</label>
            <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
            
            <label>CEP:</label>
            <input type="text" id="cep" name="cep" placeholder="CEP" required>
            
            <label>Tel (Residencial):</label>
            <input type="tel" id="telefone_residencial" name="telefone_residencial" placeholder="Tel(Residencial)" required>
            
            <label>Tel (Recado):</label>
            <input type="tel" id="telefone_recado" name="telefone_recado" placeholder="Tel(Residencial)" required>
            
            <label>Celular do(a) Responsável:</label>
            <input type="tel" id="celular" name="celular" placeholder="celular" required>
            
            <label>Email do(a) Responsável:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            
            <button type="submit" name="enviar">Enviar</button> <br>
        </form>
        <a href="../../../index.php"><button class="btnCancelar">Cancelar</button></a>
    </div>
</body>
</html>
