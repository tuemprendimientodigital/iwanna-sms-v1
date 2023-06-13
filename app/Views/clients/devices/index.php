<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
Devices
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<?= $this->include('layout/datatables/css'); ?>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<?= $this->include('layout/datatables/js'); ?>
<script src="<?= base_url('public/js/clients/devices/configTable.js'); ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('clients/layout/nav'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Devices</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped text-center" id="devices">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sn</th>
                                        <th>Model</th>
                                        <th>Ports</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>url</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>