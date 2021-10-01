<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <p class="h1"><b>Beasiswa</b> UNSRI</p>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Selamat Datang para calon penerima Beasiswa</p>

        <form action="<?= base_url('Auth/Register') ?>" method="post">
          <div class="form-group mb-3">
            <label for="nama">Full name</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group mb-3">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password1" name="password1">
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <!-- Form utk Retype Password -->
          <div class="form-group mb-3">
            <label for="password2">Retype password</label>
            <input type="password" class="form-control" id="password2" name="password2">
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="<?= base_url('Auth/Login') ?>" onclick="return confirm ('Yakin?');" class="text-center">Sudah Punya Akun</a>
        <a href="" onclick="AlertRegister()">aaa</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->