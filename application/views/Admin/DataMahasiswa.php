<!-- ========================================================================================================== -->
<!-- Start Content Data Mahasiswa -->
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
      <div class="card-header">
        <button class="btn btn-primary card-title" data-toggle="modal" data-target="#TM">Tambah <?= $title ?></button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Fakultas</th>
              <th>Program Studi</th>
              <th>Jenis Kelamin</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($mahasiswa as $m) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $m['nim'] ?></td>
                <td><?= $m['nama'] ?></td>
                <td><?= $m['nama_fakultas'] ?></td>
                <td><?= $m['nama_prodi'] ?></td>
                <?php if ($m['jenis_kelamin'] == 'L') : ?>
                  <td>Laki - Laki</td>
                <?php else : ?>
                  <td>Perempuan</td>
                <?php endif ?>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EM<?= $m['id_mahasiswa'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('DataMahasiswa/Hapus/' . $m['id_mahasiswa']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No. </th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Fakultas</th>
              <th>Program Studi</th>
              <th>Jenis Kelamin</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Data Mahasiswa -->
<!-- ========================================================================================================== -->
<!-- Start Modal Tambah Data Mahasiswa -->
<div class="modal fade" id="TM">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('DataMahasiswa/TambahMahasiswa') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Masukkan Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="nim">Masukkan NIM</label>
            <input type="text" class="form-control" id="nim" name="nim">
          </div>
          <div class="form-group">
            <label for="id_fakultas">Nama Fakultas</label>
            <select name="id_fakultas" id="id_fakultas" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($fakultas as $f) : ?>
                <option value="<?= $f['id']; ?>"><?= $f['nama_fakultas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_prodi">Nama Program Studi</label>
            <select name="id_prodi" id="id_prodi" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($prodi as $p) : ?>
                <option value="<?= $p['id']; ?>"><?= $p['nama_prodi']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
              <option value="">Select Menu</option>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Tambah Data Mahasiswa -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Modal Edit Data Mahasiswa -->
<?php foreach ($mahasiswa as $m) : ?>
  <div class="modal fade" id="EM<?= $m['id_mahasiswa'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('DataMahasiswa/Edit') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_mahasiswa">ID Mahasiswa</label>
              <input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value="<?= $m['id_mahasiswa'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" value="<?= $m['nim'] ?>">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $m['nama'] ?>">
            </div>
            <div class="form-group">
              <label for="id_fakultas">Nama Fakultas</label>
              <select name="id_fakultas" id="id_fakultas" name="id_fakultas" class="form-control">
                <option value="">Select Menu</option>
                <?php foreach ($fakultas as $f) : ?>
                  <option value="<?= $f['id']; ?>"><?= $f['nama_fakultas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_prodi">Nama Fakultas</label>
              <select name="id_prodi" id="id_prodi" name="id_prodi" class="form-control">
                <option value="">Select Menu</option>
                <?php foreach ($prodi as $p) : ?>
                  <option value="<?= $p['id']; ?>"><?= $p['nama_prodi']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                <option value="">Select Menu</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach ?>
<!-- End Modal Edit Data Mahasiswa -->
<!-- ========================================================================================================== -->