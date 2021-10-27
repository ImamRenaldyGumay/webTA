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
        <button data-toggle="modal" data-target="#TambahFakultas" class="btn btn-primary col-12 mt-3">Tambah <?= $title ?></button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Fakultas</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($fakultas as $f) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $f['nama_fakultas'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EditFakultas<?= $f['id_fakultas'] ?>">Edit</a>
                  <a href="<?= base_url('Admin/HapusDataFakultas/' . $f['id_fakultas']) ?>" class="btn btn-danger btn-action" onclick="confirm('Yakin?')">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <!-- End Table -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- ========================================================================================================== -->
<!-- Start Modal Tambah Fakultas-->
<div class="modal fade" id="TambahFakultas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('TambahDataFakultas') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_fakultas">Nama Fakultas</label>
            <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary" onclick="Submit()">Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Tambah Fakultas -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Modal Edit Fakultas -->
<?php foreach ($fakultas as $f) : ?>
  <div class="modal fade" id="EditFakultas<?= $f['id_fakultas'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('EditDataFakultas') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_fakultas">Id Fakultas</label>
              <input name="id_fakultas" id="id_fakultas" type="text" class="form-control" value="<?= $f['id_fakultas'] ?>" readonly='readonly'>
            </div>
            <div class="form-group">
              <label for="nama_fakultas">Nama Fakultas</label>
              <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="<?= $f['nama_fakultas'] ?>">
              <?= form_error('nama_fakultas', '<small class="text-danger pl-3">', '</small>') ?>
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

<!-- End Modal Edit Fakultas -->
<!-- ========================================================================================================== -->