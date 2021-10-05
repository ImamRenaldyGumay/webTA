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
        <button class="btn btn-primary card-title" data-toggle="modal" data-target="#TambahProdi">Tambah <?= $title ?></button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Fakultas</th>
              <th>Nama Prodi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($prodi as $p) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nama_fakultas'] ?></td>
                <td><?= $p['nama_prodi'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" title="Edit" data-target="#EditProdi<?= $p['id'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('DataProdi/Hapus/' . $p['id']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No. </th>
              <th>Nama Fakultas</th>
              <th>Nama Prodi</th>
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
<!-- ========================================================================================================== -->
<!-- Start Modal Tambah Program Studi-->
<div class="modal fade" id="TambahProdi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('DataProdi') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="fakultas_id">Nama Fakultas</label>
            <select name="fakultas_id" id="fakultas_id" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($fakultas as $f) : ?>
                <option value="<?= $f['id']; ?>"><?= $f['nama_fakultas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama_fakultas">Nama Prodi</label>
            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi">
            <?= form_error('nama_prodi', '<small class="text-danger pl-3">', '</small>') ?>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Tambah Program Studi -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Modal Edit Fakultas -->
<?php foreach ($prodi as $p) : ?>
  <div class="modal fade" id="EditProdi<?= $p['id'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('DataProdi/Edit') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id">Id Prodi</label>
              <input name="id" id="id" type="text" class="form-control" value="<?= $p['id'] ?>" readonly='readonly'>
            </div>
            <div class="form-group">
              <label for="id">Nama Fakultas</label>
              <input name="fakultas_id" id="fakultas_id" type="text" class="form-control" value="<?= $p['nama_fakultas'] ?>" readonly='readonly'>
            </div>
            <div class="form-group">
              <label for="nama_fakultas">Nama Prodi</label>
              <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?= $p['nama_prodi'] ?>">
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