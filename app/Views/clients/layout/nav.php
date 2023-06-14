<?= $this->section('list-nav') ?>
<!-- Start Reports -->
<li class="nav-item dropdown">
    <a id="menuReports" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Reports</a>
    <ul aria-labelledby="menuReports" class="dropdown-menu border-0 shadow">
        <li><a href="<?= base_url('dashboard/reports/transactions'); ?>" class="dropdown-item">Transactions</a></li>
    </ul>
</li>
<!-- Finish Reports -->
<li class="nav-item">
    <a href="<?php echo base_url(); ?>dashboard/devices" class="nav-link">Devices</a>
</li>
<?= $this->endSection() ?>
<?= $this->include('layout/nav'); ?>