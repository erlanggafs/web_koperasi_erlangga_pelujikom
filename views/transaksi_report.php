<div class="container"> 
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Laporan Transaksi</h3>
                </div>
                <div class="panel-body">
                    <table id="deskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Transaction</th>
                                <th>ID Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Amount</th>
                              
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM transaction"; // sesuaikan nama tabel jika perlu
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");

                            $nomor = 0;
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++;
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['id_transaction'] ?></td>
                                    <td><?= $data['id_item'] ?></td>
                                    <td><?= $data['quantity'] ?></td>
                                    <td><?= number_format($data['price'], 0, ',', '.') ?></td>
                                    <td><?= number_format($data['amount'], 0, ',', '.') ?></td>
                                  
                                    <td>
                                        <a href="report/transaction_detail.php?id=<?= $data['id_transaction'] ?>" target="_blank" class="btn btn-info btn-xs">
                                            <span class="fa fa-print"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9">
                                    <a href="report/transaction_semua.php" target="_blank" class="btn btn-info btn-sm">
                                        <span class="fa fa-print"></span> Cetak Semua Data
                                    </a>
                                    <!-- Tambahkan tombol cetak perbulan dan pertahun jika perlu -->
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
