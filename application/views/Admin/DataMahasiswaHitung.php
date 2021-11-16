<!-- ========================================================================================================== -->
<!-- Start Content Data Latih -->
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
        <a href="<?= base_url('TambahDataMahasiswaHitung') ?>" class="btn btn-primary col-12 mt-3">Tambah <?= $title ?></a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Mahasiswa</th>
              <th>Nomor Induk Mahasiswa</th>
              <th>Jenis Kelamin</th>
              <th>Fakultas</th>
              <th>Program Studi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($mahasiswa as $m) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $m['nama_mahasiswa'] ?></td>
                <td><?= $m['nim_mahasiswa'] ?></td>
                <?php if ($m['jenis_kelamin'] == 'L') : ?>
                  <td>Laki - Laki</td>
                <?php else : ?>
                  <td>Perempuan</td>
                <?php endif ?>
                <td><?= $m['nama_fakultas'] ?></td>
                <td><?= $m['nama_prodi'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-info" data-toggle="modal" title="Detail" data-target="#HA<?= $m['nim_mahasiswa'] ?>"><i class="fas fa-eye"></i></a>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('Admin/HapusDataHitungMahasiswaHitung/' . $m['nim_mahasiswa']) ?>" class="btn btn-danger btn-action" title="Delete" onclick="return confirm('Are You Sure? This action can not be undone. Do you want to continue?')"><i class="fas fa-trash"></i></a>
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
<!-- End Content Data Latih -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Modal  -->
<?php foreach ($mahasiswa as $m) : ?>
  <div class="modal fade" tabindex="-1" id="HA<?= $m['nim_mahasiswa'] ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered table-hover" id="example3">
            <thead>
              <tr>
                <th>Nomor Induk Mahasiswa</th>
                <th>IPK</th>
                <th>Pekerjaan Orang Tua</th>
                <th>Gaji Orang Tua</th>
                <th>Tanggungan Orang Tua</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $m['nama_mahasiswa'] ?> - <?= $m['nim_mahasiswa'] ?></td>
                <td><?= $m['c1'] ?></td>
                <td><?= $m['keterangan_pekerjaan'] ?></td>
                <td><?= $m['keterangan_gaji'] ?></td>
                <td><?= $m['keterangan_tanggungan'] ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach ?>
<!-- End Modal -->
<!-- ========================================================================================================== -->