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
            <li class="breadcrumb-item active"><?= $title ?></li>
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
        <a href="<?= base_url('TambahDataFakultas') ?>" class="btn btn-primary col-12 mt-3">Tambah <?= $title ?></a>
        <!-- <button type="button" class="btn btn-primary col-12 mt-3" data-toggle="modal" data-target="#TDF">
          Tambah <?= $title ?>
        </button> -->
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
                <td><?= $f['id_fakultas'] ?> - <?= $f['nama_fakultas'] ?></td>
                <td>
                  <a href="<?= base_url('Admin/EditDataFakultas/' . $f['id_fakultas']) ?>" class="btn btn-warning">Edit</a>
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
<!-- ========================================================================================================== -->
<!-- Start Modal Tambah Data Fakultas -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="TDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Tambah Data Fakultas -->
<!-- ========================================================================================================== -->