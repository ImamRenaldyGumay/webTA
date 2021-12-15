<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Instruktur') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Halaman <?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card mb-3 col-lg-8">
      <!-- <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div> -->
      <div class="card-body">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="card-img">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <p class="card-text">Nama : <?= $user['nama']; ?></p>
              <p class="card-text">Email : <?= $user['email']; ?></p>
              <p class="card-text">Sebagai : <?= $user['role']; ?></p>
              <!-- <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p> -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <!-- <div class="card-footer">
        Footer
      </div> -->
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->