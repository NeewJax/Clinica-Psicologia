<?php
  include('../../protect.php');
  include('../../../db/conexao.php');
?>

<?php
$id = $_GET["id"];

if (isset($_POST["submit"])) {

    $nome = $_POST['nome'];
    $id_genero = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
    $logradouro = $_POST['localidade'];
    $id_escolaridade = $_POST['escolaridade'];
    $profissao = $_POST['profissao'];
    $id_renda_familiar = $_POST['renda_familiar'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $id_estado_civil = $_POST['estado_civil'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $id_endereco = $_POST['id_endereco'];
    $id_bairro = $_POST['bairro_id'];
    $id_logradouro = $_POST['logradouro_id'];
    $id_profissao = $_POST['profissao_id'];



    // Substituir os valores na query SQL

    $mysqli->query("UPDATE tbl_profissao SET profissao = '$profissao' WHERE id = $id_profissao");

    $mysqli->query("UPDATE tbl_logradouro SET logradouro = '$logradouro' WHERE id = $id_logradouro");

    $mysqli->query("UPDATE tbl_contato SET email ='$email', telefone = '$telefone' WHERE id_paciente = $id");

    $mysqli->query("UPDATE tbl_bairro SET bairro = '$bairro' WHERE id = $id_bairro");

    $mysqli->query("UPDATE tbl_endereco SET cep = '$cep' WHERE id = $id_endereco");
    
    $mysqli->query("UPDATE tbl_paciente SET nome = '$nome', nascimento = '$nascimento', rg = '$rg', cpf = '$cpf', 
                                id_genero = $id_genero, 
                                id_escolaridade = $id_escolaridade,
                                id_renda_familiar = $id_renda_familiar,
                                id_estado_civil = $id_estado_civil
                                WHERE id = $id");
  
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
        <span class="logo-mini"><b>CL</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>CLI</b>NICA</span>
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
          <li class="header">CLINICA MENU</li>
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
              <span class="label label-primary pull-right">2</span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="pacientes.php"><i class="fa fa-plus-square"></i> Pacientes</a></li>
                <li><a href="professores.php"><i class="fa fa-plus-square"></i> Professores</a></li>
                <li><a href="terapeutas.php"><i class="fa fa-plus-square"></i> Estagiário</a></li>
                <li><a href="monitor.php"><i class="fa fa-plus-square"></i> Monitores</a></li>
                <li><a href="../reserva_sala/reservar-sala-segunda.php"><i class="fa fa-plus-square"></i> Reservar Sala</a></li>
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
          CLÍNICA PSICOLOGIA
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Gerenciar</a></li>
          <li class="active">Editar Paciente</li>
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
            <h3 class="box-title">PACIENTE</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">

            <!-- AQUI COMEÇA SUA APLICAÇÃO -->


            <div class="container">
              <div class="text-center mb-4">
                <h3>Editar cadastro de paciente</h3>
                <p class="text-muted">Clique em "atualizar" para atualizar alguma informação</p>
              </div>
              <br>
              <?php
              $sql = "SELECT pa.id, pa.nome, pa.nascimento, pa.rg, pa.cpf, pa.id_genero, pa.id_escolaridade, pa.id_renda_familiar, 
                              pa.id_estado_civil, pa.id_endereco, se.sexo, en.id, en.cep, lo.logradouro, lo.id AS logradouro_id,
                              es.escolaridade, pr.profissao, pr.id AS profissao_id, re.renda, ec.estado_civil, ba.bairro, 
                              ba.id AS bairro_id, co.telefone, co.email
                      FROM tbl_paciente AS pa 
                      INNER JOIN tbl_genero se ON se.id = pa.id_genero
                      INNER JOIN tbl_endereco en ON en.id = pa.id_endereco
                      INNER JOIN tbl_logradouro lo ON lo.id = en.id
                      INNER JOIN tbl_escolaridade es ON es.id = pa.id_escolaridade
                      INNER JOIN tbl_profissao pr ON pr.id = pa.id_profissao
                      INNER JOIN tbl_renda_familiar re ON re.id = pa.id_renda_familiar
                      INNER JOIN tbl_estado_civil ec ON ec.id = pa.id_estado_civil
                      INNER JOIN tbl_bairro ba ON ba.id = en.id_bairro
                      INNER JOIN tbl_contato co ON co.id = pa.id_contato
                      WHERE pa.id = $id";
                      
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


                    <label class="form-label">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-control custom-input custom-input">
                        <option value="<?php echo $row['id_genero']; ?>" selected> <?php echo $row['sexo'] ?> </option>
                        <?php
                            $id_genero = $row['id_genero'];
                            $sql_genero = "SELECT * FROM tbl_genero WHERE id !=  $id_genero";
                            $result_genero = mysqli_query($mysqli, $sql_genero);
                            while ($rowSe = mysqli_fetch_assoc($result_genero)) {
                        ?>
                                <option value='<?php echo $rowSe['id'] ?>'> <?php echo $rowSe['sexo'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>


                    <!-- <label class="form-label">idade:</label>
                    <input type="text" class="form-control custom-input" name="idade" value="<?php echo $row['idade']; ?>"> -->


                    <label class="form-label">Nascimento:</label>
                    <input type="date" class="form-control custom-input" name="nascimento" value="<?php echo $row['nascimento']; ?>">


                    <label class="form-label">Localidade:</label>
                    <input type="text" class="form-control custom-input" name="localidade" value="<?php echo $row['logradouro']; ?>">
                    <input type="text" name='logradouro_id' class='id_oculto' value='<?php echo $row['logradouro_id'] ?>'>


                    <label class="form-label">Escolaridade:</label>
                    <select id="escolaridade" name="escolaridade" class="form-control custom-input">
                        <option value='<?php echo $row['id_escolaridade'] ?>' selected> <?php echo $row['escolaridade'] ?> </option>
                        <?php
                            $id_escolaridade = $row['id_escolaridade'];
                            $sql_escolaridade = "SELECT * FROM tbl_escolaridade WHERE id != $id_escolaridade";
                            $result_escolaridade = mysqli_query($mysqli, $sql_escolaridade);
                            while ($rowEs = mysqli_fetch_assoc($result_escolaridade)) {
                        ?>
                                <option value='<?php echo $rowEs['id'] ?>'> <?php echo $rowEs['escolaridade'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>


                    <label class="form-label">Profissão:</label>
                    <input type="text" class="form-control custom-input" name="profissao" value="<?php echo $row['profissao']; ?>">
                    <input type="text" name='profissao_id' class='id_oculto' value='<?php echo $row['profissao_id'] ?>'>


                    <label class="form-label">Renda Familiar</label>
                    <select id="renda_familiar" name="renda_familiar" class="form-control custom-input">
                              <option value='<?php echo $row['id_renda_familiar'] ?>' selected> <?php echo $row['renda'] ?> </option>
                              <?php
                                  $id_renda_familiar = $row['id_renda_familiar'];
                                  $sql_renda_familiar = "SELECT * FROM tbl_renda_familiar WHERE id != $id_renda_familiar";
                                  $result_renda_familiar = mysqli_query($mysqli, $sql_renda_familiar);
                                  while($rowRe = mysqli_fetch_assoc($result_renda_familiar)) {
                              ?>
                                      <option value='<?php echo $rowRe['id']?>'> <?php echo $rowRe['renda'] ?> </option>
                              <?php
                                  }
                              ?>
                      </select>


                    <label class="form-label">RG:</label>
                    <input type="text" class="form-control custom-input" name="rg" value="<?php echo $row['rg']; ?>">


                    <label class="form-label">CPF:</label>
                    <input type="text" class="form-control custom-input" maxlength="11" name="cpf" value="<?php echo $row['cpf']; ?>">


                    <label class="form-label">Estado Civil:</label>
                    <select id="estado_civil" name="estado_civil" class="form-control custom-input">
                        <option value='<?php echo $row['id_estado_civil'] ?>' selected> <?php echo $row['estado_civil'] ?> </option>
                        <?php
                            $id_estado_civil = $row['id_estado_civil'];
                            $sql_estado_civil = "SELECT * FROM tbl_estado_civil WHERE id != $id_estado_civil";
                            $result_estado_civil = mysqli_query($mysqli, $sql_estado_civil);
                            while ($rowEC = mysqli_fetch_assoc($result_estado_civil)) {
                        ?>
                                <option value='<?php echo $rowEC['id'] ?>'> <?php echo $rowEC['estado_civil'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>


                    <!-- <label class="form-label">Composição Familiar:</label>
                    <input type="text" class="form-control custom-input" name="composicao_familiar" value="<?php echo $row['composicao_familiar']; ?>"> -->


                    <!-- <label class="form-label">Mora com:</label>
                    <input type="text" class="form-control custom-input" name="mora_com" value="<?php echo $row['mora_com']; ?>"> -->


                    <!-- <label class="form-label">Endereço:</label>
                    <input type="text" class="form-control custom-input" name="endereco" value="<?php echo $row['endereco']; ?>"> -->
                    
                    <!-- FIM DOS CAMPOS ENDEREÇO  -->

                    <!-- <label class="form-label">Cidade:</label>
                    <input type="text" class="form-control custom-input" name="cidade" value="<?php echo $row['cidade']; ?>"> -->

                    <label class="form-label">Bairro:</label>
                    <input type="text" class="form-control custom-input" name="bairro" value="<?php echo $row['bairro']; ?>">
                    <input type="text" name='bairro_id' class='id_oculto' value='<?php echo $row['bairro_id'] ?>'>

                    <label class="form-label">CEP:</label>
                    <input type="text" class="form-control custom-input" name="cep" value="<?php echo $row['cep']; ?>">
                    <input type="text" name='id_endereco' class='id_oculto' value='<?php echo $row['id_endereco'] ?>'>


                    <!-- <label class="form-label">Telefone Residencial:</label>
                    <input type="text" class="form-control custom-input" name="telefone_residencial" value="<?php echo $row['telefone_residencial']; ?>">


                    <label class="form-label">Telefone Residencial:</label>
                    <input type="text" class="form-control custom-input" name="telefone_recado" value="<?php echo $row['telefone_recado']; ?>"> -->


                    <label class="form-label">Telefone:</label>
                    <input type="text" class="form-control custom-input" name="telefone" value="<?php echo $row['telefone']; ?>">


                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control custom-input" name="email" value="<?php echo $row['email']; ?>">

                    <br>
                    <div>
                      <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                      <a href="pacientes.php" class="btn btn-danger">Cancelar</a>
                    </div>
                  </div>
                </form> <br>

                <?php

                // $id_aprovacao = $row['id_aprovacao'];
                // if ($id_aprovacao == 2) {
                //   echo "<form class='formAprova' action='aprovar.php' method='post'>";
                //       echo "<input style='display:none' type='number' name='id' value='" . $id . "'>";

                //       echo "<button type='submit' class='btn btn-success'>Aprovar</button>";
                //   echo "</form>";
                // } else if ($id_aprovacao == 1){
                //   echo "<form class='formAprova' action='desaprovar.php' method='post'>";
                //       echo "<input style='display:none' type='number' name='id' value='" . $id . "'>";

                //       echo "<button type='submit' class='btn btn-danger desaprovar'>Desaprovar</button>";
                //   echo "</form>";
                // }
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