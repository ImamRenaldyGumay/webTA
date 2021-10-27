<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h1"><b>Beasiswa</b> UNSRI</p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Selamat Datang para calon penerima Beasiswa</p>

                <form action="<?= base_url('Auth/Login') ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> -->
                <p class="mb-0">
                    <a href="<?= base_url('Auth/Register') ?>" class="text-center">Belum punya Akun? Klik saya</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->