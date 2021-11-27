<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>NIM</th>
      <th>Fakultas</th>
      <th>Prodi</th>
      <th>IPK</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;
    $no = 1;
    foreach ($user as $user) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?php echo $user->nama_mahasiswa ?></td>
        <td><?php echo $user->nim_mahasiswa ?></td>
        <td><?php echo $user->nama_fakultas ?></td>
        <td><?php echo $user->nama_prodi ?></td>
        <td><?php echo $user->c1 ?></td>
      </tr>
    <?php $i++;
    } ?>
  </tbody>
</table>