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
        <a href="<?= base_url('TambahDataFakultas') ?>" class="btn btn-primary col-12 mt-3">Tambah <?= $title ?></a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>gaji</th>
              <th>IPK</th>
              <th>PLN</th>
              <th>Tanggung</th>
              <th>Layak</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($training as $t) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $t['gaji'] ?></td>
                <td><?= $t['ipk'] ?></td>
                <td><?= $t['pln'] ?></td>
                <td><?= $t['tanggung'] ?></td>
                <td><?= $t['layak'] ?></td>
                <td>
                  <a href="<?= base_url('DataLatih/Hapus/' . $t['id']) ?>" class="btn btn-info btn-action" data-toggle="tooltip"><i class="far fa-eye"></i></a>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EL<?= $t['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('DataLatih/Hapus/' . $t['id']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="card">
      <p>Total Tanggungan Banyak = <?= $CountTanggungBanyak ?></p>
      <p>Total PLN 450 = <?= $CountPln450 ?></p>
      <p>Total Layak = <?= $CountLayakLayak ?></p>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Data Latih -->
<!-- ========================================================================================================== -->