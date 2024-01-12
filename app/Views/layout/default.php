<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/node_modules/@fortawesome\fontawesome-free\css\all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assets/css/components.css">
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="<?= base_url() ?>/assets/assets/img/avatar/avatar-1.png"
                             class="rounded-circle mr-1">
<!--                        --><?php //= userLogin()->nama_dosen ?>
                        <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->get('username_user'); ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
<!--                        <a href="--><?php //= site_url('profile') ?><!--" class="dropdown-item has-icon">-->
<!--                            <i class="fas fa-user-cog"></i> Profile-->
<!--                        </a>-->
<!--                        <a href="--><?php //= site_url('profile') ?><!--" class="dropdown-item has-icon">-->
<!--                            <i class="fas fa-lock"></i> Password-->
<!--                        </a>-->
                        <div class="dropdown-divider"></div>
                        <a href="<?= site_url('login/logout') ?>" class="dropdown-item has-icon text-danger" id="logout"
                           data-confirm="Logout?|Yakin keluar aplikasi?" data-confirm-yes="returnLogout()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="<?= site_url('home/index') ?>">Seminar Proposal</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="<?= site_url('home/index') ?>"><img src="<?= base_url() ?>/assets/assets/img/avatar/logo.svg" alt="logo" width=25></a>
                </div>
                <ul class="sidebar-menu">
                    <?= $this->include("layout/menu") ?>
                </ul>

                <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                  <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                  </a>
                </div> -->
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <?= $this->renderSection('content') ?>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2023
                <div class="bullet">Developed By</div>
                <a href="https://nauv.al/">Setyo Adi Sasono</a>
            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url() ?>/assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/assets/js/stisla.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="<?= base_url() ?>/assets/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= base_url() ?>/assets/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/assets/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>
