<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Transaksi Sales Perbulan</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <?php
        include '../config/koneksi.php';

        $ambilbln = str_pad($_POST['bulan'], 2, '0', STR_PAD_LEFT); // pastikan 2 digit
        $ambilthn = $_POST['tahun'];

        // Nama bulan, bisa dibuat array agar ringkas
        $bulanList = [
            "01" => "JANUARI",
            "02" => "FEBRUARI",
            "03" => "MARET",
            "04" => "APRIL",
            "05" => "MEI",
            "06" => "JUNI",
            "07" => "JULI",
            "08" => "AGUSTUS",
            "09" => "SEPTEMBER",
            "10" => "OKTOBER",
            "11" => "NOVEMBER",
            "12" => "DESEMBER",
        ];

        $bulanNama = $bulanList[$ambilbln] ?? "Unknown";

        // Query menyesuaikan struktur kolom baru
        // Asumsi ada kolom 'tgl_transaksi' sebagai tanggal transaksi
        $sql = "SELECT * FROM transaksi WHERE DATE_FORMAT(tgl_transaksi, '%Y-%m') = '$ambilthn-$ambilbln' ORDER BY id_transaction ASC";
        $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah: " . mysqli_error($koneksi));
        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2>Sistem Informasi Koperasi</h2>
                        <h4>Jalan Surya Kencana No 1<br>Pamulang, Kota Tangerang Selatan<br>Provinsi Banten</h4>
                        <hr>
                        <h3>DATA TRANSAKSI SALES BULAN <?= $bulanNama . " " . $ambilthn ?></h3>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Transaction</th>
                                    <th>ID Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Session ID</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 0;
                                while ($data = mysqli_fetch_assoc($query)) {
                                    $nomor++;
                                    ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= htmlspecialchars($data['id_transaction']) ?></td>
                                        <td><?= htmlspecialchars($data['id_item']) ?></td>
                                        <td><?= htmlspecialchars($data['quantity']) ?></td>
                                        <td><?= number_format($data['price'], 0, ',', '.') ?></td>
                                        <td><?= number_format($data['amount'], 0, ',', '.') ?></td>
                                        <td><?= htmlspecialchars($data['session_id']) ?></td>
                                        <td><?= htmlspecialchars($data['remark']) ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" class="text-right">
                                        Kisaran, <?= date("d-m-Y") ?><br><br><br><br>
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
