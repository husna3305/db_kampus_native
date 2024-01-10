<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Mahasiswa</title>
</head>

<body>
  <?php
  require("koneksi.php");
  $query = "SELECT * FROM tabel_mahasiswa";
  $result = mysqli_query($koneksi, $query);
  ?>
  <a href="mahasiswa_tambah.php">Tambah Data</a>

  <table border="1" style="width: 800px;">
    <thead>
      <th>No.</th>
      <th>NIM</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Program Studi</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </thead>
    <tbody>
      <?php foreach ($result as $key => $value) { ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $value['nim'] ?></td>
          <td><?= $value['nama_mahasiswa'] ?></td>
          <td><?= $value['jenis_kelamin'] ?></td>
          <td><?= $value['program_studi'] ?></td>
          <td><?= $value['alamat'] ?></td>
          <td>
            <a href="mahasiswa_ubah.php?nim=<?= $value['nim'] ?>">Ubah</a>
            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')" href="mahasiswa.php?nim=<?= $value['nim'] ?>">Hapus</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>
<?php if (!empty($_GET['nim'])) {
  extract($_GET);
  $query = "DELETE FROM tabel_mahasiswa WHERE nim='$nim'";
  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data berhasil dihapus');window.location='mahasiswa.php';</script>";
  } else {
    echo "<script>alert('Data gagal dihapus');window.location='mahasiswa.php';</script>";
  }
} ?>
