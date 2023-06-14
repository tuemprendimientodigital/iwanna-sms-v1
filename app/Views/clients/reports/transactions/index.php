<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
Ports
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<?= $this->include('layout/datatables/css'); ?>
<?= $this->include('clients/reports/layout/css') ?>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<?= $this->include('layout/datatables/js'); ?>
<?= $this->include('clients/reports/layout/js') ?>
<script src="<?= base_url('public/js/clients/reports/transactions/configTable.js'); ?>"></script>
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
                        <h3 class="card-title">Transactions</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <!-- Date -->
                            <form action="<?= base_url('dashboard/reports/transactions'); ?>" id="date-range" method="post">
                                <div class="input-group">
                                    <div class="form-group mb-0">
                                        <div class="input-group date" id="from" data-target-input="nearest">
                                            <label class="mb-0 align-self-center  px-2" for="from">From:</label>
                                            <input type="text" name="from" id="from-input" value="<?= date('d/m/Y') ?>" class="form-control datetimepicker-input" data-target="#from" />
                                            <div class="input-group-append" data-target="#from" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="input-group date " id="to" data-target-input="nearest">
                                            <label class="mb-0 align-self-center px-2" for="to">To:</label>
                                            <input type="text" name="to" id="to-input" value="<?= date('d/m/Y') ?>" class="form-control datetimepicker-input" data-target="#to" />
                                            <div class="input-group-append" data-target="#to" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary ml-2">Query</button>
                                </div>

                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped text-center" id="transactions">
                                <thead>
                                    <tr>
                                        <th>SMS Date</th>
                                        <th>Services</th>
                                        <th>Phone</th>
                                        <th>Price</th>
                                        <th>Status</th>
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