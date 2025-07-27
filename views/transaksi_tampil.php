<?php
// Cek session login
if (!isset($_SESSION['idsesi'])) {
    echo "<script>window.location.assign('../index.php');</script>";
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <span class="fa fa-user-plus"></span> Riwayat Transaksi
                    </h3>
                    <a href="?page=transaksi&actions=tambah" class="btn btn-primary btn-sm pull-right">
                        <span class="fa fa-plus"></span> Tambah Transaksi
                    </a>
                </div>

                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Transaksi</th>
                                <th>Nama Item</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Query join dengan tabel item
                            $sql = "SELECT t.*, i.nama_item, i.uom 
                                    FROM transaction t 
                                    LEFT JOIN item i ON t.id_item = i.id_item 
                                    ORDER BY t.id_transaction DESC";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Error: " . mysqli_error($koneksi));
                            $nomor = 0;

                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++;
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['id_transaction'] ?></td>
                                    <td>
                                        <?= !empty($data['nama_item']) ? $data['nama_item'] : 'Item tidak ditemukan' ?>
                                        <?php if (!empty($data['uom'])): ?>
                                            <small class="text-muted">(<?= $data['uom'] ?>)</small>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $data['quantity'] ?></td>
                                    <td>Rp <?= number_format($data['price'], 0, ',', '.') ?></td>
                                    <td>Rp <?= number_format($data['amount'], 0, ',', '.') ?></td>
                                    <td><?= $data['remark'] ?></td>
                                    <td>
                                        <a href="?page=transaksi&actions=edit&id=<?= $data['id_transaction'] ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="?page=transaksi&actions=delete&id=<?= $data['id_transaction'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus transaksi ini?')">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="panel-footer">
                    <i>Data transaksi terakhir diperbarui otomatis</i>
                </div>
            </div>
        </div>
    </div>
</div>
