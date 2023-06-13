<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::.. Login ..::</title>
    <?= $this->include('layout/css'); ?>
</head>

<body>
    <div class="login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <img src="<?= base_url('public/img/logo.png'); ?>" class="img-fluid">
                </div>
                <div class="card-body">
                    <?php if (session('msg')) : ?>
                        <div class="alert alert-<?= session('msg.type') ?>" role="alert">
                            <?= session('msg.body'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url(route_to('signin')); ?>" method="POST">
                        <p class="text-danger"><?= session('errors.username') ?></p>
                        <div class="input-group mb-3">
                            <input type="username" name="username" class="form-control" placeholder="Username" autocomplete="on" value="<?= old('username') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger"><?= session('errors.password') ?></p>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="on">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary btn-block" value="Signin">
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</body>

</html>