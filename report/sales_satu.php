<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Sales</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>  
<body onload="print()">
    <?php
    include '../config/koneksi.php';

    // Mengamankan input dari URL
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query dengan kolom yang benar
    $sql = "SELECT * FROM sales WHERE id_sales='$id'";
    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
    $data = mysqli_fetch_array($query);
    ?>   

    <div class="container">
        <div class='row'>
            <div class="col-sm-12">
                <div class="text-center">
                    <br>
                    <h3>Receiving Inspection Report</h3><br>
                    <h4>Koperasi Erlangs</h4>
                    <p>Jalan Surya Kencana No 1<br>Pamulang, Kota Tangerang Selatan<br>Provinsi Banten</p>
                    <hr>
                    <h4>DATA SALES</h4>
                    <table class="table table-bordered table-striped table-hover"> 
                        <tbody>
                            <tr>
                                <td width="200">ID Sales</td> <td><?= $data['id_sales'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Sales</td> <td><?= date('d-m-Y', strtotime($data['tgl_sales'])) ?></td>
                            </tr>
                            <tr>
                                <td>ID Customer</td> <td><?= $data['id_customer'] ?></td>
                            </tr>
                            <tr>
                                <td>DO Number</td> <td><?= $data['do_number'] ?></td>
                            </tr>
                            <tr>
                                <td>Status</td> <td><?= $data['status'] ?></td>
                            </tr>
                        </tbody>
                        <tfoot> 
                            <tr>
                                <td colspan="2" class="text-right">
                                    <p style="margin-bottom: 0;">
                                        Pamulang, <?= date("d-m-Y") ?><br>
                                        <u>Disetujui oleh:</u>
                                    </p>
                                    <br><br><br>
                                    <u><strong>Antoni Riza S.M</strong></u><br>
                                    <p>Kepala Koperasi</p>
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
