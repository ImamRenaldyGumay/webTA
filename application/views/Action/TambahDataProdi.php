<!-- ========================================================================================================== -->
<!-- Start Content Tambah Data Prodi -->
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
            <li class="breadcrumb-item"><a href="<?= base_url('DataProdi') ?>">Data Prodi</a></li>
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
      <div class="card card-primary card-outline">
        <form action="<?= base_url('TambahDataProdi') ?>" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="id_fakultas">Nama Fakultas</label>
              <select name="id_fakultas" id="id_fakultas" class="form-control">
                <option>Select Menu</option>
                <?php foreach ($fakultas as $f) : ?>
                  <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('id_fakultas', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="nama_prodi">Nama Program Studi</label>
              <input type="text" class="form-control" id="nama_prodi" name="nama_prodi">
              <?= form_error('nama_prodi', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer justify-content-between">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Tambah</button>
            <a href="<?= base_url('DataProdi') ?>" class="btn btn-default">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Tambah Data Prodi -->
<!-- ========================================================================================================== -->