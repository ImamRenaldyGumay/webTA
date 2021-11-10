<!-- ========================================================================================================== -->
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
      <div class="card-header border-0">
        <a href="<?= base_url('TambahDataKriteria') ?>" class="btn btn-primary col-12 mt-3" data-toggle="modal" data-target="#TP">Tambah <?= $title ?></a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kriteria</th>
              <th>Keterangan</th>
              <th>Bobot</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($parameter as $p) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nama_kriteria'] ?></td>
                <td><?= $p['keterangan'] ?></td>
                <td><?= $p['bobot'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EP<?= $p['id_parameter'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('DataParameter/Hapus/' . $p['id_parameter']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i> Hapus</a>
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
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Modal Tambah Data Parameter -->
<div class="modal fade" id="TP">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('DataParameter/TambahDataParameter') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="id_beasiswa">Nama Beasiswa</label>
            <select name="id_beasiswa" id="id_beasiswa" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($beasiswa as $b) : ?>
                <option value="<?= $b['id_beasiswa']; ?>"><?= $b['nama_beasiswa']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_kriteria">Nama Kriteria</label>
            <select name="id_kriteria" id="id_kriteria" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($kriteria as $k) : ?>
                <option value="<?= $k['id_kriteria']; ?>"><?= $k['nama_kriteria']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
          </div>
          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="text" class="form-control" id="bobot" name="bobot">
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
<!-- End Modal Tambah Data Parameter -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Modal Edit Data Parameter -->
<?php foreach ($parameter as $p) : ?>
  <div class="modal fade" id="EP<?= $p['id_parameter'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="DataParameter/Edit" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_parameter">Id Parameter</label>
              <input type="text" class="form-control" id="id_parameter" name="id_parameter" value="<?= $p['id_parameter'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_beasiswa">Beasiswa</label>
              <input type="text" class="form-control" id="id_beasiswa" name="id_beasiswa" value="<?= $p['nama_beasiswa'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_kriteria">Kriteria</label>
              <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" value="<?= $p['nama_kriteria'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="keterangan">keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $p['keterangan'] ?>">
            </div>
            <div class="form-group">
              <label for="bobot">bobot</label>
              <input type="text" class="form-control" id="bobot" name="bobot" value="<?= $p['bobot'] ?>">
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
<!-- End Modal Edit Data Parameter -->
<!-- ========================================================================================================== -->