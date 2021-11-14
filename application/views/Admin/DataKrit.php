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

    <div class="row">
      <div class="col-md-6">
        <!-- Box Comment -->
        <div class="card card-primary">
          <div class="card-header ">
            <h3 class="card-title">IPK</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Keterangan</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($IPK as $i) : ?>
                  <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $i['rangeawal_ipk'] ?> - <?= $i['rangeakhir_ipk'] ?></td>
                    <td><?= $i['nilai_ipk'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <!-- End Table -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <!-- Box Comment -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Pekerjaan Orang Tua</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Keterangan</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($Pekerjaan as $p) : ?>
                  <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $p['keterangan_pekerjaan'] ?></td>
                    <td><?= $p['nilai_pekerjaan'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <!-- End Table -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <!-- Box Comment -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Penghasilan Orang Tua</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Keterangan</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($Gaji as $g) : ?>
                  <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $g['keterangan_gaji'] ?></td>
                    <td><?= $g['nilai_gaji'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <!-- End Table -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <!-- Box Comment -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Jumlah Tanggungan Orang Tua</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Keterangan</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($Tanggung as $t) : ?>
                  <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $t['keterangan_tanggungan'] ?></td>
                    <td><?= $t['nilai_tanggungan'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <!-- End Table -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- ========================================================================================================== -->