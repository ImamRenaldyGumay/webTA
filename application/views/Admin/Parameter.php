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
        <button data-toggle="modal" data-target="#TP" class="btn btn-primary">Tambah <?= $title ?></button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Atribut</th>
              <th>Nilai</th>
              <th>Parameter</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($parameter as $p) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nama_atribut'] ?></td>
                <td><?= $p['nilai'] ?></td>
                <td><?= $p['parameter'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" title="Edit" data-target="#EP<?= $p['id_parameter'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('Parameter/Hapus/' . $p['id_parameter']) ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin mau dihapus?')"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No. </th>
              <th>Nama Atribut</th>
              <th>Nilai</th>
              <th>Parameter</th>
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
      <form action="<?= base_url('Parameter/TambahParameter') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="id_atribut">Atribut</label>
            <select name="id_atribut" id="id_atribut" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($atribut as $a) : ?>
                <option value="<?= $a['id_atribut']; ?>"><?= $a['nama_atribut']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="text" class="form-control" id="nilai" name="nilai">
          </div>
          <div class="form-group">
            <label for="parameter">Parameter</label>
            <input type="text" class="form-control" id="parameter" name="parameter">
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
        <form action="<?= base_url('Parameter/Edit') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_parameter">Id Parameter</label>
              <input type="text" class="form-control" id="id_parameter" name="id_parameter" value="<?= $p['id_parameter'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_atribut">Atribut</label>
              <select name="id_atribut" id="id_atribut" class="form-control">
                <option value="<?= $p['id_atribut'] ?>"><?= $p['nama_atribut'] ?></option>
                <?php foreach ($atribut as $a) : ?>
                  <option value="<?= $a['id_atribut']; ?>"><?= $a['nama_atribut']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nilai">Nilai</label>
              <input type="text" class="form-control" id="nilai" name="nilai" value="<?= $p['nilai'] ?>">
            </div>
            <div class="form-group">
              <label for="parameter">Parameter</label>
              <input type="text" class="form-control" id="parameter" name="parameter" value="<?= $p['parameter'] ?>">
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