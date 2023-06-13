<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
        <b>Time: </b><b id="vhour">0:00:00</b>
    </div>
    <div class="float-right d-none d-sm-inline">
        <b>Version</b> 1.0 &nbsp;
    </div>
    <strong>IWANNA SMS &copy; <?php echo date("Y"); ?></strong> All rights reserved.
</footer>
<!-- luxon -->
<script src="<?= base_url('public/plugins/luxon/luxon.min.js'); ?>"></script>
<script>
    const TIME_NOW = () => {
        const DATE_TIME = luxon.DateTime;
        let data = DATE_TIME.now().setZone('America/Bogota').toFormat("TT");
        document.getElementById('vhour').innerHTML = `${data} GMT -5`;
    }
    TIME_NOW();
    setInterval(TIME_NOW, 1000);
</script>