<?php
    include('../db/conexao.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="../img/favicon.ico" rel="icon">
    <title>Login do terapeuta - Clínica de psicologia</title>
    <style>
        /* Reset de margens para o elemento body */
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
        }

        body * {
            box-sizing: border-box;
        }

        /* Estilos para a seção principal de login */
        .main-login {
            width: 100vw;
            height: 100vh;
            background: #404ddd;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Estilos para o lado esquerdo do login */
        .left-login {
            width: 50%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-login h1 {
            color: #f4f4fa;
            font-size: 3vw;
        }

        .left-login-image {
            width: 40vw;
        }

        /* Estilos para o lado direito do login */
        .right-login {
            width: 50%;
            height: 70%; /* Ajuste a altura conforme necessário */
            display: flex;
            justify-content: flex-end; /* Ajusta para a direita */
            align-items: center;
        }

        /* Seletor mais específico para a .right-login */
        .right-login .card-login {
            width: 85%;
            max-width: 400px; /* Adicione um valor máximo para o width */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px 35px;
            background: #0f0d13;
            border-radius: 20px;
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.34);
        }

        /* Adiciona estilo para evitar herdar estilos indesejados pela form */
        .right-login .login-form {
            margin-left: 40px;
            justify-content: center;
            width: 85%;
            /* Reset das margens para evitar interferências */
        }

        .login-form h1 {
            text-align: center;
        }
        /* Centraliza o formulário verticalmente */
        .right-login .card-login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Estilos para o cartão de login*/
        .card-login h1 {
            color: #f0f1f5;
            font-weight: 800;
            margin: 0;
        }

        /* Estilos para os campos de texto */
        .textfield {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            margin: 10px 0;
            width: 100%;
        }

        .textfield input {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 15px;
            background: #332f3f;
            color: #f0ffffde;
            font-size: 12pt;
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.34);
            outline: none;
            box-sizing: border-box;
        }

        .textfield label {
            color: #f0ffffde;
            margin-bottom: 10px;
        }

        .textfield input::placeholder {
            color: #f0ffff94;
        }

        /* Estilos para o botão de login */
        .btn-login {
            width: 100%;
            padding: 16px 0;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            outline: none;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 3px;
            color: #050208;
            background: #1808ac;
            cursor: pointer;
            box-shadow: 0px 10px 40px -12px rgba(0, 0, 0, 0.34);
            color: white;
        }

        @media only screen and (max-width: 950px) {
            .card-login {
                width: 100%;
            }

            .right-login {
                justify-content: center; /* Reverte para o centro em telas menores */
            }
        }

        @media only screen and (max-width: 750px) {
            .main-login {
                flex-direction: column;
            }

            .left-login>h1 {
                display: none;
            }

            .left-login {
                width: 100%;
                height: auto;
            }

            .right-login {
                width: 100%;
                height: auto;
                justify-content: center; /* Reverte para o centro em telas menores */
            }
        }

        .btn-login-hover {
            background-color: #2b2bdd;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça o login<br>para entrar</h1>
            <img src="imagem-login.svg" class="left-login-image" alt="conversa foda">
        </div>
        <div class="right-login">
            <form method="post" class="login-form">
                <div class="card-login">
                    <h1>Login do Terapeuta</h1>
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário" require>
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" require>
                    </div>
                    <button class="btn-login">Login</button>
                    <button class="btn-login" type="button" onclick="redirecionarParaOutraTela()">Voltar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
          function redirecionarParaOutraTela() {
        window.location.href = '../tela-escolha-login/homeLogin.html';
    }
    </script>
    <!-- <div>
        <script src="script.js"></script>
    </div> -->
</body>

</html>