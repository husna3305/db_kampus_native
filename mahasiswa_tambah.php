<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Mahasiswa</title>
</head>

<body>
  <form action="" method="POST">
    <label for="">NIM</label>
    <input type="text" name="nim"> </br>
    <label for="">Nama Lengkap</label>
    <input type="text" name="nama_mahasiswa"> </br>
    <label for="">Jenis Kelamin</label>
    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan </br>
    <label for="">Program_studi</label>
    <input type="text" name="program_studi"> </br>
    <label for="">Alamat</label>
    <input type="text" name="alamat"> </br>
    <button type="submit">SUBMIT</button>
  </form>
  <?php if (!empty($_POST['nim'])) {
    require("koneksi.php");
    extract($_POST);
    $query = "INSERT INTO tabel_mahasiswa(nim,nama_mahasiswa,jenis_kelamin,program_studi,alamat)
            VALUES('$nim','$nama_mahasiswa','$jenis_kelamin','$program_studi','$alamat')";
    if (mysqli_query($koneksi, $query)) {
      echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
    } else {
      echo "<script>alert('Data gagal disimpan');history.go(-1);</script>";
    }
  } ?>
</body>

</html>