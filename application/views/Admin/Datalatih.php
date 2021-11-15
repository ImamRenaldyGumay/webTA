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
        <a href="<?= base_url('TambahDataLatih') ?>" class="btn btn-primary col-12 mt-3">Tambah <?= $title ?></a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Mahasiswa</th>
              <th>NIM</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>Status Beasiswa</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($latih as $l) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $l['nama_mahasiswa'] ?></td>
                <td><?= $l['nim_mahasiswa'] ?></td>
                <td><?= $l['rangeawal_ipk'] ?> - <?= $l['rangeakhir_ipk'] ?></td>
                <td><?= $l['keterangan_pekerjaan'] ?></td>
                <td><?= $l['keterangan_gaji'] ?></td>
                <td><?= $l['keterangan_tanggungan'] ?></td>
                <?php if ($l['hasil'] == 'Layak') : ?>
                  <td><span class="badge bg-primary">Layak</span></td>
                <?php elseif ($l['hasil'] == 'Tidak Layak') : ?>
                  <td><span class="badge bg-danger">Tidak Layak</span></td>
                <?php endif ?>
                <td>
                  <a href="<?= base_url('Admin/EditDataLatih/' . $l['id_latih']) ?>" class="btn btn-warning"><i class=" fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('Admin/HapusDataLatih/' . $l['id_latih']) ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></a>
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