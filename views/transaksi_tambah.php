<?php
$judulsales = $_GET['judulsales'];
$ambil = mysqli_query($koneksi, "SELECT * FROM sales WHERE judul_sales ='$judulsales'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Transaksi</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="judulsales" class="col-sm-3 control-label">Judul sales</label>
                            <div class="col-sm-9">
                                <input type="text" name="judulsales" value="<?= $data['judul_sales'] ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Nama Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="peminjam" class="form-control" placeholder="Nama Peminjam" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nim" class="col-sm-3 control-label">Nomor Identitas</label>
                            <div class="col-sm-9">
                                <input type="text" name="nim" class="form-control" placeholder="Nomor Identitas" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tglPinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglPinjam" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tglKembali" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglKembali" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="ket" class="form-control" placeholder="Keterangan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan peminjaman
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel-footer">
                    <a href="?page=sales&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data sales
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_POST) {
    $judulsales   = $_POST['judulsales'] ?? '';
    $peminjam    = $_POST['peminjam'] ?? '';
    $nim    = $_POST['nim'] ?? '';
    $tglPinjam   = $_POST['tglPinjam'] ?? '';
    $tglKembali  = $_POST['tglKembali'] ?? '';
    $ket         = $_POST['ket'] ?? '';

    // Validasi wajib
    if (empty($judulsales) || empty($peminjam) || empty($tglPinjam) || empty($tglKembali)) {
        echo "<script>alert('Semua data wajib diisi!'); window.history.back();</script>";
        exit;
    }

    // Validasi tanggal kembali harus >= tanggal pinjam
    if (strtotime($tglKembali) < strtotime($tglPinjam)) {
        echo "<script>alert('Tanggal kembali tidak boleh lebih awal dari tanggal pinjam!'); window.history.back();</script>";
        exit;
    }

    // Hitung lama pinjam
   $lamaPinjam = ((strtotime($tglKembali) - strtotime($tglPinjam)) / (60 * 60 * 24)) + 1;

    // Insert ke tabel peminjaman
    $sql = "INSERT INTO peminjaman (judul_sales, peminjam, nim, tgl_pinjam, tgl_kembali, lama_pinjam, keterangan) 
            VALUES ('$judulsales', '$peminjam','$nim', '$tglPinjam', '$tglKembali', '$lamaPinjam', '$ket')";

    // Update status sales jadi 'Dipinjam'
    $sqlsales = "UPDATE sales SET status='Dipinjam' WHERE judul_sales='$judulsales'";

    $query = mysqli_query($koneksi, $sql) or die("SQL Simpan peminjaman Error: " . mysqli_error($koneksi));
    $querysales = mysqli_query($koneksi, $sqlsales) or die("SQL Update sales Error: " . mysqli_error($koneksi));

    if ($query && $querysales) {
        echo "<script>
            alert('Data peminjaman berhasil disimpan!');
            window.location.assign('?page=peminjaman&actions=tampil');
        </script>";
    } else {
        echo "<script>alert('Simpan Data Gagal');</script>";
    }
}
?>
