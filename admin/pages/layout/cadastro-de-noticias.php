<?php
    include('../../protect.php');
    include('../../../db/conexao.php');
?>

<?php
if(isset($_POST['criar'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem = $_FILES['imagem'];

    if($imagem['error'])
        die("Falha ao enviar o arquivo");

    if ($imagem['size'] > 2097152)
        die("Arquivo muito grande! Max: 2MB");

    $pasta = "noticias/";
    $nomedoarquivo = $imagem['name'];
    $novonomedoarquivo = uniqid();
    $extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));

    if($extensao != 'jpg' && $extensao != 'png')
        die("Formato de arquivo não aceito!");

        $path = $pasta . $novonomedoarquivo . '.' . $extensao;


    $deu_certo = move_uploaded_file($imagem["tmp_name"], $path);
    if($deu_certo) {
        $mysqli->query("INSERT INTO noticias (titulo, descricao, caminho) VALUES ('$titulo', '$descricao', '$path')");
        header("Location: cadastro-de-noticias.php?msg=Notícia realizada com sucesso");
    }
    else {
        echo "<p>Falha ao enviar o arquivo!</p>";
    }

    $query = "INSERT INTO noticias (titulo, descricao, caminho) VALUES ('$titulo', '$descricao', '$path')";

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SINTRACEMA | Cadastrar notícias</title>
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
                <li class="active"><a href="noticias.php"><i class="fa fa-plus-square"></i> Notícias</a></li>
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
            <li class="active">Cadastrar Notícias</li>
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


              <h3 class="box-title">Cadastramento de notícias</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

            <!-- AQUI COMEÇA SUA APLICAÇÃO -->

            <form enctype="multipart/form-data" method="POST">
            <div id="cad-info" name="cad-info" class="cad-info">
              <label for="titulo-noticia" class="lead">Titulo</label><span title="Titulo da noticia"><svg class="info-input" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg></span>
        <input type="text" required placeholder="Titulo da noticia" name="titulo"  class="form-control" aria-label="default input example">
        <br>
        <label for="link-noticia" class="lead">Imagem da notícia</label><span title="Link para a postagem da noticia"><svg class="info-input" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg></span>
        <input type="file" name="imagem" class="form-control" aria-label="default input example">
        <br>
        <label for="descricao-noticia" class="lead">Descrição</label><span title="Descricao pequena sobre o teor da noticia"><svg class="info-input" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg></span>
        <textarea name="descricao" required placeholder="descreva a notícia" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div id="new-cad-info" name="new-cad-info" class="new-cad-info">
        <br>
        <input type="submit" name="criar" class="btn btn-success" value="Cadastrar notícia">
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
