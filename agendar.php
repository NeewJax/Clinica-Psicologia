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
    <meta charset="utf-8">
    <title>Clínica de psicologia - Estácio de Sá</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Template Stylesheet -->
    <link href="style-tela.css" rel="stylesheet">
</head>

</head>
<body>
 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <img id="estacio" src="logo-estacio.png" alt="Estácio de Sá">
    </a>
</nav>
    
    </head>
    <div class="main-cadastro">
        <div class="center-tela">
            <div class="card-cadastro">
                <h1>Cadastro</h1>
                <div class="textfield">
                    <label for="nome">Nome</label> 
                    <input type="email" name="nome" placeholder="Nome">
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
                        <input type="month" name="nascimento" placeholder="Nascimento">
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
                        <input type="text" name="profissão" placeholder="Profissão">
                    </div>
                </div>
                <div class="textfield-group-3">
                    <div class="textfield-3">
                        <label for="renda familiar">Renda Familiar</label>
                        <input type="tel" name="renda familiar" placeholder="Renda Familiar">
                    </div>
                    <div class="textfield-3">
                        <label for="rg/orgão expedidor">RG Orgão Expedidor</label>
                        <input type="tel" name="rg/orgão expedidor" placeholder="RG ORGÃO EXPEDIDOR">
                    </div>
                    <div class="textfield-3">
                        <label for="cpf">CPF</label>
                        <input type="tel" name="cpf" placeholder="CPF">
                    </div>
                </div>
                    <Div class="textfield">
                        <Label for="composição familiar">Composição Familiar</Label>
                        <input type="text"name="composição familiar" placeholder="Composição Familiar">
                    </Div>
                <div class="textfield-group-4">
                    <div class="textfield-4">
                        <Label for="estado civil">Estado Civil</Label>
                        <input type="text"name="estado civil" placeholder="Estado Civil">  
                    </div>
                    <div class="textfield-4">
                        <Label for=" mora com quem?">Mora Com Quem?</Label>
                        <input type="text"name="mora com quem?" placeholder="Mora Com Quem?">  
                    </div>
                </div>
                <Div class="textfield">
                    <Label for="endereço">Endereço</Label>
                    <input type="text"name="endereço" placeholder="Endereço">
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
                        <input type="tel" name="cep" placeholder="CEP">
                    </div>
                </div>
                <div class="textfield-group-5">
                    <div class="textfield-5">
                        <label for="tel(residencial)">Tel(Residencial)</label>
                        <input type="tel" name="tel(residencial)" placeholder="Tel(Residencial)">
                    </div>
                    <div class="textfield-5">
                        <label for="tel(recado)">Tel(Recado)</label>
                        <input type="tel" name="tel(recado)" placeholder="Tel(Residencial)">
                    </div>
                    <div class="textfield-5">
                        <label for="celular">celular</label>
                        <input type="tel" name="celular" placeholder="celular">
                    </div>
                </div>
                <Div class="textfield">
                    <Label for="email">Email</Label>
                    <input type="email"name="email" placeholder="Email">
                </Div>
                <button type="submit" class="btn-cadastro">Cadastrar</button>
            </div>  
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
