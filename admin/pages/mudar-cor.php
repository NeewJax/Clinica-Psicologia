<?php

include('../../db/conexao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mudar Cor</title>
    <style>
        body {
            background-color: rgb(185, 232, 232);
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        button {
            margin-top: 8%;
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            width: 80%;
            border: none;
            border-radius: 10px;
            font-size: bold;
            font-weight: bold;
        }

        .reservada {
            background-color: yellow;
        }

        .reservada:hover {
            background-color: rgb(152, 152, 0);
        }


        .livre {
            background-color: rgb(84, 130, 53);
        }

        .livre:hover {
            background-color: rgb(47, 72, 30);
        }


        .encaixe {
            background-color: rgb(198, 89, 17);
        }

        .encaixe:hover {
            background-color: rgb(103, 47, 9);
        }


        .triagem {
            background-color: rgb(0, 176, 240);
        }

        .triagem:hover {
            background-color: rgb(0, 109, 148);
        }


        .nada {
            background-color: white;
        }

        .nada:hover {
            background-color: rgb(148, 147, 147);
        }
    </style>
</head>
<body>
    <div class="container-fluid">

        <button onclick="salaReservada()" class="reservada">SALA RESERVADA</button>

        <button onclick="salaLivre()" class="livre">SALA LIVRE</button>

        <button onclick="salaEncaixe()" class="encaixe">HORÁRIO DE ENCAIXE</button>

        <button onclick="salaTriagem()" class="triagem">TRIAGEM</button>

        <button onclick="salaNada()" class="nada">DEIXAR EM BRANCO</button>
    </div>
    <script>

        <?php   
            $sql_sala_cod = "SELECT sala_cod FROM tbl_sala_reservada";
            $resut_sala_cod = mysqli_query($mysqli, $sql_sala_cod);
            while($row_sala_cod = mysqli_fetch_assoc($resut_sala_cod)) {
        ?>

            var element_<?php echo $row_sala_cod['sala_cod'] ?> = window.opener.getElementById("<?php echo $row_sala_cod['sala_cod'] ?>");

            function salaReservada() {
                if(window.opener && !window.opener.closed) {
                    element.classList.replace("livre","reservada");
                    element.classList.replace("encaixe","reservada");
                    element.classList.replace("triagem","reservada");
                    element.classList.replace("nada","reservada");
                }
            }

            function salaLivre() {
                if(window.opener && !window.opener.closed) {
                    element.classList.replace("reservada","livre");
                    element.classList.replace("encaixe","livre");
                    element.classList.replace("triagem","livre");
                    element.classList.replace("nada","livre");
                }
            }

            function salaEncaixe() {
                if(window.opener && !window.opener.closed) {
                    element.classList.replace("reservada","encaixe");
                    element.classList.replace("livre","encaixe");
                    element.classList.replace("triagem","encaixe");
                    element.classList.replace("nada","encaixe");
                }
            }

            function salaTriagem() {
                if(window.opener && !window.opener.closed) {
                    element.classList.replace("reservada","triagem");
                    element.classList.replace("livre","triagem");
                    element.classList.replace("encaixe","triagem");
                    element.classList.replace("nada","triagem");
                }
            }
            function salaNada() {
                if(window.opener && !window.opener.closed) {
                    element.classList.replace("reservada","nada");
                    element.classList.replace("livre","nada");
                    element.classList.replace("encaixe","nada");
                    element.classList.replace("triagem","nada");
                }
            }

        <?php
            }
        ?>
    </script>
</body>
</html>