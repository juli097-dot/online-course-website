<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Tambah data</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Tambah Data</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="inputKursus" class="form-label">Kursus</label>
          <input type="text" class="form-control" id="inputKursus" name="kursus" placeholder="Masukan Judul Kursus">
        </div>
        <div class="mb-3">
          <label for="inputDeskripsi" class="form-label">Deskripsi</label>
          <input type="text" class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Masukan Deskripsi">
        </div>
        <div class="mb-3">
          <label for="inputDurasi" class="form-label">Durasi</label>
          <input type="text" class="form-control" id="inputDurasi" name="durasi" placeholder="Masukan Durasi">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['daftar'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $kursus = $_POST['kursus'];
      $deskripsi = $_POST['deskripsi'];
      $durasi = $_POST['durasi'];

      // Membuat Query
      $query = "INSERT INTO tb_siswa (kursus, deskripsi, durasi) VALUES('".$kursus."', '".$deskripsi."', '".$durasi."')";

      $result = mysqli_query($koneksi, $query);

      if($result){
        header("location: index.php");
      } else {
        echo "<script>alert('Data Gagal di tambahkan!')</script>";
      }

    }    

  ?>

</body>
</html>