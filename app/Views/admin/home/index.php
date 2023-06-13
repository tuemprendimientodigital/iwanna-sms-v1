<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('layout/nav'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <h1>Welcome <?= session()->get('username') ?></h1>
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>