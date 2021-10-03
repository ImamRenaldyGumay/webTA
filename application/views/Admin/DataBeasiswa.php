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
        <button class="btn btn-primary card-title" data-toggle="modal" data-target="#TambahBeasiswa">Tambah <?= $title ?></button>
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
              <th>Nama Beasiswa</th>
              <!-- <th>Tanggal Pendaftaran</th>
              <th>Tanggal di Tutup</th> -->
              <th>Apakah Aktif</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($beasiswa as $b) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $b['nama_beasiswa'] ?></td>
                <!-- <td><?= date('d-m-Y', strtotime($b['start_date'])) ?></td>
                <td><?= date('d-m-Y', strtotime($b['end_date'])) ?></td> -->
                <?php if ($b['is_active'] == 1) : ?>
                  <td>ya</td>
                <?php else : ?>
                  <td>tidak</td>
                <?php endif ?>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" title="Edit" data-target="#EditBeasiswa<?= $b['id_beasiswa'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('DataBeasiswa/Hapus/' . $b['id_beasiswa']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No. </th>
              <th>Nama Beasiswa</th>
              <!-- <th>Tanggal Pendaftaran</th>
              <th>Tanggal di Tutup</th> -->
              <th>Apakah Aktif</th>
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
<!-- Start Modal Tambah Program Studi-->
<div class="modal fade" id="TambahBeasiswa">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('DataBeasiswa') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Beasiswa</label>
            <input name="nama_beasiswa" id="nama_beasiswa" type="text" class="form-control" placeholder="Masukkan nama Beasiswa">
          </div>
          <div class="form-group">
            <label>Apakah Aktif</label>
            <select name="is_active" id="is_active" class="form-control">
              <option value="">Select Menu</option>
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
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
<!-- Start Modal Edit Beasiswa -->
<?php foreach ($beasiswa as $b) : ?>
  <div class="modal fade" id="EditBeasiswa<?= $b['id_beasiswa'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('DataBeasiswa/Edit') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_beasiswa">Id Beasiswa</label>
              <input name="id_beasiswa" id="id_beasiswa" type="text" class="form-control" value="<?= $b['id_beasiswa'] ?>" readonly='readonly'>
            </div>
            <div class="form-group">
              <label>Nama Beasiswa</label>
              <input name="nama_beasiswa" id="nama_beasiswa" type="text" class="form-control" placeholder="Masukkan nama Beasiswa" value="<?= $b['nama_beasiswa'] ?>">
            </div>
            <!-- <div class="form-group">
              <label>Tanggal Daftar</label>
              <input name="start_date" id="start_date" type="date" class="form-control" value="<?= $b['start_date'] ?>">
            </div>
            <div class="form-group">
              <label>Tanggal Tutup</label>
              <input name="end_date" id="end_date" type="date" class="form-control" value="<?= $b['end_date'] ?>">
            </div> -->
            <div class="form-group">
              <label>Apakah Aktif</label>
              <select name="is_active" id="is_active" class="form-control" value="<?= $b['is_ative'] ?>">
                <option value="">Select Menu</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
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