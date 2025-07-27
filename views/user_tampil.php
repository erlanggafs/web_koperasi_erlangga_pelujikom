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
                    <h3 class="panel-title"><span class="fa fa-users"></span> Kelola Customer</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                              <th>No.</th>
                              <th>Nama Customer</th>
                              <th>Alamat</th>
                              <th>Telepon</th>
                              <th>Fax</th>
                              <th>Email</th>
                              <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil data dari tabel customer
                            $sql = "SELECT * FROM customer";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            $nomor = 0;

                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++;
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['nama_customer'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td><?= $data['telp'] ?></td>
                                    <td><?= $data['fax'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td>
                                        <a href="?page=customer&actions=edit&id=<?= $data['id_customer'] ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="?page=customer&actions=delete&id=<?= $data['id_customer'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus Data Ini?')">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
