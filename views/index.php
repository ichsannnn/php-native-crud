<?php
  include_once 'config/config.php';
  include_once 'controllers/SiswaController.php';
  $siswa = new SiswaController($conn);
?>

<a href="index.php?p=create">Tambah</a>
<table border="1">
  <thead>
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Opsi</th>
  </thead>
  <tbody>
    <?php foreach ($siswa->index() as $key => $value): ?>
      <tr>
        <td><?= $key + 1 ?></td>
        <td><?= $value['nis'] ?></td>
        <td><?= $value['nama'] ?></td>
        <td><?= $value['kelas'] ?></td>
        <td>
          <a href="index.php?p=edit&id=<?= $value['id'] ?>">Ubah</a>
          <a href="index.php?p=delete&id=<?= $value['id'] ?>">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
