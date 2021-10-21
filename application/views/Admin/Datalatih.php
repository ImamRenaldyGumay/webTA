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
              <th>NIM</th>
              <th>Jenis Kelamin</th>
              <th>Fakultas</th>
              <th>Program Studi</th>
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
                <td><?= $l['nama_mahasiswa'] ?></td>
                <td><?= $l['nim'] ?></td>
                <?php if ($l['jenis_kelamin'] == 'L') : ?>
                  <td>Laki - Laki</td>
                <?php elseif ($l['jenis_kelamin'] == 'P') : ?>
                  <td>Perempuan</td>
                <?php endif ?>
                <td><?= $l['nama_fakultas'] ?></td>
                <td><?= $l['nama_prodi'] ?></td>
                <td><?= $l['nama_beasiswa'] ?></td>
                <td><?= $l['c1'] ?></td>
                <td><?= $l['c2'] ?></td>
                <td><?= $l['c3'] ?></td>
                <td><?= $l['c4'] ?></td>
                <?php if ($l['hasil'] == '1') : ?>
                  <td>Layak</td>
                <?php elseif ($l['hasil'] == '0') : ?>
                  <td>Tidak Layak</td>
                <?php endif ?>
                <td>
                  <a href="<?= base_url('') ?>" class="btn btn-warning" data-toggle="modal" data-target="#EL<?= $l['id_latih'] ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
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
            <label for="nama_mahasiswa">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
          </div>
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim">
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
              <option value="">Select Menu</option>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="id_fakultas">Fakultas</label>
            <select class="form-control" name="id_fakultas" id="id_fakultas">
              <option value="">Select Menu</option>
              <?php foreach ($fakultas as $f) : ?>
                <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_prodi">Program Studi</label>
            <select class="form-control" name="id_prodi" id="id_prodi">
              <option value="">Select Menu</option>
              <?php foreach ($prodi as $p) : ?>
                <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_beasiswa">Beasiswa</label>
            <select class="form-control" name="id_beasiswa" id="id_beasiswa">
              <option value="">Select Menu</option>
              <?php foreach ($beasiswa as $b) : ?>
                <option value="<?= $b['id_beasiswa']; ?>"><?= $b['nama_beasiswa']; ?></option>
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
              <option value="0">Tidak Layak</option>
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
<!-- ========================================================================================================== -->
<!-- Start Modal Edit Data Latih -->
<?php foreach ($latih as $l) : ?>
  <div class="modal fade" id="EL<?= $l['id_latih'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('DataLatih/Edit') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_latih">Id Mahasiswa</label>
              <input type="text" class="form-control" id="id_latih" name="id_latih" value="<?= $l['id_latih'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama_mahasiswa">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $l['nama_mahasiswa'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" value="<?= $l['nim'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamnin</label>
              <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $l['jenis_kelamin'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_fakultas">Fakultas</label>
              <input type="text" class="form-control" id="id_fakultas" name="id_fakultas" value="<?= $l['nama_fakultas'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_prodi">Program Studi</label>
              <input type="text" class="form-control" id="id_prodi" name="id_prodi" value="<?= $l['nama_prodi'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_beasiswa">Beasiswa</label>
              <input type="text" class="form-control" id="id_beasiswa" name="id_beasiswa" value="<?= $l['nama_beasiswa'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="c1">IPK</label>
              <select name="c1" id="c1" class="form-control">
                <option value="<?= $l['c1']; ?>"><?= $l['c1']; ?></option>
                <?php foreach ($c1 as $c) : ?>
                  <option value="<?= $c['id_parameter']; ?>"><?= $c['nilai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="c2">Pekerjaan Orang Tua</label>
              <select name="c2" id="c2" class="form-control">
                <option value="<?= $l['c2']; ?>"><?= $l['c2']; ?></option>
                <?php foreach ($c2 as $a) : ?>
                  <option value="<?= $a['id_parameter']; ?>"><?= $a['nilai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="c3">Gaji Orang Tua</label>
              <select name="c3" id="c3" class="form-control">
                <option value="<?= $l['c3']; ?>"><?= $l['c3']; ?></option>
                <?php foreach ($c3 as $f) : ?>
                  <option value="<?= $f['id_parameter']; ?>"><?= $f['nilai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="c4">Tanggungan Orang Tua</label>
              <select name="c4" id="c4" class="form-control">
                <option value="<?= $l['c4']; ?>"><?= $l['c4']; ?></option>
                <?php foreach ($c4 as $g) : ?>
                  <option value="<?= $g['id_parameter']; ?>"><?= $g['nilai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="hasil">Apakah Layak?</label>
              <select name="hasil" id="hasil" class="form-control">
                <option value="<?= $l['hasil']; ?>"><?= $l['hasil']; ?></option>
                <option value="1">Layak</option>
                <option value="0">Tidak Layak</option>
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
<?php endforeach ?>
<!-- End Modal Edit Data Latih -->
<!-- ========================================================================================================== -->