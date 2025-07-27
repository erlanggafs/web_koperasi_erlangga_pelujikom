<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data transaksi sales</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM transaksi WHERE id='" . $_GET ['id'] . "'";
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel-->
                    <div class="text-center">
                        <h2>Sistem Informasi Koperasi </h2>
                        <h4>Jalan Surya kencana No 1  <br> Pamulang, Kota Tangerang Selatan <br>Provinsi Banten</h4>
                        <hr>
                        <h3>DATA transaksi sales</h3>
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
								<tr>
                                    <td>Judul sales</td> <td><?= $data['judul_sales'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Peminjam</td> <td><?= $data['peminjam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pinjam</td> <td><?= $data['tgl_pinjam'] ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>Tanggal Kembali</td> <td><?= $data['tgl_kembali'] ?></td>
                                </tr>
								<tr>
                                    <td>Lama Pinjam</td> <td><?= $data['lama_pinjam'] ?> hari</td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Kisaran  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Kepala Koperasi<strong></u><br>
                                        +62 822 7277 7466
									</td>
								</tr>
							</tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
