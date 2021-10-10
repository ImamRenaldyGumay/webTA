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
      <div class="card-header">
        <button class="btn btn-primary card-title" data-toggle="modal" data-target="#TL">Tambah <?= $title ?></button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover" id="example3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Mahasiswa</th>
              <th>Beasiswa</th>
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
                <td><?= $l['nama'] ?></td>
                <td><?= $l['nama_beasiswa'] ?></td>
                <td><?= $l['c1'] ?></td>
                <td><?= $l['c2'] ?></td>
                <td><?= $l['c3'] ?></td>
                <td><?= $l['c4'] ?></td>
                <?php if ($l['hasil'] == '1') : ?>
                  <td>Lolos</td>
                <?php else : ?>
                  <td>Tidak Lolos</td>
                <?php endif ?>
                <!-- <td><?= $l['hasil'] ?></td> -->
                <td>
                  <!-- <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EditFakultas<?= $l['id_latih'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a> -->
                  <a href="<?= base_url('DataLatih/Hapus/' . $l['id_latih']) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i> Hapus</a>
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
<!-- Start Modal Tambah Data Latih -->
<div class="modal fade" id="TL">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('DataLatih/TambahLatih') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="id_mahasiswa">Nama Mahasiswa</label>
            <select name="id_mahasiswa" id="id_mahasiswa" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($mahasiswa as $m) : ?>
                <option value="<?= $m['id_mahasiswa']; ?>"><?= $m['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_beasiswa">Nama Beasiswa</label>
            <select name="id_beasiswa" id="id_beasiswa" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($beasiswa as $b) : ?>
                <option value="<?= $b['id']; ?>"><?= $b['nama_beasiswa']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="c1">IPK</label>
            <select name="c1" id="c1" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($c1 as $c) : ?>
                <option value="<?= $c['id_parameter']; ?>"><?= $c['nilai']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="c2">Pekerjaan Orang Tua</label>
            <select name="c2" id="c2" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($c2 as $a) : ?>
                <option value="<?= $a['id_parameter']; ?>"><?= $a['nilai']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="c3">Gaji Orang Tua</label>
            <select name="c3" id="c3" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($c3 as $f) : ?>
                <option value="<?= $f['id_parameter']; ?>"><?= $f['nilai']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="c4">Tanggungan Orang Tua</label>
            <select name="c4" id="c4" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($c4 as $g) : ?>
                <option value="<?= $g['id_parameter']; ?>"><?= $g['nilai']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="hasil">Apakah Layak?</label>
            <select name="hasil" id="hasil" class="form-control">
              <option value="">Select Menu</option>
              <option value="1">Layak</option>
              <option value="2">Tidak Layak</option>
            </select>
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
<!-- End Modal Tambah Data Latih -->
<!-- ========================================================================================================== -->