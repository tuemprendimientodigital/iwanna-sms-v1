<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::.. <?= $this->renderSection('title'); ?> | DASHBOARD ..::</title>
    <?= $this->include('layout/css'); ?>
    <?= $this->include('layout/js'); ?>
    <script>
        const URL_HOST = "<?php echo base_url(); ?>";
        // AJAX
        const QUERY_AJAX = (dataQuery) => {
            return $.ajax({
                data: dataQuery.data,
                type: "POST",
                dataType: "json",
                url: dataQuery.url,
            });
        };
    </script>
    <?= $this->renderSection('js') ?>
</head>

<body class="hold-transition layout-top-nav layout-footer-fixed">
    <div class="wrapper">
        <?= $this->renderSection('content') ?>
    </div>
</body>

</html>