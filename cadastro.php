<?php
include('db/conexao.php');

if (isset($_POST['enviar'])) {
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
    $endereco = $_POST['endereco'];
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
    $id_paciente = 1;

    try {
        //INSERIR CONTATO
        $stmt_id_contato = $mysqli->prepare("INSERT INTO tbl_contato (id, id_paciente, email, telefone) VALUES (NULL, ?, ?, ?)");
        $stmt_id_contato->bind_param("iss", $id_paciente, $email, $celular);
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
        $stmt_id_endereco = $mysqli->prepare("INSERT INTO tbl_endereco (id, id_paciente, id_bairro, id_logradouro, cep) VALUES (NULL, ?, ?, ?, ?)");
        $stmt_id_endereco->bind_param("iiis", $id_paciente, $id_bairro, $id_logradouro, $cep);
        $stmt_id_endereco->execute();
        $id_endereco = $mysqli->insert_id;
        $stmt_id_endereco->close();

        // INSERIR PACIENTE
        $stmt_id_paciente = $mysqli->prepare("INSERT INTO tbl_paciente (id, nome, nascimento, rg, cpf, id_genero, id_contato, id_escolaridade, id_profissao, id_renda_familiar, id_estado_civil, id_endereco) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_id_paciente->bind_param("ssiiiiiiiii", $nome, $nascimento, $rg, $cpf, $id_genero, $id_contato, $id_escolaridade, $id_profissao, $id_renda_familiar, $id_estado_civil, $id_endereco);
        $stmt_id_paciente->execute();
        $id_paciente = $mysqli->insert_id;
        $stmt_id_paciente->close();

        //ATUALIZAR TABELAS
        $stmt_update_contato = $mysqli->prepare("UPDATE tbl_contato SET id_paciente = ? WHERE id = ?");
        $stmt_update_contato->bind_param("ii", $id_paciente, $id_contato);
        $stmt_update_contato->execute();
        $stmt_update_contato->close();

        $stmt_update_contato = $mysqli->prepare("UPDATE tbl_endereco SET id_paciente = ? WHERE id = ?");
        $stmt_update_contato->bind_param("ii", $id_paciente, $id_endereco);
        $stmt_update_contato->execute();
        $stmt_update_contato->close();

        header('Location: cadastro-sucesso.php');

    }  catch(Exception $e) {
        echo "Error: " . $e;
    }
}
?>




<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>cadastro da clinica de Psicologia - cadastro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Template Stylesheet -->
    <!-- <link href="cadastro.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color:#4169E1;
            margin: 0;
            padding: 0;
        }

        .main-cadastro {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .center-tela {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .card-cadastro {
            background: #0a0a0a;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 10px 40px #1b1a1a;
            text-align: center;
            margin-top: -10px;
        }

        .card-cadastro>h1 {
            color: #fff;
            margin: 0;
            font-size: 24px;
        }

        .textfield {
            margin: 10px 0;
        }

        .textfield-1,
        .textfield-2 {
            flex: 1;
            max-width: calc(50% - 5px);
        }

        .textfield-1 {
            margin-bottom: 20px;
        }

        .textfield-2 {
            margin-top: 20px;
        }

        .textfield>input,
        .textfield-1>input,
        .textfield-2>input {
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #1b1a1a;
            padding: 10px;
            color: antiquewhite;
            font-size: 14px;
            box-shadow: #1b1a1a;
            box-sizing: border-box;
        }

        .textfield>select,
        .textfield-1>select,
        .textfield-2>select {
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #1b1a1a;
            padding: 10px;
            color: antiquewhite;
            font-size: 14px;
            box-shadow: #1b1a1a;
            box-sizing: border-box;
        }

        .textfield>label,
        .textfield-1>label,
        .textfield-2>label {
            color: antiquewhite;
            margin-bottom: 10px;
        }

        .btn-cadastro {
            width: 100%;
            background: #020c66;
            border-radius: 8px;
            border: none;
            margin-top: 25px;
            padding: 10px;
            outline: none;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 3px;
            cursor: pointer;
            box-shadow: 0px 10px 40px -12px #130b61;
            color: #ffffff;
        }

        .textfield-group-1,
        .textfield-group-2 {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .textfield-group-1 .textfield-1,
        .textfield-group-2 .textfield-2 {
            flex: 1;
            max-width: calc(50% - 5px);
        }

        .textfield-group-1 .textfield-1 {
            margin-bottom: 10px;
            max-width: calc(33.33% - 10px);
        }

        .textfield-group-2 .textfield-2 {
            margin-top: 10px;
            max-width: calc(33.33% - 10px);
        }

        .textfield-group-3 {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .textfield-group-3 .textfield-3 {
            flex: 1;
            max-width: calc(33.33% - 10px);
            /* Três elementos por linha com espaço entre eles */
            display: flex;
            flex-direction: column;
            /* Coloca a label acima do input */
        }

        .textfield-group-3 .textfield-3 label {
            color: antiquewhite;
            margin-bottom: 5px;
            /* Espaçamento entre a label e o input */
        }

        .textfield-group-3 .textfield-3 input select{
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #1b1a1a;
            padding: 10px;
            color: antiquewhite;
            font-size: 14px;
            box-shadow: #1b1a1a;
            box-sizing: border-box;
            margin-left: 5px;
        }

        .textfield-group-4 {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        /*  dois elementos juntos */
        .textfield-group-4 .textfield-4 {
            flex: 1;
            max-width: calc(50% - 10px);
            /* 10px de espaço entre os elementos */
            display: flex;
            flex-direction: column;
            /* Coloca a label acima do input */
        }

        .textfield-group-4 .textfield-4 label {
            color: antiquewhite;
            margin-bottom: 5px;
            /* Espaçamento entre a label e o input */
        }

        .textfield-group-4 .textfield-4 input select {
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #1b1a1a;
            padding: 10px;
            color: antiquewhite;
            font-size: 14px;
            box-shadow: #1b1a1a;
            box-sizing: border-box;
            margin-left: 5px;
        }

        .textfield-group-5 {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .textfield-group-5 .textfield-5 {
            flex: 1;
            max-width: calc(33.33% - 10px);
            /* Três elementos por linha com espaço entre eles */
            display: flex;
            flex-direction: column;
            /* Coloca a label acima do input */
        }

        .textfield-group-5 .textfield-5 label {
            color: antiquewhite;
            margin-bottom: 5px;
            /* Espaçamento entre a label e o input */
        }

        .textfield-group-5 .textfield-5 input {
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #1b1a1a;
            padding: 10px;
            color: antiquewhite;
            font-size: 14px;
            box-shadow: #1b1a1a;
            box-sizing: border-box;
            margin-left: 5px;
        }
        
        nav {
            background-color: #ffffff;
            color: black;
            padding: 10%;
            max-height: 50%;
        }

        #estacio {
            width: 50%;
            max-height: 90%;
            cursor: pointer;
        }

        .optionDisabled {
            color: red;
        }
        button {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php">
            <img id="estacio" src="img/logo-estacio.png" class="img-fluid" alt="Estácio de Sá">
        </a>
    </nav>

    </head>
    <div class="main-cadastro container-fluid">
        <div class="center-tela">
            <div class="card-cadastro">

                <h1>Cadastro</h1>
                <form method="post">

                        <div class="textfield">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" placeholder="Nome" required>
                        </div>

                        <div class="textfield-group-1">
                            <!-- <div class="textfield-1">
                                <label for="sexo">Sexo</label>
                                <input type="text" id="sexo" name="sexo" placeholder="Sexo" required>
                            </div> -->

                            <div class="textfield-1">
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
                            </div>

                            <div class="textfield-1">
                                <label for="idade">Idade</label>
                                <input type="number" id="idade" name="idade" placeholder="Idade" required>
                            </div>

                            <div class="textfield-1">
                                <label for="nascimento">Nascimento</label>
                                <input type="date" id="nascimento" name="nascimento" placeholder="Nascimento" required>
                            </div>
                        </div>


                        <div class="textfield-group-2">
                            <div class="textfield-2">
                                <label for="localidade">Localidade</label>
                                <input type="text" id="localidade" name="localidade" placeholder="Localidade" required>
                            </div>

                            <div class="textfield-2">
                                <label for="escolaridade">Escolaridade</label>
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
                            </div>

                            <div class="textfield-2">
                                <label for="profissão">Profissão</label>
                                <input type="text" id="profissao" name="profissao" placeholder="Profissão" required>
                            </div>
                        </div>


                        <div class="textfield-group-3">
                            <div class="textfield-2">
                                <label for="renda familiar">Renda Familiar</label>
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
                            </div>

                            <div class="textfield-2">
                                <label for="rg/orgão expedidor">RG Orgão Expedidor</label>
                                <input type="number" id="rg" name="rg" placeholder="RG ORGÃO EXPEDIDOR" required>
                            </div>

                            <div class="textfield-2">
                                <label for="cpf">CPF</label>
                                <input type="number" id="cpf" name="cpf" placeholder="CPF" required>
                            </div>
                        </div>


                        <Div class="textfield">
                            <Label for="composição familiar">Composição Familiar</Label>
                            <input type="text" id="composicao_familiar" name="composicao_familiar" placeholder="Composição familiar" required>
                        </Div>


                        <div class="textfield-group-4">
                            <!-- <div class="textfield-4">
                                <Label for="estado civil">Estado Civil</Label>
                                <input type="text" id="estado_civil" name="estado_civil" placeholder="Estado civil" required>
                            </div> -->

                            <div class="textfield-2">
                                <label for="Estado Civil">Estado Civil:</label>
                                <select id="estado_civil" name="estado_civil">
                                    <option value='' disabled selected>Estado Civil</option>
                                    <?php
                                        //$sql = "SELECT * FROM filiais WHERE id_aprovacao = 2";
                                        $sql_estado_civil = "SELECT * FROM tbl_estado_civil";
                                        $result_estado_civil = mysqli_query($mysqli, $sql_estado_civil);
                                        while ($row = mysqli_fetch_assoc($result_estado_civil)) {
                                    ?>
                                            <option value='<?php echo $row['id'] ?>'> <?php echo $row['estado_civil'] ?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="textfield-2">
                                <Label for=" mora com quem?">Mora Com Quem?</Label>
                                <input type="text" id="mora_com" name="mora_com" placeholder="Mora Com Quem?" required>
                            </div>
                        </div>


                        <Div class="textfield">
                            <Label for="endereço">Endereço</Label>
                            <input type="text" id="endereco" name="endereco" placeholder="Endereço" required>
                        </Div>


                        <div class="textfield-group-5">
                            <div class="textfield-5">
                                <label for="bairro">Bairro</label>
                                <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
                            </div>

                            <div class="textfield-5">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
                            </div>

                            <div class="textfield-5">
                                <label for="cep">CEP</label>
                                <input type="text" id="cep" name="cep" placeholder="CEP" required>
                            </div>
                        </div>

                        
                        <div class="textfield-group-5">
                            <div class="textfield-5">
                                <label for="tel(residencial)">Tel(Residencial)</label>
                                <input type="tel" id="telefone_residencial" name="telefone_residencial" placeholder="Tel(Residencial)" required>
                            </div>

                            <div class="textfield-5">
                                <label for="tel(recado)">Tel(Recado)</label>
                                <input type="tel" id="telefone_recado" name="telefone_recado" placeholder="Tel(Residencial)" required>
                            </div>

                            <div class="textfield-5">
                                <label for="celular">celular</label>
                                <input type="tel" id="celular" name="celular" placeholder="celular" required>
                            </div>
                        </div>


                        <Div class="textfield">
                            <Label for="email">Email</Label>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                        </Div>

                        <button type="button" id="btnCadastro" onclick="cadastrar()" class="btn-cadastro">Cadastrar</button>


                        <button type="submit" id="btnEnviar" style="display:none" name="enviar"></button>
                    
                </form>
                <a href="index.php"><button class="btn-cadastro">Voltar</button></a>
                <a href='cadastro-sucesso.php' style='display:none' id='cadastro-com-sucesso'></a>
            </div>
        </div>
    </div>
    <div>
    </div>

    <script>
        var btnCadastro = document.getElementById('btnCadastro');
        var btnEnviar = document.getElementById('btnEnviar');
        var btnCdtSucesso = document.getElementById('cadastro-com-sucesso');

        // var nome = document.getElementById('nome');
        // var sexo = document.getElementById('sexo');
        // var idade = document.getElementById('idade');
        // var nascimento = document.getElementById('nascimento');
        // var localidade = document.getElementById('localidade');

        // var escolaridade = document.getElementById('escolaridade');
        // var profissao = document.getElementById('profissao');
        // var renda_familiar = document.getElementById('renda_familiar');
        // var rg = document.getElementById('rg');
        // var cpf = document.getElementById('cpf');

        // var composicao_familiar = document.getElementById('composicao_familiar');
        // var estado_civil = document.getElementById('estado_civil');
        // var mora_com = document.getElementById('mora_com');
        // var endereco = document.getElementById('endereco');
        // var bairro = document.getElementById('bairro');

        // var cidade = document.getElementById('cidade');
        // var cep = document.getElementById('cep');
        // var telefone_residencial = document.getElementById('telefone_residencial');
        // var telefone_recado = document.getElementById('telefone_recado');
        // var celular = document.getElementById('celular');
        // var email = document.getElementById('email');

        function cadastrar() {
            btnEnviar.click();
        }

        // function validarCamposDoCadastro() {

        //     btnEnviar.click();
        // }
    </script>
</body>

</html>