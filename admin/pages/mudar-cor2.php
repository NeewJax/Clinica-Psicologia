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

    $mysqli->query("UPDATE tbl_sala_reservada SET id_status = $id_status WHERE id = $id");
}

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

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
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
        <form action="" method="post">
            <select name="id_status">
                <option value="1">SALA RESERVADA</option>
                <option value="2">SALA LIVRE</option>
                <option value="3">SHORÁRIO DE ENCAIXE</option>
                <option value="4">TRIAGEM</option>
                <option value="5">DEIXAR EM BRANCO</option>
            </select>

            <button type="submit" name="salvar">SALVAR</button>
        </form>
    </div>
</body>
</html>