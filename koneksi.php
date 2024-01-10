<?php
$host       = "localhost";
$user       = "root";
$password   = "root";
$database   = "db_kampus";
$koneksi    = mysqli_connect($host, $user, $password, $database);
if (!$koneksi) {
  die("Koneksi database gagal" . mysqli_connect_error());
}
