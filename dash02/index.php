<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apps Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #7209b7;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --text-color: #495057;
            --border-color: #dee2e6;
            --sidebar-width: 250px;
            --header-height: 60px;
            --footer-height: 40px;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f7fb;
            color: var(--text-color);
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            height: var(--header-height);
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1.5rem;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1001;
        }

        /* Main Content */
        .main-container {
            display: flex;
            flex: 1;
            margin-top: var(--header-height);
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed);
            z-index: 900;
            height: calc(100vh - var(--header-height));
            position: fixed;
            overflow-y: auto;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--text-color);
            transition: all 0.2s;
            border-left: 4px solid transparent;
        }

        .sidebar-menu a:hover {
            background-color: rgba(67, 97, 238, 0.05);
            color: var(--primary-color);
        }

        .sidebar-menu a.active {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
            font-weight: 500;
        }

        .sidebar-menu i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 25px;
            margin-left: var(--sidebar-width);
            transition: margin-left var(--transition-speed);
        }

        .page-title {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 20px;
            color: var(--dark-color);
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .page-title i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 25px;
        }

        .card h3 {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 15px;
            color: var(--secondary-color);
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .stat-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .stat-card .value {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .stat-card .label {
            color: var(--text-color);
            font-size: 0.9rem;
        }

        /* Footer */
        .footer {
            background: var(--dark-color);
            color: white;
            text-align: center;
            padding: 12px;
            height: var(--footer-height);
            font-size: 0.9rem;
        }

        /* Responsividade - Correção aplicada */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                top: var(--header-height);
                height: calc(100vh - var(--header-height));
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .overlay {
                position: fixed;
                top: var(--header-height);
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                display: none;
                z-index: 800;
            }

            .overlay.active {
                display: block;
            }
            
            /* Correção para garantir que o menu fique acima de tudo */
            .sidebar.active {
                z-index: 999;
            }
        }

        @media (max-width: 576px) {
            .header h1 {
                font-size: 1.2rem;
            }

            .content {
                padding: 15px;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }
            
            /* Garantir que o menu ocupe toda a largura em dispositivos muito pequenos */
            .sidebar {
                width: 100%;
            }
        }

        /* Estilos para orientação portrait (vertical) */
        @media (max-height: 600px) and (orientation: portrait) {
            .sidebar {
                overflow-y: auto;
            }
            
            .sidebar-menu {
                padding: 10px 0;
            }
            
            .sidebar-menu a {
                padding: 10px 15px;
            }
            
            /* Ajuste para garantir que o menu não fique cortado */
            .sidebar.active {
                height: calc(100vh - var(--header-height));
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <h1>Apps</h1>
        <div></div> <!-- Espaço para balancear o flexbox -->
    </header>

    <!-- Overlay para mobile -->
    <div class="overlay" id="overlay"></div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <ul class="sidebar-menu">
                <li>
                    <a href="?page=dashboard" class="<?php echo ($currentPage == 'dashboard') ? 'active' : ''; ?>">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="?page=analytics" class="<?php echo ($currentPage == 'analytics') ? 'active' : ''; ?>">
                        <i class="fas fa-chart-line"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="?page=users" class="<?php echo ($currentPage == 'users') ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="?page=settings" class="<?php echo ($currentPage == 'settings') ? 'active' : ''; ?>">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="?page=messages" class="<?php echo ($currentPage == 'messages') ? 'active' : ''; ?>">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                    </a>
                </li>
                <li>
                    <a href="?page=files" class="<?php echo ($currentPage == 'files') ? 'active' : ''; ?>">
                        <i class="fas fa-file"></i>
                        <span>Files</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <main class="content">
            <?php
            // Determinar a página atual
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            
            // Mapear páginas para títulos
            $pageTitles = [
                'dashboard' => 'Dashboard',
                'analytics' => 'Analytics',
                'users' => 'User Management',
                'settings' => 'Settings',
                'messages' => 'Messages',
                'files' => 'File Manager'
            ];
            
            // Obter o título da página atual
            $pageTitle = isset($pageTitles[$currentPage]) ? $pageTitles[$currentPage] : 'Dashboard';
            
            // Mapear páginas para ícones
            $pageIcons = [
                'dashboard' => 'fas fa-home',
                'analytics' => 'fas fa-chart-line',
                'users' => 'fas fa-users',
                'settings' => 'fas fa-cog',
                'messages' => 'fas fa-envelope',
                'files' => 'fas fa-file'
            ];
            
            // Obter o ícone da página atual
            $pageIcon = isset($pageIcons[$currentPage]) ? $pageIcons[$currentPage] : 'fas fa-home';
            ?>
            
            <h1 class="page-title">
                <i class="<?php echo $pageIcon; ?>"></i>
                <?php echo $pageTitle; ?>
            </h1>

            <div class="stats-container">
                <div class="stat-card">
                    <i class="fas fa-user"></i>
                    <span class="value">1,254</span>
                    <span class="label">Total Users</span>
                </div>
                <div class="stat-card">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="value">542</span>
                    <span class="label">Daily Orders</span>
                </div>
                <div class="stat-card">
                    <i class="fas fa-chart-bar"></i>
                    <span class="value">$9,254</span>
                    <span class="label">Revenue</span>
                </div>
                <div class="stat-card">
                    <i class="fas fa-comment"></i>
                    <span class="value">236</span>
                    <span class="label">Support Requests</span>
                </div>
            </div>

            <div class="card">
                <h3>Welcome to Your Dashboard</h3>
                <p>This is a responsive dashboard template built with a mobile-first approach. You can use this as a starting point for your projects.</p>
                <p>Select different menu items to see the active state changes.</p>
            </div>

            <div class="card">
                <h3>Recent Activity</h3>
                <p>No recent activity to display. This section can be customized based on your application needs.</p>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; v1.0.1 - Developed By Your Name
    </footer>

    <script>
        // Menu toggle para mobile
        document.getElementById('menuToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            
            // Impedir scroll do body quando o menu estiver aberto
            document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
        });

        // Fechar o menu ao clicar no overlay
        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('active');
            this.classList.remove('active');
            document.body.style.overflow = ''; // Restaurar scroll
        });

        // Fechar o menu ao redimensionar a janela (se for maior que mobile)
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            if (window.innerWidth > 992) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = ''; // Restaurar scroll
            }
        });

        // Fechar o menu ao clicar em um link (em dispositivos móveis)
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 992) {
                    document.getElementById('sidebar').classList.remove('active');
                    document.getElementById('overlay').classList.remove('active');
                    document.body.style.overflow = ''; // Restaurar scroll
                }
            });
        });
    </script>
</body>
</html>
