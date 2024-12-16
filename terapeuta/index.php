<?php
  include('../db/conexao.php');
  include('../admin/protect.php');
  include ('../admin/contador.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #f0f4f8;
        }

        .container {
            display: flex;
            width: 100%;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .sidebar .brand {
            padding: 20px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            background: #2980b9;
        }

        .sidebar .user {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #34495e;
        }

        .sidebar .user .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #bdc3c7;
            margin-right: 10px;
        }

        .sidebar .user .info {
            display: flex;
            flex-direction: column;
            font-size: 0.9rem;
        }

        .sidebar .user .status {
            color: #2ecc71;
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li {
            border-bottom: 1px solid #34495e;
        }

        .sidebar nav ul li a {
            display: block;
            color: #ecf0f1;
            text-decoration: none;
            padding: 15px 20px;
            transition: background 0.3s;
        }

        .sidebar nav ul li a:hover {
            background: #34495e;
        }

        .submenu {
            display: none; /* Esconde o submenu */
            background: #3d566e;
        }

        .submenu li a {
            padding-left: 40px;
            font-size: 0.9rem;
        }

        /* .submenu2 {
            display: none;
            background: #3d566e;
        }

        .submenu2 li a {
            padding-left: 40px;
            font-size: 0.9rem;
        } */

        /* .sidebar nav ul li:hover .submenu {
            display: block;
        } */

        /* Main Content */
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #ecf0f1;
        }

        .header {
            background: #2980b9;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
        }

        .header .greeting {
            font-size: 1.2rem;
        }

        .header .breadcrumb {
            font-size: 0.9rem;
        }

        .main-area {
            flex: 1;
            background: #fff;
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background: #bdc3c7;
            font-size: 0.9rem;
        }

        .nothing {
            display: none;
        }
    </style>
    <title>CLÍNICA | ESTAGIÁRIO</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="brand">
                <h1>CLÍNICA</h1>
            </div>
            <div class="user">
                <div class="avatar"></div>
                <div class="info">
                    <span>Estagiário</span>
                    <span class="status">Online</span>
                </div>
            </div>
            <nav class="menu">
                <ul>
                    <li class="menu-item" id="dashboard">
                        <a href="javascript:void(0)">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Home</a></li>
                            <li><a href="../index.php">Sair</a></li>
                        </ul>
                    </li>
                    <li class="menu-item" id="gerenciar">
                        <a href="javascript:void(0);">
                            <i class="fas fa-cog"></i> Gerenciar
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Reservar Sala</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="content">
            <header class="header">
                <div class="greeting">Painel estagiário <span class="morning">Bom dia!</span></div>
                <div class="breadcrumb">Home > Painel estagiário</div>
            </header>
            <section class="main-area">
                <!-- Conteúdo principal -->
            </section>
            <footer class="footer">
                <p><strong>CLÍNICA DE PSICOLOGIA</strong></p>
                <p>Equipe de desenvolvimento da Estácio de Sá | Laboratório de Transformação Digital.</p>
            </footer>
        </main>
    </div>
    <script>
        const dashboardMenu = document.getElementById('dashboard');
        const dashboardSubmenu = dashboardMenu.querySelector('.submenu');

        dashboardMenu.addEventListener('click', () => {
            if(dashboardSubmenu.style.display === 'block') {
                dashboardSubmenu.style.display = 'none'
            } else {
                dashboardSubmenu.style.display = 'block'
            }
        });

        const gerenciarMenu = document.getElementById('gerenciar');
        const genrenciarSubmenu = gerenciarMenu.querySelector('.submenu');

        gerenciarMenu.addEventListener('click', () => {
            if(genrenciarSubmenu.style.display === 'block') {
                genrenciarSubmenu.style.display = 'none';
            } else {
                genrenciarSubmenu.style.display = 'block';
            }
        });
    </script>
</body>
</html>