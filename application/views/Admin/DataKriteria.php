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
        <button class="btn btn-primary card-title" data-toggle="modal" data-target="#TK">Tambah <?= $title ?></button>
        <!-- <h3 class="card-title">Title</h3> -->

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>NAMA BEASISWA</th>
              <th>NAMA KRITERIA</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($kriteria as $k) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $k['nama_beasiswa'] ?></td>
                <td><?= $k['nama_kriteria'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EK<?= $k['id_kriteria'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('DataKriteria/Hapus/' . $k['id_kriteria']) ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No. </th>
              <th>NAMA BEASISWA</th>
              <th>NAMA KRITERIA</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- ========================================================================================================== -->
<!-- Start Modal Tambah Kriteria -->
<div class="modal fade" id="TK">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('DataKriteria/TambahDataKriteria') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <select class="form-control" name="kd_beasiswa" id="kd_beasiswa">
              <option value="">Select Option</option>
              <?php foreach ($beasiswa as $b) : ?>
                <option value="<?= $b['id_beasiswa']; ?>"><?= $b['nama_beasiswa']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama_kriteria">Nama Kriteria</label>
            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
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
<!-- End Modal Tambah Kriteria -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Modal Edit Kriteria -->
<?php foreach ($kriteria as $k) : ?>
  <div class="modal fade" id="EK<?= $k['id_kriteria'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('DataKriteria/Edit') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_kriteria">Id Kriteria</label>
              <input type="text" class="form-control" name="id_kriteria" id="id_kriteria" value="<?= $k['id_kriteria'] ?>" readonly='readonly'>
            </div>
            <div class="form-group">
              <label for="kd_beasiswa">Nama Beasiswa</label>
              <input type="text" class="form-control" id="kd_beasiswa" name="kd_beasiswa" value="<?= $k['nama_beasiswa'] ?>" readonly='readonly'>
            </div>
            <div class="form-group">
              <label for="">Nama Kriteria</label>
              <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $k['nama_kriteria'] ?>">
              <?= form_error('nama_kriteria', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Edit</button>
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
<!-- End Modal Edit Kriteria -->
<!-- ========================================================================================================== -->