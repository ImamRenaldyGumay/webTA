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
      <!-- <div class="card-header border-0">
        <a href="<?= base_url('TambahDataFakultas') ?>" class="btn btn-primary col-12 mt-3">Tambah <?= $title ?></a>
      </div> -->
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIM</th>
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
                <td><?= $h['nim_mahasiswa'] ?></td>
                <td><?= $h['c1_akhir'] ?></td>
                <td><?= $h['c2_akhir'] ?></td>
                <td><?= $h['c3_akhir'] ?></td>
                <td><?= $h['c4_akhir'] ?></td>
                <td><?= $h['hasil_akhir'] ?></td>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-primary" title="Hitung"><i class="fas fa-pencil-alt"></i></a>
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