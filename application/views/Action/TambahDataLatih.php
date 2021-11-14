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
            <li class="breadcrumb-item"><a href="<?= base_url('DataLatih') ?>">Data Latih</a></li>
            <li class="breadcrumb-item active">Halaman <?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="col-md-9">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Halaman <?= $title ?></h3>
        </div>
        <form action="<?= base_url('') ?>" method="POST">
          <div class="card-body">

            <div class="form-group">
              <label for="nim_mahasiswa">Nomor Induk Mahasiswa (NIM) </label>
              <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa">
              <?= form_error('nim_mahasiswa', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="nama_mahasiswa">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
              <?= form_error('nama_mahasiswa', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="nim_mahasiswa">Jenis Kelamin</label>
              <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa">
              <?= form_error('nim_mahasiswa', '<small class="text-danger pl-3">', '</small>') ?>
            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer justify-content-between">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Tambah</button>
            <a href="<?= base_url('DataLatih') ?>" class="btn btn-primary">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Tambah Data Fakultas -->
<!-- ========================================================================================================== -->