<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="<?= base_url('public/js/clients/home/configHome.js'); ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('layout/nav'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Incoming Today -->
                <div class="col-md-3 col-lg-3 col-12">
                    <!-- Info-box -->
                    <div class="info-box mb-0">
                        <span class="info-box-icon bg-primary"><i class="fa-solid fa-sack-dollar"></i></span>
                        <!-- Info Box Content -->
                        <div class="info-box-content">
                            <span class="info-box-text">Incoming Today</span>
                            <span class="info-box-number" id="incomingToday">$0</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.incoming today -->
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <!-- Container -->
        <div class="container-fluid">
            <!-- Card -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4 class="card-title m-0">Devices</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row justify-content-center" id="devices"></div>
                </div>
                <!-- /.card body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>