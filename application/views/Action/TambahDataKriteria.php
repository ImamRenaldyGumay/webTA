<!-- ========================================================================================================== -->
<!-- Start Content Tambah Data Kriteria -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Halaman <?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('DataKriteria') ?>">Data Kriteria</a></li>
            <li class="breadcrumb-item active">Halaman <?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header border-0">
        <a href="<?= base_url('DataKriteria') ?>" class="btn btn-primary float-right">
          <i class="fas fa-undo-alt"></i>
          Back
        </a>
      </div>
      <form action="<?= base_url('TambahDataKriteria') ?>" method="POST">
        <div class="card-body">
          <div class="col-md-10">
            <div class="form-group">
              <label for="nama_kriteria">Nama Kriteria</label>
              <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
              <?= form_error('nama_kriteria', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Tambah Data Kriteria -->
<!-- ========================================================================================================== -->