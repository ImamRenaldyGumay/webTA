<!-- ========================================================================================================== -->
<!-- Start Content Tambah Data Mahasiswa Hitung -->
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
            <li class="breadcrumb-item"><a href="<?= base_url('DataMahasiswaHitung') ?>">Data Mahasiswa Hitung</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
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
        <form action="<?= base_url('TambahDataMahasiswaHitung') ?>" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="nama_mahasiswa">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
              <?= form_error('nama_mahasiswa', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="nim_mahasiswa">Nomor Induk Mahasiswa</label>
              <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa">
              <?= form_error('nim_mahasiswa', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="0" selected disabled>Select Menu</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
              <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="id_fakultas">Fakultas</label>
              <select name="id_fakultas" id="id_fakultas" class="form-control">
                <option value="0" selected disabled>Select Menu</option>
                <?php foreach ($fakultas as $f) : ?>
                  <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('id_fakultas', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="id_prodi">Program Studi</label>
              <select name="id_prodi" id="id_prodi" class="form-control">
                <option value="0" selected disabled>Select Menu</option>
                <?php foreach ($prodi as $p) : ?>
                  <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('id_prodi', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C1">Masukkan IPK</label>
              <input type="text" class="form-control" id="C1" name="C1" placeholder="Harap masukkan ipk menggunakan . (titik) contoh 3.02">
              <?= form_error('C1', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C2">Pekerjaan Orang Tua</label>
              <select name="C2" id="C2" class="form-control">
                <option value="0" selected disabled>Select Menu</option>
                <?php foreach ($data_pekerjaan as $dp) : ?>
                  <option value="<?= $dp['nilai_pekerjaan']; ?>"><?= $dp['keterangan_pekerjaan']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('C2', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C3">Penghasilan Orang Tua</label>
              <select name="C3" id="C3" class="form-control">
                <option value="0" selected disabled>Select Menu</option>
                <?php foreach ($data_gaji as $dg) : ?>
                  <option value="<?= $dg['nilai_gaji']; ?>"><?= $dg['keterangan_gaji']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('C3', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C4">Tanggungan Orang Tua</label>
              <select name="C4" id="C4" class="form-control">
                <option value="0" selected disabled>Select Menu</option>
                <?php foreach ($data_tanggungan as $dt) : ?>
                  <option value="<?= $dt['nilai_tanggungan']; ?>"><?= $dt['keterangan_tanggungan']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('C4', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer justify-content-between">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('DataMahasiswaHitung') ?>" class="btn btn-default">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Tambah Data Mahasiswa Hitung -->
<!-- ========================================================================================================== -->