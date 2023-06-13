<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
Ports
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<?= $this->include('layout/datatables/css'); ?>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<?= $this->include('layout/datatables/js'); ?>
<script>
    const ID_DEVICE = "<?= ($device != null) ? $device->id : ''; ?>";
</script>
<script src="<?= base_url('public/js/clients/ports/configTable.js'); ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('clients/layout/nav'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= ($device != null) ? $device->model : '&nbsp;'; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped text-center" id="ports">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Port</th>
                                    <th>Type</th>
                                    <th>Phone</th>
                                    <th>Imsi</th>
                                    <th>Signal</th>
                                    <th>Profit</th>
                                    <th>Services</th>
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
<!-- /.content-wrapper -->
<?= $this->endSection() ?>