<!-- ========================================================================================================== -->
<!-- Start Content Edit Data Fakultas -->
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
            <li class="breadcrumb-item"><a href="<?= base_url('DataLatih') ?>">Data Latih</a></li>
            <li class="breadcrumb-item active">Halaman <?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="col-md-9">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Halaman <?= $title ?></h3>
        </div>
        <form action="<?= base_url('AksiEditDataLatih') ?>" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="id_latih">Id Latih</label>
              <input name="id_latih" id="id_latih" type="text" class="form-control" value="<?= $latih['id_latih'] ?>" readonly='readonly'>
            </div>
            <div class="form-group">
              <label for="nama_mahasiswa">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $latih['nama_mahasiswa'] ?>">
              <?= form_error('nama_mahasiswa', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="nim_mahasiswa">NIM Mahasiswa</label>
              <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" value="<?= $latih['nim_mahasiswa'] ?>">
              <?= form_error('nim_mahasiswa', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C1">IPK Mahasiswa</label>
              <select name="C1" id="C1" class="form-control">
                <option value="<?= $latih['c1'] ?>"><?= $latih['c1'] ?></option>
                <?php foreach ($ipk as $i) : ?>
                  <option value="<?= $i['id_ipk']; ?>"><?= $i['rangeawal_ipk']; ?> - <?= $i['rangeakhir_ipk']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('C1', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C2">Pekerjaan Orang Tua</label>
              <select name="C2" id="C2" class="form-control">
                <option value="<?= $latih['c2'] ?>"><?= $latih['c2'] ?></option>
                <?php foreach ($pekerjaan as $p) : ?>
                  <option value="<?= $p['nilai_pekerjaan']; ?>"><?= $p['keterangan_pekerjaan']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('C2', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C3">Penghasilan Orang Tua</label>
              <select name="C3" id="C3" class="form-control">
                <option value="<?= $latih['c3'] ?>"><?= $latih['c3'] ?></option>
                <?php foreach ($gaji as $g) : ?>
                  <option value="<?= $g['nilai_gaji']; ?>"><?= $g['keterangan_gaji']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('C3', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="C4">Jumlah Taggungan Orang Tua</label>
              <select name="C4" id="C4" class="form-control">
                <option value="<?= $latih['c4'] ?>"><?= $latih['c4'] ?></option>
                <?php foreach ($tanggung as $t) : ?>
                  <option value="<?= $t['nilai_tanggungan']; ?>"><?= $t['keterangan_tanggungan']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('C4', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="hasil">Hasil</label>
              <select name="hasil" id="hasil" class="form-control">
                <option value="<?= $latih['hasil'] ?>" readonly='readonly'><?= $latih['hasil'] ?></option>
                <option value="Layak">Layak</option>
                <option value="Tidak Layak">Tidak Layak</option>
              </select>
              <?= form_error('hasil', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
            <a href="<?= base_url('DataLatih') ?>" class="btn btn-primary">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- End Content Edit Data Fakultas -->
<!-- Application/views/Action/EditDataFakultas -->
<!-- ========================================================================================================== -->