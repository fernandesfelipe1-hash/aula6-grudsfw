<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Painel') | Admin</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">

    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .main-sidebar {
            background: linear-gradient(180deg, #1f2d3d 0%, #16222e 100%);
        }

        .brand-link {
            border-bottom: 1px solid rgba(255,255,255,.08) !important;
        }

        .brand-text {
            font-weight: 700 !important;
            letter-spacing: .4px;
        }

        .nav-sidebar .nav-link {
            border-radius: .65rem;
            margin: 2px 8px;
            transition: all .2s ease-in-out;
        }

        .nav-sidebar .nav-link:hover {
            background-color: rgba(255,255,255,.08);
        }

        .nav-sidebar .nav-link.active {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #fff !important;
            box-shadow: 0 6px 18px rgba(0, 123, 255, .22);
        }

        .content-wrapper {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
        }

        .card .card-header {
            border-bottom: 1px solid #f1f1f1;
        }

        .btn {
            border-radius: .65rem;
        }

        .form-control,
        .input-group-text,
        .custom-select {
            border-radius: .65rem;
        }

        .table thead th {
            border-bottom: 0;
            font-size: .87rem;
            text-transform: uppercase;
            letter-spacing: .03em;
        }

        .user-panel img {
            border: 2px solid rgba(255,255,255,.15);
        }

        .content-header h1 {
            font-size: 1.8rem;
        }

        .main-footer {
            font-size: .95rem;
            background: #fff;
            border-top: 1px solid #e9ecef;
        }

        .page-subtitle {
            color: #6c757d;
            margin-top: .25rem;
        }
    </style>

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" title="Recolher menu">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item d-none d-sm-inline-block mr-2">
                <span class="text-muted small">Bem-vindo ao painel administrativo</span>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user-circle fa-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow border-0">
                    <span class="dropdown-item dropdown-header">Conta do Usuário</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Meu perfil
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog mr-2"></i> Configurações
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Sair
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link text-center">
            <span class="brand-text font-weight-light">Meu Sistema</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- User panel -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                <div class="image">
                    <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
                         class="img-circle elevation-2"
                         alt="Usuário">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Administrador</a>
                    <small class="text-muted">Painel interno</small>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header text-uppercase">Cadastros</li>

                    <li class="nav-item">
                        <a href="{{ route('categorias.index') }}"
                           class="nav-link {{ request()->routeIs('categorias.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Categorias</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('produtos.index') }}"
                           class="nav-link {{ request()->routeIs('produtos.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Produtos</p>
                        </a>
                    </li>

                    <li class="nav-header text-uppercase">Outros</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Relatórios</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Configurações</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Conteúdo -->
    @yield('content')

    <!-- Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            AdminLTE 3
        </div>
        <strong>&copy; {{ date('Y') }} Meu Sistema.</strong> Todos os direitos reservados.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- jQuery -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- OverlayScrollbars -->
<script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>