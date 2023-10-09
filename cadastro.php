<?php
include('db/conexao.php');

if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $nascimento = $_POST['nascimento'];
    $localidade = $_POST['localidade'];

    $escolaridade = $_POST['escolaridade'];
    $profissao = $_POST['profissao'];
    $renda_familiar = $_POST['renda_familiar'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];

    $estado_civil = $_POST['estado_civil'];
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

    $sql = $pdo->prepare("INSERT INTO tbl_cadastro VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql->execute(array(
        $nome, $sexo, $idade, $nascimento, $localidade,
        $escolaridade, $profissao, $renda_familiar, $rg, $cpf,
        $estado_civil, $composicao_familiar, $mora_com, $endereco, $bairro,
        $cidade, $cep, $telefone_residencial, $telefone_recado, $celular, $email
    ));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro de Clínica de Psicologia</title>
</head>

<body>
    <header>
        <div class="header-content">
            <h1 class="cabecalho">Clínica de Psicologia</h1>
            <a href=""></a>
        </div>
    </header>
    <div class="main-cadastro">
        <div class="center-tela">

            <form method="post">
                <div class="card-cadastro">
                    <h1>Cadastro</h1>

                    <div class="textfield">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" placeholder="Nome">
                    </div>

                    <div class="textfield-group-1">
                        <div class="textfield-1">
                            <label for="sexo">Sexo</label>
                            <input type="text" name="sexo" placeholder="Sexo">
                        </div>

                        <div class="textfield-1">
                            <label for="idade">Idade</label>
                            <input type="number" name="idade" placeholder="Idade">
                        </div>

                        <div class="textfield-1">
                            <label for="nascimento">Nascimento</label>
                            <input type="date" name="nascimento" placeholder="Nascimento">
                        </div>
                    </div>


                    <div class="textfield-group-2">
                        <div class="textfield-2">
                            <label for="localidade">Localidade</label>
                            <input type="text" name="localidade" placeholder="Localidade">
                        </div>

                        <div class="textfield-2">
                            <label for="escolaridade">Escolaridade</label>
                            <input type="text" name="escolaridade" placeholder="Escolaridade">
                        </div>

                        <div class="textfield-2">
                            <label for="profissão">Profissão</label>
                            <input type="text" name="profissao" placeholder="Profissão">
                        </div>
                    </div>


                    <div class="textfield-group-3">
                        <div class="textfield-3">
                            <label for="renda familiar">Renda Familiar</label>
                            <input type="number" name="renda_familiar" placeholder="Renda Familiar">
                        </div>

                        <div class="textfield-3">
                            <label for="rg/orgão expedidor">RG Orgão Expedidor</label>
                            <input type="number" name="rg" placeholder="RG ORGÃO EXPEDIDOR">
                        </div>

                        <div class="textfield-3">
                            <label for="cpf">CPF</label>
                            <input type="number" name="cpf" placeholder="CPF">
                        </div>
                    </div>

                    
                    <Div class="textfield">
                        <Label for="composição familiar">Composição Familiar</Label>
                        <input type="text" name="composicao_familiar" placeholder="Composicao familiar">
                    </Div>


                    <div class="textfield-group-4">
                        <div class="textfield-4">
                            <Label for="estado civil">Estado Civil</Label>
                            <input type="text" name="estado_civil" placeholder="Estado civil">
                        </div>

                        <div class="textfield-4">
                            <Label for=" mora com quem?">Mora Com Quem?</Label>
                            <input type="text" name="mora_com" placeholder="Mora Com Quem?">
                        </div>
                    </div>


                    <Div class="textfield">
                        <Label for="endereço">Endereço</Label>
                        <input type="text" name="endereco" placeholder="Endereço">
                    </Div>


                    <div class="textfield-group-5">
                        <div class="textfield-5">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" placeholder="Bairro">
                        </div>

                        <div class="textfield-5">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" placeholder="Cidade">
                        </div>

                        <div class="textfield-5">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" placeholder="CEP">
                        </div>
                    </div>


                    <div class="textfield-group-5">
                        <div class="textfield-5">
                            <label for="tel(residencial)">Tel(Residencial)</label>
                            <input type="tel" name="telefone_residencial" placeholder="Tel(Residencial)">
                        </div>

                        <div class="textfield-5">
                            <label for="tel(recado)">Tel(Recado)</label>
                            <input type="tel" name="telefone_recado" placeholder="Tel(Residencial)">
                        </div>

                        <div class="textfield-5">
                            <label for="celular">celular</label>
                            <input type="tel" name="celular" placeholder="celular">
                        </div>
                    </div>


                    <Div class="textfield">
                        <Label for="email">Email</Label>
                        <input type="email" name="email" placeholder="Email">
                    </Div>


                    <button type="submit" class="btn-cadastro" name="enviar">Cadastrar</button>
                </div>
            </form>

        </div>
    </div>
    <div>
        <script src="tela.js"></script>
    </div>
</body>

</html>