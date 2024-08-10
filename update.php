<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Update data</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

  <?php

    // Ambil data dari patameter url browser
    $id = $_GET['id'];

    // Query ambil data dari param jika ada.
    $query = "SELECT * FROM tb_siswa WHERE id = $id";
    // Hasil Query
    $result = mysqli_query($koneksi, $query);
    foreach($result as $data) {
  ?>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Data</h1>
      <form method="POST">
        <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
        <input type="hidden" value="<?= $data['id'] ?>" name="id">
        <div class="mb-3">
          <label for="inputKursus" class="form-label">Kursus</label>
          <input type="text" class="form-control" id="inputKursus" value="<?= $data['kursus'] ?>" name="kursus" placeholder="Masukan Judul Kursus">
        </div>
        <div class="mb-3">
          <label for="inputDeskripsi" class="form-label">Deskripsi</label>
          <input type="text" class="form-control" id="inputDeskripsi" value="<?= $data['deskripsi'] ?>" name="deskripsi" placeholder="Masukan Deskripsi">
        </div>
        <div class="mb-3">
          <label for="inputDurasi" class="form-label">Durasi</label>
          <input type="text" class="form-control" id="inputDurasi" value="<?= $data['durasi'] ?>" name="durasi" placeholder="Masukan Durasi">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Update">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php } ?>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['daftar'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $kursus = $_POST['kursus'];
      $deskripsi = $_POST['deskripsi'];
      $durasi = $_POST['durasi'];

      // Membuat Query
      $query = "UPDATE tb_siswa SET kursus = '$kursus', deskripsi = '$deskripsi', durasi = '$durasi' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        header("location: index.php");
      } else {
        echo "<script>alert('Data Gagal di update!')</script>";
      }

    }    

  ?>

</body>
</html>