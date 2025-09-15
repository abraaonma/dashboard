<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apps Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #5b6bf0;
            --secondary-color: #f5f7ff;
            --text-color: #333344;
            --light-text: #767789;
            --background: #ffffff;
            --menu-hover: #eaedff;
            --border-color: #e2e4e8;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            background-color: var(--secondary-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            background-color: var(--background);
            padding: 1rem;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .menu-toggle {
            display: block;
            font-size: 1.5rem;
            background: none;
            border: none;
            color: var(--primary-color);
            cursor: pointer;
        }

        /* Main Layout */
        .container {
            display: flex;
            flex: 1;
        }

        /* Sidebar Menu */
        .sidebar {
            background-color: var(--background);
            width: 250px;
            padding: 1.5rem 1rem;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
            z-index: 90;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            margin-bottom: 0.5rem;
        }

        .sidebar a {
            display: block;
            padding: 0.8rem 1rem;
            text-decoration: none;
            color: var(--text-color);
            border-radius: 6px;
            transition: all 0.2s;
        }

        .sidebar a:hover {
            background-color: var(--menu-hover);
        }

        .sidebar a.active {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }

        /* Main Content */
        .content {
            flex: 1;
            padding: 1.5rem;
            background-color: var(--secondary-color);
        }

        .page-title {
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        .card {
            background-color: var(--background);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
        }

        /* Footer */
        footer {
            background-color: var(--background);
            text-align: center;
            padding: 1rem;
            color: var(--light-text);
            font-size: 0.9rem;
            border-top: 1px solid var(--border-color);
        }

        /* Responsividade - Mobile First */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                position: fixed;
                top: 60px;
                bottom: 0;
                transform: translateX(-100%);
                overflow-y: auto;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .content {
                margin-top: 0;
                padding: 1rem;
            }
        }

        @media (min-width: 769px) {
            .menu-toggle {
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
    // Definir a página atual (pode ser obtida via URL)
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
    
    // Definir o título da página com base na seleção
    $pageTitles = [
        'dashboard' => 'Dashboard Principal',
        'analytics' => 'Análises e Estatísticas',
        'settings' => 'Configurações',
        'profile' => 'Meu Perfil',
        'messages' => 'Mensagens'
    ];
    
    $pageTitle = isset($pageTitles[$currentPage]) ? $pageTitles[$currentPage] : 'Dashboard';
    ?>
    
    <header>
        <div class="logo">Apps</div>
        <button class="menu-toggle" id="menuToggle">☰</button>
    </header>
    
    <div class="container">
        <aside class="sidebar" id="sidebar">
            <ul>
                <li><a href="?page=dashboard" class="<?php echo $currentPage == 'dashboard' ? 'active' : ''; ?>">Dashboard</a></li>
                <li><a href="?page=analytics" class="<?php echo $currentPage == 'analytics' ? 'active' : ''; ?>">Analytics</a></li>
                <li><a href="?page=settings" class="<?php echo $currentPage == 'settings' ? 'active' : ''; ?>">Settings</a></li>
                <li><a href="?page=profile" class="<?php echo $currentPage == 'profile' ? 'active' : ''; ?>">Profile</a></li>
                <li><a href="?page=messages" class="<?php echo $currentPage == 'messages' ? 'active' : ''; ?>">Messages</a></li>
            </ul>
        </aside>
        
        <main class="content">
            <h1 class="page-title"><?php echo $pageTitle; ?></h1>
            
            <div class="card">
                <h2>Bem-vindo ao Dashboard Apps</h2>
                <p>Esta é a página <?php echo $pageTitle; ?>. Selecione outras opções no menu para navegar.</p>
            </div>
            
            <div class="card">
                <h2>Conteúdo da Página</h2>
                <p>Este dashboard foi desenvolvido com princípio mobile-first e pode ser utilizado como base para diversos projetos.</p>
                <p>O menu à esquerda mantém o controle da página atual e se adapta a diferentes tamanhos de tela.</p>
            </div>
        </main>
    </div>
    
    <footer>
        <p>&copy; v1.0.1 - Developed By Abraão Azevedo</p>
    </footer>

    <script>
        // Toggle do menu em dispositivos móveis
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
        });
        
        // Fechar o menu ao clicar em um link (em mobile)
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    document.getElementById('sidebar').classList.remove('open');
                }
            });
        });
    </script>
</body>
</html>
