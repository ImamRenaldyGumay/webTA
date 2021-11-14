<!-- ========================================================================================================== -->
<!-- Start Content Tambah Data Fakultas -->
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
            <li class="breadcrumb-item"><a href="<?= base_url('DataFakultas') ?>">Data Fakultas</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card card-primary card-outline">
      <form action="<?= base_url('TambahDataFakultas') ?>" method="POST">
        <div class="card-body">
          <div class="col-md-5 mt-2">
            <div class="form-group">
              <label for="nama_fakultas">Nama Fakultas</label>
              <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas">
              <?= form_error('nama_fakultas', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer justify-content-between">
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
          <a href="<?= base_url('DataFakultas') ?>" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Tambah Data Fakultas -->
<!-- ========================================================================================================== -->