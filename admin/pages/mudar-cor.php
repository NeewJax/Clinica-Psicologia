<?php
include('../../db/conexao.php');
?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1;
}

if (isset($_POST['salvar'])) {
    $id_status = $_POST['id_status'];
    $sala = $_POST['sala'];

    $mysqli->query("UPDATE tbl_sala_reservada SET sala = '$sala', id_status = $id_status WHERE id = $id");
}

//echo "<script>window.opener.loacation.reload();</script>";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon">
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

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            margin-top: 10%;
        }

        input {
            width: 100%;
            margin-top: 5%;
            text-align: center;
        }

        select {
            width: 80%;
            margin-top: 5%;
            padding: .6%;
            text-align: center;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 10px;
            margin-bottom: 30%;
        }

        select option {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
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
            background-color:rgb(0, 109, 148);
            color: white;
            transition: .5s;
        }

        button:hover {
            background-color: rgb(0, 65, 89);
            color: rgb(201, 200, 200);
        }

        .fechar {
            background-color: rgb(238, 41, 41);
        }

        .fechar:hover {
            color: rgb(201, 200, 200);
            background-color: rgb(179, 30, 30);
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
        <form action="" method="post">

            <?php
                $sql = "SELECT id, sala, id_status FROM tbl_sala_reservada WHERE id = $id";
                $result = mysqli_query($mysqli, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>

            <div>
                <input name="sala" value="<?php echo $row['sala'] ?>">
            </div>
        

            <select name="id_status">
                <option value="<?php echo $row['id_status'] ?>" select>Mudar Cor</option>
                <option class="reservada" value="1">SALA RESERVADA</option>
                <option class="livre" value="2">SALA LIVRE</option>
                <option class="encaixe" value="3">HORÁRIO DE ENCAIXE</option>
                <option class="triagem" value="4">TRIAGEM</option>
                <option class="nada"value="5">DEIXAR EM BRANCO</option>
            </select>
            

            <button type="submit" name="salvar" onclick="reloadWindow()">SALVAR</button>
            <button class="fechar" onclick="closePopup()">FECHAR</button>
        </form>
    </div>
    <script>
        function reloadWindow() {
            if(window.opener) {
                window.opener.location.reload();
            }
        }

        function closePopup() {
            if(window.opener) {
                window.close();
            }
        }
    </script>
</body>
</html>