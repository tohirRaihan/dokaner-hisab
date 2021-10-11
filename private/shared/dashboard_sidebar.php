<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= url_for('assets/dashboard_assets/images/note-book.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-uppercase">Dokaner <span class="font-weight-bold">Hisab</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-header bg-gray">MAIN NAVIGATION</li>
                <li class="nav-item">
                    <a href="<?= url_for('dashboard/index.php') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= url_for('dashboard/items/index.php') ?>" class="nav-link">
                        <i class="nav-icon fa fa-bars"></i>
                        <p>
                            Items
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= url_for('dashboard/orders/index.php') ?>" class="nav-link">
                        <i class="nav-icon fa fa-gift"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= url_for('dashboard/sales/index.php') ?>" class="nav-link">
                        <i class="nav-icon fa fa-chart-line"></i>
                        <p>
                            Sales
                        </p>
                    </a>
                </li>
                <li class="nav-header bg-gray">SETTINGS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-gray card-outline mt-5">
            <div class="card-header">
                <h3 class="card-title"><?= $page_title ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
