<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Seluruh Sales</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>  
<body onload="print()">
<?php
include '../config/koneksi.php';
?>   

<div class="container">
    <div class='row'>
        <div class="col-sm-12">
            <div class="text-center">
                <h2>Sistem Informasi Koperasi</h2>
                <h4>Jalan Surya Kencana No 1<br>Pamulang, Kota Tangerang Selatan<br>Provinsi Banten</h4>
                <hr>
                <h3>DATA SELURUH SALES</h3>
                <table class="table table-bordered table-striped table-hover"> 
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Sales</th>
                            <th>Tanggal Sales</th>
                            <th>ID Customer</th>
                            <th>DO Number</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM sales";
                        $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                        $nomor = 0;
                        while ($data = mysqli_fetch_array($query)) {
                            $nomor++;
                            ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $data['id_sales'] ?></td>
                                <td><?= date('d-m-Y', strtotime($data['tgl_sales'])) ?></td>
                                <td><?= $data['id_customer'] ?></td>
                                <td><?= $data['do_number'] ?></td>
                                <td><?= $data['status'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot> 
                        <tr>
                            <td colspan="6" class="text-right">
                                Pamulang, <?= date("d-m-Y") ?>
                                <br><br><br><br>
                                <u><strong>Kepala Koperasi</strong></u><br>
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
