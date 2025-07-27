<div class="container"> 
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Laporan Data Sales</h3>
                </div>
                <div class="panel-body">
                    <table id="deskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Sales</th>
                                <th>Tanggal Sales</th>
                                <th>ID Customer</th>
                                <th>DO Number</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                    <td>
                                        <a href="report/sales_satu.php?id=<?= $data['id_sales'] ?>" target="_blank" class="btn btn-info btn-xs">
                                            <span class="fa fa-print"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="report/sales_semua.php" target="_blank" class="btn btn-info btn-sm">
                                        <span class="fa fa-print"></span> Cetak Semua Sales
                                    </a>
                                    <!-- <a href="#cetak_perbulan" class="btn btn-info btn-sm">
                                        <span class="fa fa-print"></span> Cetak Perbulan
                                    </a>
                                    <a href="#cetak_pertahun" class="btn btn-info btn-sm">
                                        <span class="fa fa-print"></span> Cetak Pertahun
                                    </a> -->
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
