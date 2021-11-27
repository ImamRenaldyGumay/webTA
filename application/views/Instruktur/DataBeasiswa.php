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
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h3 class="card-title"><?= $title ?></h3>
          <a href="<?= base_url('export_excel') ?>">Export <?= $title ?></a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="myTable">
          <thead>
            <th>No.</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Fakultas</th>
            <th>Prodi</th>
            <th>IPK</th>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($hitung as $h) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $h['nama_mahasiswa'] ?></td>
                <td><?= $h['nim_mahasiswa'] ?></td>
                <td><?= $h['nama_fakultas'] ?></td>
                <td><?= $h['nama_prodi'] ?></td>
                <td><?= $h['c1'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer"></div>
    </div>

    <!-- Default box -->
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h3 class="card-title"><?= $title ?></h3>
          <a href="<?= base_url('ExportData') ?>">Export <?= $title ?></a>
        </div>
        <!-- <a href="<?= base_url('TambahDataFakultas') ?>" class="btn btn-primary">Tambah <?= $title ?></a> -->
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>NAMA - NIM</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>Hasil</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($hitung as $h) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $h['nama_mahasiswa'] ?> - <?= $h['nim_mahasiswa'] ?></td>
                <td><?= $h['c1_akhir'] ?></td>
                <td><?= $h['c2_akhir'] ?></td>
                <td><?= $h['c3_akhir'] ?></td>
                <td><?= $h['c4_akhir'] ?></td>
                <?php if ($h['hasil_akhir'] == 'Layak') : ?>
                  <td><span class="badge bg-primary">Layak</span></td>
                <?php elseif ($h['hasil_akhir'] == 'Tidak Layak') : ?>
                  <td><span class="badge bg-danger">Tidak Layak</span></td>
                <?php endif ?>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-primary" data-toggle="modal" title="Hitung" data-target="#HA<?= $h['id_hitungakhir'] ?>"><i class="fas fa-eye"></i></a>
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