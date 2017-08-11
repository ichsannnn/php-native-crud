<?php

  require_once 'config/config.php';
  require_once 'controllers/SiswaController.php';
  $id = $_GET['id'];
  $siswa = $conn->prepare("SELECT * FROM siswa WHERE id = '$id'");
  $siswa->execute();
  $data = $siswa->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST['update'])) {
    $siswa = new SiswaController($conn);
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    if ($siswa->update($id, $nis, $nama, $kelas)) {
      $siswa->redirect('index.php');
    } else {
      echo "gagal";
    }
  }

?>

<form method="post">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">
  <div>
    <input type="text" name="nis" placeholder="NIS" value="<?= $data['nis'] ?>">
  </div>
  <div>
    <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?>">
  </div>
  <div>
    <input type="text" name="kelas" placeholder="Kelas" value="<?= $data['kelas'] ?>">
  </div>
  <div>
    <button type="submit" name="update">Submit</button>
  </div>
</form>
