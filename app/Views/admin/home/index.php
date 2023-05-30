<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('layout/nav'); ?>
<h1>Welcome <?= session()->get('username') ?></h1>
<?= $this->endSection() ?>