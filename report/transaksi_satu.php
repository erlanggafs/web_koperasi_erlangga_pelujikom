<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Transaksi</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body onload="print()">
    <?php
    include '../config/koneksi.php';

    $id = isset($_GET['id_transaction']) ? mysqli_real_escape_string($koneksi, $_GET['id_transaction']) : null;

    if (!$id) {
        die("<script>alert('ID transaksi tidak valid!'); window.close();</script>");
    }

    $sql = "SELECT * FROM transaksi WHERE id_transaction = '$id'";
    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error: " . mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die("<script>alert('Data tidak ditemukan!'); window.close();</script>");
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h2>Sistem Informasi Koperasi</h2>
                    <h4>Jalan Surya Kencana No 1<br>Pamulang, Kota Tangerang Selatan<br>Provinsi Banten</h4>
                    <hr>
                    <h3>Data Transaksi</h3>

                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <td><strong>ID Transaksi</strong></td>
                                <td><?= htmlspecialchars($data['id_transaction']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>ID Item</strong></td>
                                <td><?= htmlspecialchars($data['id_item']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Jumlah (Quantity)</strong></td>
                                <td><?= htmlspecialchars($data['quantity']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Harga (Price)</strong></td>
                                <td><?= number_format($data['price'], 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td><strong>Total (Amount)</strong></td>
                                <td><?= number_format($data['amount'], 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td><strong>Session ID</strong></td>
                                <td><?= htmlspecialchars($data['session_id']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Keterangan (Remark)</strong></td>
                                <td><?= htmlspecialchars($data['remark']) ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-right">
                                    Pamulang, <?= date("d-m-Y") ?><br><br><br><br>
                                    <u>Kepala Koperasi</u><br>
                                    +62 822 7277 7466
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
