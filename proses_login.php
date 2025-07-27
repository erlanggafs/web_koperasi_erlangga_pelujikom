<?php
// Ambil data dari form login
$btn = $_POST['login'];
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$pwd_enkripsi = md5($pwd); // Asumsi password tersimpan dalam MD5

// Baca data dari database (pakai tabel 'petugas')
include 'config/koneksi.php';
$sql = "SELECT * FROM petugas WHERE username='$user' AND password='$pwd_enkripsi'";
$query = mysqli_query($koneksi, $sql) or die("SQL Login Error");
$jumlahdata = mysqli_num_rows($query);

if ($jumlahdata > 0) {
    $data = mysqli_fetch_array($query); // Ambil data dan konversi ke array
    session_start();
    $_SESSION['username'] = $user;
    $_SESSION['idsesi'] = session_id();
    $_SESSION['level'] = $data['level'];
    $_SESSION['nama'] = $data['nama_user'];

    // Kalau kamu tidak punya kolom 'ket' dan 'email', bisa hapus baris ini:
    // $_SESSION['ket'] = $data['ket'];
    // $_SESSION['email'] = $data['email'];

    header("location:index_admin.php", true);
} else {
    echo "<script>window.location.assign('index.php?error=yes');</script>";
}
?>
