<?php
include('db/conexao.php');
//session_start();
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

        $sql_code = "SELECT * FROM tbl_users WHERE email = '$email' LIMIT 1";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL: " . $mysqli);

        $quantidade = $sql_query->num_rows;
        // FAZENDO A AUTENTICAÇÃO E REDIRECIONANDO PARA O PAINEL
        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            // if (!isset($_SESSION)) {
            //     session_start();
            // }
             if (password_verify($senha, $usuario['senha'])) {
                  session_start();
                 $_SESSION['id'] = $usuario['id'];
                 $_SESSION['nome'] = $usuario['nome'];

                 header("Location: admin/index.php");
                 exit();
             }
           // $_SESSION['id'] = $usuario['id'];
          //  $_SESSION['nome'] = $usuario['nome'];

            header("Location: admin/index.php");
        } else {
            // SERIALIZA A STRING INVALID PARA RETORNAR NO FORM DE HTML
            $invalid = "Ops... e-mail ou senha incorretos!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login - Clínica de psicologia</title>
      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link href="img/favicon.ico" rel="icon">
  </head>
    <body>
      <div class="wrapper">
        <header>LOGIN</header>
        <form action="" method="POST">
          <div class="field email">
            <div class="input-area">
              <input type="email" required  name="email" id="email" placeholder="email@exemplo.com">
              <i class="icon fas fa-envelope"></i>
              <i class="error error-icon fas fa-exclamation-circle"></i>
            </div>
          </div>
          <div class="field password">
            <div class="input-area">
              <input type="password" name="senha" required placeholder="senha" id="password">
              <i class="icon"></i>
              <i class="icon fas fa-lock"></i>
              <i class="error error-icon fas fa-exclamation-circle"></i>
            </div>
            <?php
            if (isset($quantidade)) {
                echo $invalid;
            }
            ?>
          </div>
          <input type="submit" class="btn-estilizado" value="Enviar">
          <a href="index.php"><input type="button" class="btn-estilizado" value="Voltar para o início"></a>
        </form>
      </div>
    </body>
</html>
    