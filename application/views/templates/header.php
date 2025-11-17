<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>E-library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

  <meta name="title" content="AdminLTE v4 | Dashboard" />
  <meta name="author" content="ColorlibHQ" />
  <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard..." />
  <meta name="keywords" content="bootstrap 5, admin dashboard, accessible admin panel, WCAG compliant" />

  <meta name="supported-color-schemes" content="light dark" />

  <!-- Preload CSS -->
  <link rel="preload" href="<?= base_url('assets/template/dist/css/adminlte.css') ?>" as="style" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" media="print" onload="this.media='all'" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/adminlte.css') ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" crossorigin="anonymous" />

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-mini  bg-body-tertiary">
  <div class="app-wrapper">

    <!-- Navbar -->
    <nav class="app-header navbar navbar-expand bg-body">
      <div class="container-fluid">
        <!-- Sidebar Toggle -->
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" id="sidebarToggle">
              <i class="bi bi-list"></i>
            </a>
          </li>
        </ul>

        <!-- Right Navbar -->
        <ul class="navbar-nav ms-auto align-items-center">
          <!-- Fullscreen Button -->
          <li class="nav-item">
            <a class="nav-link" href="#" data-lte-toggle="fullscreen">
              <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
              <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
            </a>
          </li>

          <!-- User Dropdown -->
          <li class="nav-item dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?= base_url('assets/img/profile.jpg'); ?>" alt="Profile"
                class="rounded-circle shadow" style="width: 40px; height: 40px; object-fit: cover; filter: brightness(1.1);" />
              <div class="ms-2 d-none d-md-block">
                <div style="font-size: 0.9rem; font-weight: 500; color: #333;">Admin</div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li>
                <a class="dropdown-item text-danger fw-bold" href="<?= base_url('home') ?>">
                  <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Sidebar -->
    <aside class="app-sidebar shadow" style="background-color:#0d9488;" data-bs-theme="light">
      <div class="sidebar-brand">
        <a href="#" class="brand-link">
        <img src="<?= base_url('assets/img/logobuku.jpg'); ?>" 
      alt="Book"
      class="brand-image shadow rounded-circle" 
      style="filter: brightness(2) contrast(1.1);" />
          <span class="brand-text fw-light text-white"> PerpusKu</span>
        </a>
      </div>

      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">

            <li class="nav-item">
              <a href="<?= base_url('dashboard') ?>" class="nav-link">
                <i class="nav-icon bi bi-speedometer text-white"></i>
                <p class="text-white">Dashboard</p>
              </a>
            </li>

            <li class="nav-header text-white">MENU UTAMA</li>

            <li class="nav-item">
              <a href="<?= base_url('buku') ?>" class="nav-link">
                <i class="nav-icon bi bi-book-fill text-white"></i>
                <p class="text-white">Data Buku</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('kategori') ?>" class="nav-link">
                <i class="nav-icon bi bi-bookmark-fill text-white"></i>
                <p class="text-white">Kategori</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="<?= base_url('peminjaman')?>" class="nav-link">
                <i class="nav-icon bi bi-clipboard2-check-fill text-white"></i>
                <p class="text-white">
                  Manajemen Peminjaman
                </p>
              </a>
            </li>

            <!-- Tidak perlu Logout di sidebar lagi -->
          </ul>
        </nav>
      </div>
    </aside>
    


