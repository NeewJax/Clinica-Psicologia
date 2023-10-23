<?php
include('../db/conexao.php');
session_start();
// VALIDANDO ALGUNS PARÂMETROS DE LOGIN
if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha!";
    } else {
        //LIMPANDO MYSQLI PARA ANTI SQL INJECTION
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL: " . $mysqli);

        $quantidade = $sql_query->num_rows;
        // FAZENDO A AUTENTICAÇÃO E REDIRECIONANDO PARA O PAINEL
        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
             if (password_verify($senha, $usuario['senha'])) {
                 $_SESSION['id'] = $usuario['id'];
                 $_SESSION['nome'] = $usuario['nome'];

                 header("Location: index.php");
             }
           // $_SESSION['id'] = $usuario['id'];
          //  $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php");
        } else {
            // SERIALIZA A STRING INVALID PARA RETORNAR NO FORM DE HTML
            $invalid = "Ops... e-mail ou senha incorretos!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #5372F0;
        }

        ::selection {
            color: #fff;
            background: #5372F0;
        }

        .wrapper {
            width: 380px;
            padding: 40px 30px 50px 30px;
            background: #fff;
            border-radius: 5px;
            text-align: center;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.1);
        }

        .wrapper header {
            font-size: 35px;
            font-weight: 600;
        }

        .wrapper form {
            margin: 40px 0;
        }

        form .field {
            width: 100%;
            margin-bottom: 20px;
        }

        form .field.shake {
            animation: shake 0.3s ease-in-out;
        }

        @keyframes shake {

            0%,
            100% {
                margin-left: 0px;
            }

            20%,
            80% {
                margin-left: -12px;
            }

            40%,
            60% {
                margin-left: 12px;
            }
        }

        form .field .input-area {
            height: 50px;
            width: 100%;
            position: relative;
        }

        form input {
            width: 100%;
            height: 100%;
            outline: none;
            padding: 0 45px;
            font-size: 18px;
            background: none;
            caret-color: #5372F0;
            border-radius: 5px;
            border: 1px solid #bfbfbf;
            border-bottom-width: 2px;
            transition: all 0.2s ease;
        }

        form .field input:focus,
        form .field.valid input {
            border-color: #5372F0;
        }

        form .field.shake input,
        form .field.error input {
            border-color: #dc3545;
        }

        .field .input-area i {
            position: absolute;
            top: 50%;
            font-size: 18px;
            pointer-events: none;
            transform: translateY(-50%);
        }

        .input-area .icon {
            left: 15px;
            color: #bfbfbf;
            transition: color 0.2s ease;
        }

        .input-area .error-icon {
            right: 15px;
            color: #dc3545;
        }

        form input:focus~.icon,
        form .field.valid .icon {
            color: #5372F0;
        }

        form .field.shake input:focus~.icon,
        form .field.error input:focus~.icon {
            color: #bfbfbf;
        }

        form input::placeholder {
            color: #bfbfbf;
            font-size: 17px;
        }

        form .field .error-txt {
            color: #dc3545;
            text-align: left;
            margin-top: 5px;
        }

        form .field .error {
            display: none;
        }

        form .field.shake .error,
        form .field.error .error {
            display: block;
        }

        form .pass-txt {
            text-align: left;
            margin-top: -10px;
        }

        .wrapper a {
            color: #5372F0;
            text-decoration: none;
        }

        .wrapper a:hover {
            text-decoration: underline;
        }

        form input[type="submit"] {
            height: 50px;
            margin-top: 30px;
            color: #fff;
            padding: 0;
            border: none;
            background: #5372F0;
            cursor: pointer;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        form input[type="submit"]:hover {
            background: #2c52ed;
        }

        #icon-voltar {
            cursor: pointer;
            font-size: 200%;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>Login</header>
        <form action="" method="POST">
            <div class="field email">
                <div class="input-area">
                    <input type="email" placeholder="Email" name="email" id="email">
                    <i class="icon fas fa-envelope"></i>
                    <i class="error error-icon fas fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">O email não pode estar vazio!</div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" placeholder="Senha" name="senha" id="senha">
                    <i class="icon fas fa-lock"></i>
                    <i class="error error-icon fas fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">A senha não pode estar vazia!</div>
            </div>
            <!-- <div class="pass-txt"><a href="#">Esqueceu a senha?</a></div> -->
            <input name="enviar" type="submit" value="Enviar">
            <?php
            if (isset($quantidade)) {
                echo $invalid;
            }
            ?>
        </form>
        <i id="icon-voltar" class="bi bi-arrow-left-circle-fill" onclick="voltar()"></i>
        <a style="display:none" id="link_voltar" href="../index.php"></a>
    </div>
    <script>
        var link_voltar = document.getElementById("link_voltar");
        function voltar(){
            link_voltar.click();
        }
    </script>
    <!-- <script>
        var link_voltar = document.getElementById('link_voltar');

        function voltar() {
            link_voltar.click();
        }

        const form = document.querySelector("form");
        eField = form.querySelector(".email"),
            eInput = eField.querySelector("input"),
            pField = form.querySelector(".password"),
            pInput = pField.querySelector("input");
        form.onsubmit = (e) => {
            e.preventDefault(); //impedindo o envio do formulário
            // se o e-mail e a senha estiverem em branco, adicione a classe shake, caso contrário, chame a função especificada
            (eInput.value == "") ? eField.classList.add("shake", "error"): checkEmail();
            (pInput.value == "") ? pField.classList.add("shake", "error"): checkPass();
            setTimeout(() => { //remove a classe shake após 500ms 
                eField.classList.remove("shake");
                pField.classList.remove("shake");
            }, 500);
            eInput.onkeyup = () => {
                checkEmail();
            } //chamando a função checkEmail na tecla de entrada de e-mail 
            pInput.onkeyup = () => {
                checkPass();
            } //chamando a função checkPassword na chave de entrada de passagem 
            function checkEmail() { //função checkEmail 
                let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //padrão para validar e-mail
                if (!eInput.value.match(pattern)) { // se o padrão não corresponder , adicione o erro e remova a classe válida
                    eField.classList.add("error");
                    eField.classList.remove("valid");
                    let errorTxt = eField.querySelector(".error-txt");
                    //se o valor do e-mail não estiver vazio, mostre, por favor, insira um e-mail válido, caso contrário, mostre O e-mail não pode ficar em branco
                    (eInput.value != "") ? errorTxt.innerText = "Digite um endereço de e-mail valido": errorTxt.innerText = "E-mail não pode ficar em branco";
                } else { //se o padrão corresponder, remova o erro e adicione uma classe válida 
                    eField.classList.remove("error");
                    eField.classList.add("valid");
                }
            }

            function checkPass() { //função checkPass 
                if (pInput.value == "") { //se a passagem estiver vazia, adicione o erro e remova a classe válida 
                    pField.classList.add("error");
                    pField.classList.remove("valid");
                } else { //se pass estiver vazio, remova o erro e adicione uma classe válida 
                    pField.classList.remove("error");
                    pField.classList.add("valid");
                }
            }
            //se eField e pField não contém classe de erro que significa que o usuário preencheu os detalhes corretamente
            if (!eField.classList.contains("error") && !pField.classList.contains("error")) {
                window.location.href = form.getAttribute("action"); //redirecionando o usuário para o url especificado que está dentro do atributo de ação da tag de formulário
            }
        }
    </script> -->
</body>

</html