<?php
    include('../../../protect.php');
    include('../../../../db/conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>SINTRACEMA - Sucesso!</title>
    <meta charset='utf-8'>
    <meta lang="pt-br">
    <link rel="icon" type="image/x-icon" href="imagens/graduation-hat-material-design-png_131387.jpg">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../../../img/favicon.png" type="image/x-icon">
<style>
    body {
        background-color:rgb(176, 231, 184);
    }

    header {
      background-color: #f3f5f5;
      height: 30%;
      padding: 0.2%;
      font-size: 10vw;
    }

    main, footer{
        padding: 10%;
        padding-top: 5%;
    }

    .logo{
        margin-top: -10%;
    }

    main {
        background-color: rgb(255, 255, 255);
        margin: auto;
        width: 90%;
    }

    img {
        display: block;
        margin: auto;
    }

    p {
        text-align: center;
        margin-top: 1rem;
        font-size: 25pt;
        font-weight: bold;
    }

    h2 {
        text-align: center;
        margin-top: 2rem;
        font-size: 25pt;
        font-weight: bold;
        color: rgb(82, 81, 81);
    }

    /* button {
        display: block;
        margin: auto;
        margin-top: 3rem;
        padding: 1rem;
        width: 8rem;
        background-color: rgb(138, 223, 126);
        color: white;
        font-weight: bold;
        font-size: 15pt;
        text-shadow: 1px 1px 3px black;
        border: none;
        border-radius: 7px;
    } */

    button:hover {
        background-color: rgb(69, 204, 51);
    }
    .ok-btn{
      text-align: center;
    }

</style>
</head>
<body>
    <header>
        <div class="conta-fluid">
          <h2>CLÍNICA DE PSICOLOGIA</h2>
        </div>  
    </header>
    <main>
        <div class="container-fluid">
          <img src="../../../../img/sucesso.png" alt="">
          <p>Tudo certo!</p>
          <h2>Cadastro realizado com sucesso.</h2>
          <div class="ok-btn">
          <a href="../../../index.php" class="btn btn-success">OK</a>
        </div>
  </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>