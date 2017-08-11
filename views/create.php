<?php
  require_once 'config/config.php';
  require_once 'controllers/SiswaController.php';

  $siswa = new SiswaController($conn);

  if (isset($_POST['store'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    if ($siswa->store($nis, $nama, $kelas)) {
      $siswa->redirect('index.php');
    } else {
      echo "gagal";
    }
  }

?>

<form method="post">
  <div>
    <input type="text" name="nis" placeholder="NIS">
  </div>
  <div>
    <input type="text" name="nama" placeholder="Nama">
  </div>
  <div>
    <input type="text" name="kelas" placeholder="Kelas">
  </div>
  <div>
    <button type="submit" name="store">Submit</button>
  </div>
</form>
