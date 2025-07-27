<?php
// koneksi ke database
include_once __DIR__ . '/../config/koneksi.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} // Penting untuk menggunakan session_id()

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_item     = $_POST['id_item'] ?? '';
    $quantity    = (int) ($_POST['quantity'] ?? 0);
    $price       = (int) ($_POST['price'] ?? 0);
    $remark      = $_POST['remark'] ?? '';
    $session_id  = session_id(); // Ambil session ID dari backend

    // Validasi input
    if (empty($id_item) || $quantity <= 0 || $price <= 0) {
        echo "<script>alert('Data tidak lengkap atau tidak valid!'); window.history.back();</script>";
        exit;
    }

    $amount = $quantity * $price;

    // Insert data transaksi
    $sql = "INSERT INTO transaction (id_item, quantity, price, amount, session_id, remark)
            VALUES ('$id_item', '$quantity', '$price', '$amount', '$session_id', '$remark')";

    $query = mysqli_query($koneksi, $sql) or die("SQL Simpan transaksi Error: " . mysqli_error($koneksi));

    if ($query) {
        echo "<script>
            alert('Transaksi berhasil disimpan!');
            window.location.assign('?page=transaksi&actions=tampil');
        </script>";
    } else {
        echo "<script>alert('Gagal menyimpan transaksi');</script>";
    }
}
?>

<!-- Form Input Transaksi -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Transaksi</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Item</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_item" class="form-control" placeholder="ID Item" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="quantity" class="form-control" placeholder="Jumlah Barang" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Harga Satuan</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" placeholder="Harga per Barang" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="remark" class="form-control" placeholder="Keterangan tambahan..."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Transaksi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel-footer">
                    <a href="?page=transaksi&actions=tampil" class="btn btn-danger btn-sm">Kembali ke Data Transaksi</a>
                </div>
            </div>
        </div>
    </div>
</div>
