<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Clínica de Psicologia - Escolha Seu Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="style.css" rel="stylesheet">
    <link href="../img/favicon.ico" rel="icon">
    <style>
        body {
         font-family: 'Arial', sans-serif;
         background-color: #f4f4f4;
         margin: 0;
         padding: 0;
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: 100vh;
         flex-direction: column;
         background-color: #04274d;
         }
 
        header {
             background-color: #ffffff;
             padding: 10px;
             text-align: center;
             position: fixed;
             width: 100%;
             top: 0;
             z-index: 1000;
             display: flex;
             justify-content: flex-start;
             align-items: center;
        }
 
        .logo-link {
             text-decoration: none;
             cursor: pointer;
             margin-left: 20px; /* Adicionado para ajustar a margem da imagem */
        }
 
        .logo {
             cursor: pointer;
             width: 105px; /* Ajuste conforme necessário */
             height: 35px;
        }
 
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            height: 65vh; /* Ajuste a altura conforme necessário */
            width: 90%; /* Ajuste a largura conforme necessário */
            max-width: 1200px; /* Limitando a largura máxima */
            margin: 20px;
            margin-top: 60px; /* Ajuste conforme a altura do header */
            padding: 20px;
        }
 
        .card {
            border: 1px solid #ffffff;
            padding: 20px;
            text-align: center;
            width: 300px; /* Largura fixa dos cartões */
            height: 85%; /* Ajuste a altura dos cartões conforme necessário */
            margin: 10px;
            transition: transform 0.2s ease-in-out;
            background-color: #042f61;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor:pointer;
        }
 
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card img {
            max-width: 75%; /* Ajuste a largura da imagem conforme necessário */
            height: auto;
            margin-bottom: 10px;
            border-radius: 8px;
            cursor: pointer;
            margin: 0 auto;
        }
 
        .card button {
            display: block;
            margin-top: 5px;
        }

        .btn-estilizado {
            margin-top: auto;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
            padding: 10px;
            background-color: rgb(4, 49, 97);
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
     </style>
</head>
<body>
    <header>
        <a href="../index.php" class="logo-link">
            <img class="logo" src="img/logo-estacio.png" alt="Estacio Logo">
        </a>
    </header>

    <div class="card-container">
        <a href="../login.php">
            <div class="card">
                <img src="img/team-4.jpg" alt="Imagem Administrador">
                <p class="btn-estilizado">Login Administrador</p>
            </div>
        </a>

        <a href="../terapeuta/login.php" onclick="redirecionarOutraTela()">
            <div class="card">
                <img src="img/team-1.jpg" alt="Imagem Terapeuta">
                <p class="btn-estilizado">Login Terapeuta</p>
            </div>
        </a>
       
        <a href="../monitor/login.php">
            <div class="card">
                <img src="img/team-2.jpg" alt="Imagem Monitor">
                <p class="btn-estilizado">Login Monitor</p>
            </div>
        </a>

        <a href="../professor/login.php">
            <div class="card">
                <img src="img/team-2.jpg" alt="Imagem Monitor">
                <p class="btn-estilizado">Login Professor</p>
            </div>
        </a>
    </div>
    <script>
        function redirecionarOutraTela(){
            window.location.href = 'terapeuta/login.php';
        }
    </script>
</body>
</html>
