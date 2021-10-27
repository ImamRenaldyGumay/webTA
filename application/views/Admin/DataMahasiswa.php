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
              <th>Nomor Induk Mahasiswa</th>
              <th>Nama Mahasiswa</th>
              <th>Jenis Kelamin</th>
              <th>Fakultas</th>
              <th>Program Studi</th>
              <th>Tahun</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($mahasiswa as $m) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $m['nim_mahasiswa'] ?></td>
                <td><?= $m['nama_mahasiswa'] ?></td>
                <?php if ($m['jenis_kelamin'] == 'L') : ?>
                  <td>Laki - Laki</td>
                <?php else : ?>
                  <td>Perempuan</td>
                <?php endif ?>
                <td><?= $m['nama_fakultas'] ?></td>
                <td><?= $m['nama_prodi'] ?></td>
                <td><?= $m['tahun_pengajuan'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EditFakultas<?= $m['nim_mahasiswa'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('DataFakultas/Hapus/' . $m['nim_mahasiswa']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" onclick="Konfirm()"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
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
      <form action="" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_mahasiswa">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
          </div>
          <div class="form-group">
            <label for="nim_mahasiswa">NIM</label>
            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa">
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
              <option value="">Select Menu</option>
              <option value="L">Laki - Laki</option>
              <option value="J">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="id_fakultas">Fakultas</label>
            <select name="id_fakultas" id="id_fakultas" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($fakultas as $f) : ?>
                <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_prodi">Program Studi</label>
            <select name="id_prodi" id="id_prodi" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($prodi as $p) : ?>
                <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
              <?php endforeach; ?>
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