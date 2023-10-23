<?php
    include('protect.php');
?>
<!DOCTYPE html>
<html lang="PT">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Painel Admin</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h4 {
                margin-top: 0;
            }
            p {
                margin-bottom: 0;
            }
            a {
                color: #555;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h4>Bem-vindo ao painel, <?php echo $_SESSION['nome']; ?></h4>
            <p>
                <a href="logout.php">Sair</a>
            </p>
        </div>
    </body>
</html>
