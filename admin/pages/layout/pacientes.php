<?php
    include('../../protect.php');
    include('../../../db/conexao.php');
    include('../../contador.php');
    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CLÍNICA | ADMIN</title>
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

<!-- Font Awesome -->

  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index.php" class="logo">
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
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">CLINICA MENU</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
              </ul>
              <ul class="treeview-menu">
                <li class=""><a href="../../logout.php"><i class="fa fa-dashboard"></i> Sair</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i>
                <span>Cadastrar paciente</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="cadastro/cadastrar-paciente-adulto.php"><i class="fa fa-plus-square"></i> Adulto</a></li>
                  <li><a href="cadastro/cadastrar-paciente-crianca.php"><i class="fa fa-plus-square"></i> Criança</a></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-gears"></i>
                <span>Gerenciar</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="pacientes.php"><i class="fa fa-plus-square"></i> Pacientes</a></li>
                <li><a href="professores.php"><i class="fa fa-plus-square"></i> Professores</a></li>
                <li><a href="terapeutas.php"><i class="fa fa-plus-square"></i> Estagiários</a></li>
                <li><a href="monitor.php"><i class="fa fa-plus-square"></i> Monitores</a></li>
                <li><a href="../reserva_sala/reservar-sala-segunda.php"><i class="fa fa-plus-square"></i> Reservar Sala</a></li>
              </ul>
            </li>
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            CLINICA PSICOLOGIA
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Gerenciar</a></li>
            <li class="active">Pacientes</li>
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

            <style>
                #msg{
                    color: green;
                }
            </style>

            <?php
                if (isset($_GET['msg'])) {
                    $mensagem = $_GET['msg'];
                    echo "<h5 class='box-title' id='msg'>$mensagem</h5><br><br>";
                }
            ?>
              <h3 class="box-title">PACIENTES</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

            <!-- AQUI COMEÇA SUA APLICAÇÃO -->


  <div>
    
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Nascimento</th>
          <th scope="col">Telefone</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
            //$sql = "SELECT * FROM filiais WHERE id_aprovacao = 2";
            $sql = "SELECT p.id, p.nome, p.cpf, p.nascimento, c.celular FROM tbl_paciente p INNER JOIN tbl_contato c ON p.id_contato = c.id";
            $result = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row["nome"] ?></td>
                <td><?php echo date('d/m/Y', strtotime($row["nascimento"])) ?></td>
                <td><?php echo $row["celular"] ?></td>
                <td>
                <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa fa-edit"></i></a>
                <a href="delete/delete-paciente.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
            <!-- <a href="../calendar.php"></a> -->
        <?php
            }
        ?>
      </tbody>
    </table>
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
