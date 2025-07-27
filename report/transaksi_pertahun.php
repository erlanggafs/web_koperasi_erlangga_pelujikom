<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data transaksi Arsip Pertahun</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $ambilthn=$_POST['tahun'];

        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel-->
                    <div class="text-center">
                        <h2>Sistem Informasi Koperasi </h2>
                        <h4>Jalan Surya kencana No 1  <br> Pamulang, Kota Tangerang Selatan <br>Provinsi Banten</h4>
                        <hr>
                        <h3>DATA transaksi sales TAHUN   <? echo "$ambilthn"; ?></h3>
                        <table class="table table-bordered table-striped table-hover">
                        <tbody>
                <thead>
								<tr>
									<th>No.</th><th width="17%"><center>Judul sales</th><th width="10%"><center>Peminjam</th><th width="14%"><center>Tanggal Pinjam</center></th><th><center>Tanggal Kembali</th><th><center>Lama Pinjam</th>
								</tr>
								</thead>
							<tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM transaksi WHERE substr(tgl_pinjam,1,4)='$ambilthn'";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['judul_sales'] ?></td>
                                    <td><?= $data['peminjam'] ?></td>
                                    <td><?= $data['tgl_pinjam'] ?></td>
                                    <td><?= $data['tgl_kembali'] ?></td>
                                    <td><?= $data['lama_pinjam'] ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                            </tbody>
                        </tbody>

                            <tfoot>
                              <tr>
                                <td colspan="8" class="text-right">
                                        Kisaran,  &nbsp <?= date("d-m-Y") ?>
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
