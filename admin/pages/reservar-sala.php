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
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon">
    <title>Reserva de sala</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            max-width: 100%;
        }
        .container-fluid h2 {
            text-align: center;
            font-size: 280%;
            font-weight: bold;
            margin: 1.5%;
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2>Grade Horária - Segunda-feira</h2>
        <table class="table">
            <form action="" method="post">
                <thead class="table-dark">
                    <tr>
                        <th>Horário</th>
                        <th colspan="7">MANHÃ</th>
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
                                                    WHERE h.horario = '$horario_da_sala'
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
    <script>

        var popup;
        <?php
            $sql_sala_cod = "SELECT id, sala_cod FROM tbl_sala_reservada";
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