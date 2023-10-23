<?php
include('../../protect.php');
include('../../../db/conexao.php');
?>

<?php
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  //ENDEREÇO
  $id_endereco = $_POST['id_endereco'];
  $estado = $_POST['estado'];
  $uf = $_POST['UF'];
  $cidade = $_POST['cidade'];
  $bairro = $_POST['bairro'];
  $rua = $_POST['rua'];
  $numero_casa = $_POST['numero_casa'];

  $nacionalidade = $_POST['nacionalidade'];
  $naturalidade = $_POST['naturalidade'];
  $escolaridade = $_POST['escolaridade'];
  $cursos = $_POST['curso'];
  $estado_civil = $_POST['estado_civil'];
  $nascimento = $_POST['nascimento'];
  $fone = $_POST['fone'];
  $cpf = $_POST['cpf'];
  $rg = $_POST['rg'];
  $nome_pai = $_POST['nome_pai'];
  $nome_mae = $_POST['nome_mae'];
  $nome_conjuge = $_POST['nome_conjuge'];
  $nome_filhos = $_POST['nome_filhos'];
  $assinatura_socio = $_POST['assinatura_socio'];
  $numero_matricula = $_POST['matricula'];


  // Atualizar os dados na tabela
  $sql = "UPDATE filiais SET nome = '$nome', email = '$email', nacionalidade = '$nacionalidade', naturalidade = '$naturalidade', escolaridade = '$escolaridade', cursos = '$cursos', estado_civil = '$estado_civil', nascimento = '$nascimento', fone = '$fone', cpf = '$cpf', rg = '$rg', nome_pai = '$nome_pai', nome_mae = '$nome_mae', nome_conjuge = '$nome_conjuge', nome_filhos = '$nome_filhos', assinatura_socio = '$assinatura_socio', numero_matricula = '$numero_matricula' WHERE id = $id";

  $result = mysqli_query($mysqli, $sql);

  $sql_endereco = "UPDATE endereco SET estado = '$estado', uf = '$uf', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero_casa = '$numero_casa' WHERE id_endereco = $id_endereco";

  $result_endereco = mysqli_query($mysqli, $sql_endereco);

  if ($result && $result_endereco) {
    header("Location: afiliados.php?msg=Atualização realizada com sucesso");
    exit;
  } else {
    echo "Falha: " . mysqli_error($mysqli);
  }

  mysqli_close($mysqli);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SINTRACEMA | Editar Afiliados</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Bootstrap -->
  <link rel="shortcut icon" href="../../../img/favicon.png" type="image/x-icon">
  <style>
    div.divForm {
      width: 100%;
    }

    form {
      width: 100%;
    }

    div.custom {
      display: flex;
    }

    div.custom>div.quebraLinha {
      width: 80%;
    }

    div.nomeEmail>div.quebraLinha>.custom-input {
      width: 50%;
      margin-right: 2%;
    }

    .custom-input {
      width: 90%;
    }

    .id_oculto {
      display: none;
    }
  </style>

  <!-- Font Awesome -->

<body class="hold-transition skin-blue fixed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="../../index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SC</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SINTRA</b>CEMA</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../../dist/img/user.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nome']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../../dist/img/user.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['nome']; ?>

                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="../../logout.php" class="btn btn-danger">Sair</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../../dist/img/user.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nome']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control custom-input" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">SINTRACEMA MENU</li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            </ul>
          </li>
          <li class="treeview active">
            <a href="#">
              <i class="fa fa-gears"></i>
              <span>Gerenciar</span>
              <span class="label label-primary pull-right">4</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="afiliados.php"><i class="fa fa-plus-square"></i> Afiliados Cadastrados</a></li>
              <li><a href="afiliadosAprovados.php"><i class="fa fa-plus-square"></i> Afiliados Aprovados</a></li>
              <li><a href="noticias.php"><i class="fa fa-plus-square"></i> Notícias</a></li>
              <li><a href="videos.php"><i class="fa fa-plus-square"></i> Vídeos</a></li>
            </ul>
          </li><!--
            <li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span>DarkShop</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../layout/darkshop.php"><i class="fa fa-cart-plus"></i> Store</a></li>
              </ul>
            </li>
           -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          SINDICATO SINTRACEMA
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Gerenciar</a></li>
          <li class="active">Editar Afiliados</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="callout callout-info">
          <h4>AVISO!</h4>
          <p>Nossa versão ainda encontra-se em fases de testes, se você achar algum bug por favor contate o adminstrador!</p>
        </div>
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">AFILIADOS</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">

            <!-- AQUI COMEÇA SUA APLICAÇÃO -->


            <div class="container">
              <div class="text-center mb-4">
                <h3>Editar cadastro de filiados</h3>
                <p class="text-muted">Clique em "atualizar" para atualizar alguma informação</p>
              </div>
              <br>
              <?php
              $sql = "SELECT * FROM filiais 
              JOIN endereco ON filiais.id_endereco = endereco.id_endereco 
              WHERE id = $id";
              $result = mysqli_query($mysqli, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <!-- SELECT tbljogadoress.*,tblmodalidade.*, tblposicao.nome_posicao 
              FROM tbljogadoress
              JOIN tblposicao ON tbljogadoress.id_posicao = tblposicao.id_posicao 
              JOIN tblmodalidade ON tblposicao.id_modalidade = tblmodalidade.id_modalidade
              WHERE idade > 7 AND idade <= 9 -->

              <div class="container-fluid divForm">
                <form action="" method="post">

                  <div class="container-fluid">

                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control custom-input" name="nome" value="<?php echo $row['nome']; ?>">


                    <label class="form-label">E-mail:</label>
                    <input type="text" class="form-control custom-input custom-input" name="email" value="<?php echo $row['email']; ?>">


                    <label class="form-label">CPF:</label>
                    <input type="text" class="form-control custom-input" name="cpf" value="<?php echo $row['cpf']; ?>">


                    <label class="form-label">Telefone:</label>
                    <input type="text" class="form-control custom-input" name="fone" value="<?php echo $row['fone']; ?>">


                    <label class="form-label">Nacionalidade:</label>
                    <input type="text" class="form-control custom-input" name="nacionalidade" value="<?php echo $row['nacionalidade']; ?>">


                    <label class="form-label">Naturalidade:</label>
                    <input type="text" class="form-control custom-input" name="naturalidade" value="<?php echo $row['naturalidade']; ?>">


                    <label class="form-label">Escolaridade:</label>
                    <input type="text" class="form-control custom-input" name="escolaridade" value="<?php echo $row['escolaridade']; ?>">


                    <label class="form-label">Cursos:</label>
                    <input type="text" class="form-control custom-input" name="curso" value="<?php echo $row['cursos']; ?>">

                    <!-- ENDEREÇO -->
                    <input type="text" class="id_oculto" name="id_endereco" value="<?php echo $row['id_endereco']; ?>">

                    <label class="form-label">Estado:</label>
                    <input type="text" class="form-control custom-input" name="estado" value="<?php echo $row['estado']; ?>">

                    <label class="form-label">UF:</label>
                    <input type="text" class="form-control custom-input" maxlength="2" name="UF" value="<?php echo $row['uf']; ?>">

                    <label class="form-label">Cidade:</label>
                    <input type="text" class="form-control custom-input" name="cidade" value="<?php echo $row['cidade']; ?>">

                    <label class="form-label">Bairro:</label>
                    <input type="text" class="form-control custom-input" name="bairro" value="<?php echo $row['bairro']; ?>">

                    <label class="form-label">Rua:</label>
                    <input type="text" class="form-control custom-input" name="rua" value="<?php echo $row['rua']; ?>">

                    <label class="form-label">Número da Casa/Apartamento:</label>
                    <input type="text" class="form-control custom-input" name="numero_casa" value="<?php echo $row['numero_casa']; ?>">
                    <!-- FIM DOS CAMPOS ENDEREÇO -->

                    <label class="form-label">Estado Cívil:</label>
                    <input type="text" class="form-control custom-input" name="estado_civil" value="<?php echo $row['estado_civil']; ?>">


                    <label class="form-label">Nascimento:</label>
                    <input type="text" class="form-control custom-input" name="nascimento" value="<?php echo $row['nascimento']; ?>">


                    <label class="form-label">RG:</label>
                    <input type="text" class="form-control custom-input" name="rg" value="<?php echo $row['rg']; ?>">


                    <label class="form-label">Nome do pai:</label>
                    <input type="text" class="form-control custom-input" name="nome_pai" value="<?php echo $row['nome_pai']; ?>">


                    <label class="form-label">Nome da mãe:</label>
                    <input type="text" class="form-control custom-input" name="nome_mae" value="<?php echo $row['nome_mae']; ?>">


                    <label class="form-label">Nome cônjuge:</label>
                    <input type="text" class="form-control custom-input" name="nome_conjuge" value="<?php echo $row['nome_conjuge']; ?>">


                    <label class="form-label">Nome filhos:</label>
                    <input type="text" class="form-control custom-input" name="nome_filhos" value="<?php echo $row['nome_filhos']; ?>">


                    <label class="form-label">Assinatura do Socio:</label>
                    <input type="text" class="form-control custom-input" name="assinatura_socio" value="<?php echo $row['assinatura_socio']; ?>">


                    <label class="form-label">Número da matricula:</label>
                    <input type="text" class="form-control custom-input" name="matricula" value="<?php echo $row['numero_matricula']; ?>">


                    <br>
                    <div>
                      <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                      <a href="afiliados.php" class="btn btn-danger">Cancelar</a>
                    </div>
                  </div>
                </form> <br>

                <?php

                $id_aprovacao = $row['id_aprovacao'];
                if ($id_aprovacao == 2) {
                  echo "<form class='formAprova' action='aprovar.php' method='post'>";
                      echo "<input style='display:none' type='number' name='id' value='" . $id . "'>";

                      echo "<button type='submit' class='btn btn-success'>Aprovar</button>";
                  echo "</form>";
                } else if ($id_aprovacao == 1){
                  echo "<form class='formAprova' action='desaprovar.php' method='post'>";
                      echo "<input style='display:none' type='number' name='id' value='" . $id . "'>";

                      echo "<button type='submit' class='btn btn-danger desaprovar'>Desaprovar</button>";
                  echo "</form>";
                }
                ?>
              </div>
            </div>

            <!--AQUI TERMINA SUA APLICAÇÃO! -->

          </div><!-- /.box-body -->
          <div class="box-footer">

          </div><!-- /.box-footer-->
        </div><!-- /.box -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>SINDICATO - SINTRACEMA <br> Equipe de desenvolvimento da Estácio de Sá | Laboratório de Transformação Digital.</strong>
    </footer>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../../plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>


</body>

</html>