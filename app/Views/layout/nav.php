<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white navbar-fixed">
    <div class="container">
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Left navbar links -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard/home'); ?>" class="nav-link">Home</a>
                </li>
            </ul>
        </div>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTwo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= session('username') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownTwo">
                    <a class="dropdown-item" href="<?= base_url('auth/signout'); ?>">Signout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->