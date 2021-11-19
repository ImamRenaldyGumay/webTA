<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header">
        title
      </div>
      <div class="card-body">
        <h2>Nilai Atribut IPK</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>IPK</th>
              <th>Layak</th>
              <th>Tidak Layak</th>
              <th>Probabilitas Layak</th>
              <th>Probabilitas Tidak Layak</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>IPK 1</td>
              <td>IPK2</td>
              <td>IPK3</td>
            </tr>
            <tr>
              <td>ss</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        footer
      </div>
    </div>


    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>
      </div>
      <div class="card-body">
        <p>Langkah pertama dalam perhitungan naive bayes adalah mencari probabilitas setiap nilai atribut sesuai data latih.</p>
        <p>Berikut probabilitas kemunculan nilai atribut label:</p>
        <p>------- P(Layak) = (layak/total) = (<?= $jumlahLayak ?>/<?= $totalData ?>) = <?= $probLayak ?></p>
        <p>------- P(Tidak Layak) = (Tidak Layak/Total) = (<?= $jumlahTidakLayak ?>/<?= $totalData ?>) = <?= $probTidakLayak ?></p>
        <p>Berikut probabilitas kemunculan nilai atribut diketahui:</p>
        <p>-----IPK</p>
        <p>------------------ P(IPK1|tidak Layak) = <?= $IPK1 ?>/<?= $jumlahTidakLayak ?> = <?= $IPK1Tidak ?></p>
        <p>-------------------P(IPK1|Layak) = <?= $IPK1 ?>/<?= $jumlahLayak ?> = <?= $IPK1Layak ?></p>
        <p>-------------------P(IPK2|Tidak Layak) = <?= $IPK2 ?>/<?= $jumlahTidakLayak ?> = <?= $IPK2Tidak ?></p>
        <p>-------------------P(IPK2|Layak) = <?= $IPK2 ?> / <?= $jumlahLayak ?> = <?= $IPK2Layak ?></p>
        <p>-------------------P(IPK3|Tidak Layak) = <?= $IPK3 ?> / <?= $jumlahTidakLayak ?> = <?= $IPK3Tidak ?></p>
        <p>-------------------P(IPK3|Layak) = <?= $IPK3 ?> / <?= $jumlahLayak ?> = <?= $IPK3Layak ?></p>
        <p>-----Pekerjaan</p>
        <p>Pekerjaan 1 = <?= $kerja1 ?></p>
        <p>Pekerjaan 2 = <?= $kerja2 ?></p>
        <p>Pekerjaan 3 = <?= $kerja3 ?></p>
        <p>Gaji 1 = <?= $gaji1 ?></p>
        <p>Gaji 2 = <?= $gaji2 ?></p>
        <p>Gaji 3 = <?= $gaji3 ?></p>
        <p>Gaji 4 = <?= $gaji4 ?></p>
        <p>Tanggungan 1 = <?= $tanggung1 ?></p>
        <p>Tanggungan 2 = <?= $tanggung2 ?></p>
        <p>Tanggungan 3 = <?= $tanggung3 ?></p>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->