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
                        <input type="text" id="nome" name="nome" placeholder="Nome">
                    </div>

                    <div class="textfield-group-1">
                        <div class="textfield-1">
                            <label for="sexo">Sexo</label>
                            <input type="text" id="sexo" name="sexo" placeholder="Sexo">
                        </div>

                        <div class="textfield-1">
                            <label for="idade">Idade</label>
                            <input type="number" id="idade" name="idade" placeholder="Idade">
                        </div>

                        <div class="textfield-1">
                            <label for="nascimento">Nascimento</label>
                            <input type="date" id="nascimento" name="nascimento" placeholder="Nascimento">
                        </div>
                    </div>


                    <div class="textfield-group-2">
                        <div class="textfield-2">
                            <label for="localidade">Localidade</label>
                            <input type="text" id="localidade" name="localidade" placeholder="Localidade">
                        </div>

                        <div class="textfield-2">
                            <label for="escolaridade">Escolaridade</label>
                            <input type="text" id="escolaridade" name="escolaridade" placeholder="Escolaridade">
                        </div>

                        <div class="textfield-2">
                            <label for="profissão">Profissão</label>
                            <input type="text" id="profissao" name="profissao" placeholder="Profissão">
                        </div>
                    </div>


                    <div class="textfield-group-3">
                        <div class="textfield-3">
                            <label for="renda familiar">Renda Familiar</label>
                            <input type="number" id="renda_familiar" name="renda_familiar" placeholder="Renda Familiar">
                        </div>

                        <div class="textfield-3">
                            <label for="rg/orgão expedidor">RG Orgão Expedidor</label>
                            <input type="number" id="rg" name="rg" placeholder="RG ORGÃO EXPEDIDOR">
                        </div>

                        <div class="textfield-3">
                            <label for="cpf">CPF</label>
                            <input type="number" id="cpf" name="cpf" placeholder="CPF">
                        </div>
                    </div>

                    
                    <Div class="textfield">
                        <Label for="composição familiar">Composição Familiar</Label>
                        <input type="text" id="composicao_familiar" name="composicao_familiar" placeholder="Composição familiar">
                    </Div>


                    <div class="textfield-group-4">
                        <div class="textfield-4">
                            <Label for="estado civil">Estado Civil</Label>
                            <input type="text" id="estado_civil" name="estado_civil" placeholder="Estado civil">
                        </div>

                        <div class="textfield-4">
                            <Label for=" mora com quem?">Mora Com Quem?</Label>
                            <input type="text" id="mora_com" name="mora_com" placeholder="Mora Com Quem?">
                        </div>
                    </div>


                    <Div class="textfield">
                        <Label for="endereço">Endereço</Label>
                        <input type="text" id="endereco" name="endereco" placeholder="Endereço">
                    </Div>


                    <div class="textfield-group-5">
                        <div class="textfield-5">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" placeholder="Bairro">
                        </div>

                        <div class="textfield-5">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" placeholder="Cidade">
                        </div>

                        <div class="textfield-5">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" placeholder="CEP">
                        </div>
                    </div>


                    <div class="textfield-group-5">
                        <div class="textfield-5">
                            <label for="tel(residencial)">Tel(Residencial)</label>
                            <input type="tel" 
                            id="telefone_residencial" 
                            name="telefone_residencial" 
                            placeholder="Tel(Residencial)">
                        </div>

                        <div class="textfield-5">
                            <label for="tel(recado)">Tel(Recado)</label>
                            <input type="tel" 
                            id="telefone_recado" 
                            name="telefone_recado" placeholder="Tel(Residencial)">
                        </div>

                        <div class="textfield-5">
                            <label for="celular">celular</label>
                            <input type="tel" 
                            id="celular" 
                            name="celular" 
                            placeholder="celular">
                        </div>
                    </div>


                    <Div class="textfield">
                        <Label for="email">Email</Label>
                        <input type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Email">
                    </Div>

                    <button type="button" id="btnCadastro" onclick="cadastrar()" class="btn-cadastro">Cadastrar</button>

                    <button type="submit" id="btnEnviar" style="display:none" name="enviar"></button>
                </div>
            </form>
        </div>
    </div>
    <div>
    </div>
    <script>
        var btnCadastro = document.getElementById('btnCadastro');
        var btnEnviar = document.getElementById('btnEnviar');

        var nome = document.getElementById('nome');
        var sexo = document.getElementById('sexo');
        var idade = document.getElementById('idade');
        var nascimento = document.getElementById('nascimento');
        var localidade = document.getElementById('localidade');

        var escolaridade = document.getElementById('escolaridade');
        var profissao = document.getElementById('profissao');
        var renda_familiar = document.getElementById('renda_familiar');
        var rg = document.getElementById('rg');
        var cpf = document.getElementById('cpf');

        var composicao_familiar = document.getElementById('composicao_familiar');
        var estado_civil = document.getElementById('estado_civil');
        var mora_com = document.getElementById('mora_com');
        var endereco = document.getElementById('endereco');
        var bairro = document.getElementById('bairro');

        var cidade = document.getElementById('cidade');
        var cep = document.getElementById('cep');
        var telefone_residencial = document.getElementById('telefone_residencial');
        var telefone_recado = document.getElementById('telefone_recado');
        var celular = document.getElementById('celular');
        var email = document.getElementById('email');
        
        function cadastrar() {
            validarCamposDoCadastro();
        }

        function validarCamposDoCadastro() {

            if(nome.value == '' || sexo.value == '' || 
            idade.value == '' || nascimento.value == '' || 
            localidade.value == '') {
                alert('Por favor, preenchar todos os campos!');

            } else if(escolaridade.value == '' || profissao.value == '' || 
            renda_familiar.value == '' || rg.value == '' || 
            cpf.value == '') {
                alert('Por favor, preenchar todos os campos!');

            } else if(composicao_familiar.value == '' || estado_civil.value == '' || 
            mora_com.value == '' || endereco.value == '' || 
            bairro.value == '') {
                alert('Por favor, preenchar todos os campos!');

            } else if(cidade.value == '' || cep.value == '' || 
            telefone_residencial.value == '' || telefone_recado.value == '' || 
            celular.value == '' || email.value == '') {
                alert('Por favor, preenchar todos os campos!');

            } else {
                btnEnviar.click();
            }
        }
    </script>
</body>
</html>
