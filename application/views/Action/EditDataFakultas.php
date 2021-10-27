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
            <li class="breadcrumb-item"><a href="<?= base_url('DataFakultas') ?>">Halaman Data Fakultas</a></li>
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
        <div class="d-flex justify-content-between">
          <h3 class="card-title"><?= $title ?></h3>
          <a href="<?= base_url('DataFakultas') ?>"><i class="fas fa-undo-alt"></i>Back</a>
        </div>
      </div>
      <?php foreach ($EditFakultas as $f) : ?>
        <form action="<?= base_url('EditDataFakultas') ?>" method="POST">
          <div class="card-body">
            <div class="container">
              <div class="form-group col-12">
                <label for="id_fakultas">Id Fakultas</label>
                <input name="id_fakultas" id="id_fakultas" type="text" class="form-control" value="<?= $f['id_fakultas'] ?>" readonly='readonly'>
              </div>
              <div class="form-group col-12">
                <label for="nama_fakultas">Nama Fakultas</label>
                <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="<?= $f['nama_fakultas'] ?>">
                <?= form_error('nama_fakultas', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
            </div>
          </div>
          <div class=" card-footer justify-content-between border-0">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </div>
        </form>
      <?php endforeach ?>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->