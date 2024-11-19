<?php

include('../../db/conexao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon">
    <title>Reserva de sala</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            max-width: 100%;
            max-height: 100%;
        }
        .container-fluid h2 {
            text-align: center;
            font-size: 280%;
            font-weight: bold;
            margin: 1.5%;
        }

        .divForm {
            height: '80%';
        }
        table {
            border-collapse: collapse;
        }
        table input {
            border: none;
            text-align: center;
            width: 100%;
            min-height: 100%;
        }
        tbody td {
            cursor: pointer;
        }
        tbody td:hover {
            background-color: rgb(181, 181, 181);
        }
        table th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            cursor: default;
        }
        .highlight {
            background-color: yellow;
        }


        td.reservada {
            background-color: yellow;
        }

        td.reservada:hover {
            background-color: rgb(152, 152, 0);
        }


        td.livre {
            background-color: rgb(84, 130, 53);
        }

        td.livre:hover {
            background-color: rgb(47, 72, 30);
        }


        td.encaixe {
            background-color: rgb(198, 89, 17);
        }

        td.encaixe:hover {
            background-color: rgb(103, 47, 9);
        }


        td.triagem {
            background-color: rgb(0, 176, 240);
        }

        td.triagem:hover {
            background-color: rgb(0, 109, 148);
        }


        td.nada {
            background-color: white;
        }

        .divVoltar {
            width: '100%';
        }

        #iconeVoltar {
            cursor: pointer;
            color: black;
            font-size: 200%;
            transition: .5s;
        }

        #iconeVoltar:hover {
            color: rgb(101, 101, 101);
        }

        footer {
            width: '100%';
            background-color: rgb(26, 26, 26);
            position: fixed;
            bottom: 0;
        }

        footer nav{
            padding-top: '20%';
            padding: 0.5%;
        }

        footer nav a{
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 0.6%;
            border-radius: 9px;
            transition: .5s;
        }

        footer nav a:hover{
            color: rgb(158, 158, 158);
            background-color: rgb(48, 48, 48);
        }

        #selected {
            background-color: rgb(48, 48, 48);
        }
    </style>
</head>
<body>
    <div class="container-fluid divForm">
        <div class="divVoltar">
            <a href="../index.php"><i class="bi bi-arrow-left-circle-fill" id="iconeVoltar"></i></a>
        </div>
        <h2>Grade Horária - Quarta-feira</h2>
        <table class="table">
            <form action="" method="post">
                <thead class="table-dark">
                    <tr>
                        <th>Horário</th>
                        <th colspan="7">MANHÃ</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                        <th>s4</th>
                        <th>s5</th>
                        <th>s6</th>
                        <th>s7</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $horario_da_sala = '0';
                        $sql_horario = "SELECT id, horario from tbl_horario_sala ORDER BY id";
                        $result_horario = mysqli_query($mysqli, $sql_horario);
                        while($row_horario = mysqli_fetch_assoc($result_horario)) {
                            $horario_da_sala = $row_horario['horario'];
                    ?>
                    <tr>
                        <?php
                            if($horario_da_sala == '14H') {
                                echo "
                                </tbody>
                                    <thead class='table-dark'>
                                        <tr>
                                            <th></th>
                                            <th class='tarde' colspan='8'>TARDE</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                ";
                            }
                        ?>
                        <th><?php echo $row_horario['horario'] ?></th>
                            <?php
                                $sql_sala_reserva = "SELECT s.id, s.sala, s.sala_cod, st.status
                                                    FROM tbl_sala_reservada s
                                                    INNER JOIN tbl_horario_sala h ON s.id_horario = h.id
                                                    INNER JOIN tbl_status_sala st ON s.id_status = st.id
                                                    WHERE h.horario = '$horario_da_sala' && s.id_semana = 3
                                                    ORDER BY s.id;
                                                    ";
                                $result_reserva = mysqli_query($mysqli, $sql_sala_reserva);
                                while($row = mysqli_fetch_assoc($result_reserva)) {
                            ?>
                            <td
                            name="<?php echo $row['sala_cod'] ?>"
                                    id="<?php echo $row['sala_cod'] ?>"
                                    class="<?php echo $row['status'] ?>"
                            >
                            <?php echo $row['sala'] ?>
                            </td>
                            <?php
                              }
                            ?>
                            <tr>
                            <?php
                                }
                            ?>
                    </tr>
                </tbody>
            </form>
        </table> 
    </div>
    <footer class="container-fluid">
        <nav>
            <a href="reservar-sala-segunda.php">seg</a>
            <a href="reservar-sala-terca.php">ter</a>
            <a href="reservar-sala-quarta.php" id="selected">qua</a>
            <a href="reservar-sala-quinta.php">qui</a>
            <a href="reservar-sala-sexta.php">sex</a>
        </nav>
    </footer>
    <script>

        var popup;
        <?php
            $sql_sala_cod = "SELECT id, sala_cod FROM tbl_sala_reservada WHERE id_semana = 3";
            $resut_sala_cod = mysqli_query($mysqli, $sql_sala_cod);
            while($row_sala_cod = mysqli_fetch_assoc($resut_sala_cod)) {
        ?>

        document.getElementById("<?php echo $row_sala_cod['sala_cod'] ?>").addEventListener("click", function() {
            popup = window.open("mudar-cor.php?id=<?php echo $row_sala_cod['id'] ?>", "popupWindow", "width=400,height=600,scrollbars=no");
        });

        <?php
            }
        ?>
        
        // if(!popup) {
        //     location.reload()
        // }
    </script>
</body>
</html>