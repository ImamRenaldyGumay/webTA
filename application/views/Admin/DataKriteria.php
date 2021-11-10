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
        <a href="<?= base_url('TambahDataKriteria') ?>" class="btn btn-primary col-12 mt-3">Tambah <?= $title ?></a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama KRITERIA</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($kriteria as $k) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $k['nama_kriteria'] ?></td>
                <td>
                  <a href="<?= base_url('Admin/EditDataKriteria/' . $k['id_kriteria']) ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('Admin/HapusDataKriteria/' . $k['id_kriteria']) ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></a>
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