<?php
include('../../../protect.php');
include('../../../../db/conexao.php');
?>

<?php
$id = $_GET["id"];

if (isset($_POST["submit"])) {

  $id_disponibilidade = $_POST['disponibilidade'];
  $nome = $_POST['nome'];
  $usuario = $_POST['usuario'];
  $email = $_POST['email'];


  $sql = "UPDATE tbl_professor SET id_disponibilidade='$id_disponibilidade', nome = '$nome', usuario = '$usuario', email = '$email' WHERE id = $id";
  $result = mysqli_query($mysqli, $sql);
  header("Location: ../professores.php?msg=Professor atualizado com sucesso!");
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLINICA | EDITAR CONSULTA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <!-- Bootstrap -->
  <link rel="shortcut icon" href="../../../../img/favicon.png" type="image/x-icon">
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

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CLÍNICA | ADMIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">

    <link rel="shortcut icon" href="../../../../img/favicon.png" type="image/x-icon">
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../../index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CL</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>CLÍ</b>NICA</span>
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
                  <img src="../../../dist/img/user.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nome']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../../dist/img/user.jpg" class="img-circle" alt="User Image">
                    <p>
                        <?php echo $_SESSION['nome']; ?>
                      
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="../../../logout.php" class="btn btn-danger">Sair</a>
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
              <img src="../../../dist/img/user.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nome']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">CLINICA MENU</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
              </ul>
              <ul class="treeview-menu">
                <li class=""><a href="../../../logout.php"><i class="fa fa-dashboard"></i> Sair</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i>
                <span>Cadastrar paciente</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="../cadastro/cadastrar-paciente-adulto.php"><i class="fa fa-plus-square"></i> Adulto</a></li>
                  <li><a href="../cadastro/cadastrar-paciente-crianca.php"><i class="fa fa-plus-square"></i> Criança</a></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-gears"></i>
                <span>Gerenciar</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../pacientes.php"><i class="fa fa-plus-square"></i> Pacientes</a></li>
                <li class="active"><a href="../professores.php"><i class="fa fa-plus-square"></i> Professores</a></li>
                <li><a href="../terapeutas.php"><i class="fa fa-plus-square"></i> Estagiário</a></li>
                <li><a href="../monitor.php"><i class="fa fa-plus-square"></i> Monitores</a></li>
                <li><a href="../../reserva_sala/reservar-sala-segunda.php"><i class="fa fa-plus-square"></i> Reservar Sala</a></li>
            </ul>
            </li>
        </section>
        <!-- /.sidebar -->
      </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          CLÍNICA PSICOLOGIA
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Gerenciar</a></li>
          <li class="active">Editar Professor</li>
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
            <h3 class="box-title">PROFESSOR</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">

            <!-- AQUI COMEÇA SUA APLICAÇÃO -->


            <div class="container">
              <div class="text-center mb-4">
                <h3>Editar cadastro do professor</h3>
                <p class="text-muted">Clique em "atualizar" para atualizar alguma informação</p>
              </div>
              <br>
              <?php
              $sql = "SELECT tbl_professor.*, tbl_disponibilidade.*
                      FROM  tbl_professor
                      JOIN tbl_disponibilidade
                      ON tbl_professor.id_disponibilidade = tbl_disponibilidade.id 
                      WHERE tbl_professor.id = $id";
              $result = mysqli_query($mysqli, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>

              <div class="container-fluid divForm">
                <form action="" method="post">

                  <div class="container-fluid">

                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control custom-input" name="nome" value="<?php echo $row['nome']; ?>">


                    <label class="form-label">Usuario:</label>
                    <input type="text" class="form-control custom-input custom-input" name="usuario" value="<?php echo $row['usuario']; ?>">


                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control custom-input" name="email" value="<?php echo $row['email']; ?>">

                    <label class="form-label">Disponibilidade:</label>
                    <select class="form-control custom-input" name="disponibilidade" required id="inputDisponibilidade3">
                          <option value="<?php echo $row['id_disponibilidade'] ?> ">
                            <?php echo $row['disponibilidade'];?>
                          </option>

                          <option  value=" <?php echo ($row['id_disponibilidade'] == 2) ? '1' : '2' ?>">
                            <?php echo ($row['id_disponibilidade'] == 2) ? 'Disponível' : 'Indisponível' ?>
                          </option>
                    </select>
                    
                    <br>
                    <div>
                      <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                      <a href="../professores.php" class="btn btn-danger">Cancelar</a>
                    </div>
                  </div>
                </form> <br>
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
      <strong>CLÍNICA DE PSICOLOGIA <br> Equipe de desenvolvimento da Estácio de Sá | Laboratório de Transformação Digital.</strong>
    </footer>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../../../bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../../../plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../../dist/js/demo.js"></script>
  <!-- <script>
    document.getElementById("submit").addEventListener("click", function() {
      document.getElementById("cancelar").click();
    })
  </script> -->


</body>

</html>