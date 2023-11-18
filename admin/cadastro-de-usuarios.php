<?php
    if(isset($_POST['email'])) {
        include('../db/conexao.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $mysqli->query("INSERT INTO users (id,nome,email,senha) VALUES (NULL, '$nome', '$email', '$senha')");

    }
?>

<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="css/login.css">
        <title>Psicologia - Cadastramento de usuarios</title>
    </head>
    <body>
        Cadastramento de usuarios
        <form action="" method="POST">
            <input type="text" placeholder="nome" required name="nome"><br>
            <br>
            <input type="email" placeholder="e-mail" required name="email"><br>
            <br>
            <input type="password" placeholder="password" required name="senha"><br>
            <br>
            <button type="submit">Cadastrar usuario</button> 
        </form>
    </body>
</html>