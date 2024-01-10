<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Mahasiswa</title>
</head>
<?php
require("koneksi.php");
$data_not_found = "<script>alert('Data tidak ditemukan');window.location='index.php'</script>";
if (!empty($_GET['nim'])) {
  $nim_old = $_GET['nim'];
  $query = "SELECT * FROM tabel_mahasiswa WHERE nim='$nim_old'";
  $result_mahasiswa = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result_mahasiswa);
  if (!$row) {
    echo $data_not_found;
  }
} else {
  echo $data_not_found;
}
?>
<body>
  <form action="" method="POST">
    <label for="">NIM</label>
    <input type="text" name="nim" value="<?= $row['nim'] ?>"> </br>
    <label for="">Nama Lengkap</label>
    <input type="text" name="nama_mahasiswa" value="<?= $row['nama_mahasiswa'] ?>"> </br>
    <label for="">Jenis Kelamin</label>
    <?php $list_jenis_kelamin = ['Laki-laki', 'Perempuan'];
    foreach ($list_jenis_kelamin as $value) {
      $checked = $value == $row['jenis_kelamin'] ? 'checked' : '';
    ?>
      <input type="radio" name="jenis_kelamin" value="<?= $value ?>" <?= $checked ?>> <?= $value ?>
    <?php }
    ?>
    </br>
    <label for="">Program Studi</label>
    <select name="program_studi">
      <option value="">- Pilih -</option>
      <?php $list_program_studi = ['Teknik Informatika', 'Sistem Informasi', 'Teknologi Informasi'];
      foreach ($list_program_studi as $value) {
        $selected_program_studi = $value == $row['program_studi'] ? 'selected' : '';
      ?>
        <option <?= $selected_program_studi ?>><?= $value ?></option>
      <?php }
      ?>
    </select>
    </br>
    <label for="">Alamat</label>
    <textarea name="alamat"><?= $row['alamat'] ?></textarea> </br>
    <button type="submit">SUBMIT</button>
  </form>
  <?php if (!empty($_POST['nim'])) {
    extract($_POST);
    $query = "UPDATE tabel_mahasiswa SET nim='$nim',nama_mahasiswa='$nama_mahasiswa',jenis_kelamin='$jenis_kelamin',
              program_studi='$program_studi',alamat='$alamat' WHERE nim='$nim_old'";
    if (mysqli_query($koneksi, $query)) {
      echo "<script>alert('Data berhasil diubah');window.location='index.php';</script>";
    } else {
      echo "<script>alert('Data gagal diubah');history.go(-1);</script>";
    }
  } ?>
</body>
</html>



