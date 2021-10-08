<!-- ========================================================================================================== -->
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
        <button data-toggle="modal" data-target="#TL" class="btn btn-primary">Tambah <?= $title ?></button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Mahasiswa</th>
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
            foreach ($latih as $l) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $l['id_mahasiswa'] ?></td>
                <td><?= $l['c1'] ?></td>
                <td><?= $l['c2'] ?></td>
                <td><?= $l['c3'] ?></td>
                <td><?= $l['c4'] ?></td>
                <?php if ($l['hasil'] == 1) : ?>
                  <td>Layak</td>
                <?php else : ?>
                  <td>Tidak Layak</td>
                <?php endif ?>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" title="Edit" data-target="#EditAtribut<?= $l['id_latih'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="<?= base_url('Atribut/Hapus/' . $l['id_latih']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="Yakin?"><i class="fas fa-trash"></i> Hapus</a>
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
<!-- Start Modal Tambah Latih -->
<div class="modal fade" id="TL">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="id_mahasiswa">Nama Mahasiswa</label>
            <select class="form-control" name="id_mahasiswa" id="id_mahasiswa">
              <option value="">Select Menu</option>
              <?php foreach ($mahasiswa as $m) : ?>
                <option value="<?= $m['id_mahasiswa']; ?>"><?= $m['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_atribut">Atribut</label>
            <select class="form-control" name="id_atribut" id="id_atribut">
              <option value="">Select Menu</option>
              <?php foreach ($atribut as $a) : ?>
                <option value="<?= $a['id_atribut']; ?>"><?= $a['nama_atribut']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal Tambah Latih -->
<!-- ========================================================================================================== -->