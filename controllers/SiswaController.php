<?php

  /**
   *
   */
  class SiswaController
  {
    private $db;

    function __construct($conn)
    {
      $this->db = $conn;
    }

    public function redirect($url)
    {
      header("Location: $url");
    }

    public function index()
    {
      $query = $this->db->prepare("SELECT * FROM siswa ORDER BY id DESC");
      $query->execute();
      $data = $query->fetchAll();
      return $data;
    }

    public function store($nis, $nama, $kelas)
    {
      $query = $this->db->prepare("INSERT INTO siswa (nis, nama, kelas) VALUES ('$nis', '$nama', '$kelas')");
      $query->execute();
      return true;
    }

    public function update($id, $nis, $nama, $kelas)
    {
      $query = $this->db->prepare("UPDATE siswa SET nis = '$nis', nama = '$nama', kelas = '$kelas' WHERE id = '$id'");
      $query->execute();
      return true;
    }

    public function delete($id)
    {
      $query = $this->db->prepare("DELETE FROM siswa WHERE id = '$id'");
      $query->execute();
      header("Location: index.php");
    }
  }


?>
