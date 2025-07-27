<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
    exit();
}

// Koneksi database (lokasi: ../koneksi.php dari folder views/)
include_once __DIR__ . '/../config/koneksi.php';
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Sales</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label for="tgl_sales" class="col-sm-3 control-label">Tanggal Sales</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_sales" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_customer" class="col-sm-3 control-label">Customer</label>
                            <div class="col-sm-5">
                                <select name="id_customer" class="form-control" required>
                                    <option value="">-- Pilih Customer --</option>
                                    <?php
                                    $sql_customer = "SELECT id_customer, nama_customer FROM customer ORDER BY nama_customer ASC";
                                    $result_customer = mysqli_query($koneksi, $sql_customer);
                                    while ($cust = mysqli_fetch_assoc($result_customer)) {
                                        echo "<option value='{$cust['id_customer']}'>{$cust['id_customer']} - {$cust['nama_customer']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="do_number" class="col-sm-3 control-label">Nomor DO</label>
                            <div class="col-sm-5">
                                <input type="text" name="do_number" class="form-control" placeholder="Inputkan Nomor Delivery Order" required>
                            </div>
                        </div>

                        <!-- ✅ Status enum diperbaiki sesuai database -->
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-3">
                                <select name="status" class="form-control" required>
                                    <option value="baru">Baru</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data Sales
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="?page=sales&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali ke Data Sales
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Proses Simpan Data
if (isset($_POST['submit'])) {
    $tgl_sales   = mysqli_real_escape_string($koneksi, $_POST['tgl_sales']);
    $id_customer = mysqli_real_escape_string($koneksi, $_POST['id_customer']);
    $do_number   = mysqli_real_escape_string($koneksi, $_POST['do_number']);
    $status      = mysqli_real_escape_string($koneksi, $_POST['status']);

    // ✅ Validasi nilai status sesuai enum di database
    $allowed_status = ['baru', 'proses', 'selesai'];
    if (!in_array($status, $allowed_status)) {
        echo "<script>alert('Status tidak valid!');</script>";
        return;
    }

    $sql_insert = "INSERT INTO sales (tgl_sales, id_customer, do_number, status)
                   VALUES ('$tgl_sales', '$id_customer', '$do_number', '$status')";

    $query = mysqli_query($koneksi, $sql_insert);

    if ($query) {
        echo "<script>window.location.assign('?page=sales&actions=tampil');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>
