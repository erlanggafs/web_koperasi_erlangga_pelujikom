<?php
if(!isset($_SESSION ['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-shopping-cart"></span> Data Sales</h3>
                </div>
                <div class="panel-body">
                    <table id="deskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sales No</th>
                                <th>No. DO</th>
                                <th>Tanggal</th>
                                <th>Nama Customer</th>
                                <th>Status</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Menggunakan JOIN untuk menggabungkan tabel sales dan customer
                            $sql = "SELECT s.*, c.nama_customer 
                                   FROM sales s 
                                   LEFT JOIN customer c ON s.id_customer = c.id_customer";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            $nomor = 0;
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++;
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['id_sales'] ?></td>
                                    <td><?= $data['do_number'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($data['tgl_sales'])) ?></td>
                                    <td><?= $data['nama_customer'] ?? 'Customer tidak ditemukan' ?></td>
                                    <td>
                                    <?php
                                    $status = strtolower($data['status']);
                                    if ($status === 'baru') {
                                        echo '<span class="label label-warning">Baru</span>';
                                    } elseif ($status === 'proses') {
                                        echo '<span class="label label-primary">Proses</span>';
                                    } elseif ($status === 'selesai') {
                                        echo '<span class="label label-success">Selesai</span>';
                                    } else {
                                        echo '<span class="label label-default">' . htmlspecialchars($data['status']) . '</span>';
                                    }
                                    ?>
                                </td>


                                    <td>
                                        <!-- <a href="?page=sales&actions=detail&id=<?= $data['id_sales'] ?>" class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a> -->
                                        <a href="?page=sales&actions=edit&id=<?= $data['id_sales'] ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="?page=sales&actions=delete&id=<?= $data['id_sales'] ?>" class="btn btn-danger btn-xs">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="?page=sales&actions=tambah" class="btn btn-info btn-sm">
                                        Tambah Data Sales
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>