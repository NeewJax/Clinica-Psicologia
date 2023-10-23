<?php
    include('../../protect.php');
    include('../../../db/conexao.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SINTRACEMA | afiliados</title>
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

    <link rel="shortcut icon" href="../../../img/favicon.png" type="image/x-icon">
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
            <input type="text" name="q" class="form-control" placeholder="Search...">
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
            <ul class="treeview-menu">
              <li class=""><a href="../../../index.php" target="_blank"><i class="fa fa-dashboard"></i> Voltar</a></li>
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
              <li class="active"><a href="afiliadosAprovados.php"><i class="fa fa-plus-square"></i> Afiliados Aprovados</a></li>
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
            <li class="active">Visulizar Afiliados</li>
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
              <h3 class="box-title">TITULO DA APLICAÇÃO</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

            <!-- AQUI COMEÇA SUA APLICAÇÃO -->

            <form method="GET" action="idstats.php">
                <label for="name">ID</label><br>
                <input type="text" name="id" placeholder="ID" required/><br>
                <label>Server</label><br>
			    <select name="server">
				    <option value="mx1">MX1</option> 
                    <option value="de2">DE2</option>
                    <option value="de4">DE4</option>
                    <option value="es1">ES1</option>
                    <option value="fr1">FR1</option>
                    <option value="int2">GA1</option>
                    <option value="int6">GA2</option>
                    <option value="gbl1">GBL1</option>
                    <option value="int1">INT1</option>
                    <option value="int5">INT5</option>
                    <option value="int7">INT7</option>
                    <option value="int11">INT11</option>
                    <option value="int14">INT14</option>
                    <option value="pl3">PL3</option>
                    <option value="ru1">RU1</option>
                    <option value="ru5">RU5</option>
                    <option value="tr3">TR3</option>
                    <option value="tr4">TR4</option>
                    <option value="tr5">TR5</option>
                    <option value="us2">US2</option>
			    </select><br><br>
                <input type="submit" value="Find stats"/>
            </form>
            
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
