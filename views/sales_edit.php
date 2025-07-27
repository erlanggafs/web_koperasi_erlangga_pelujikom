<?php
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM sales WHERE id_sales ='$id'") or die ("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Sales</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="tgl_sales" class="col-sm-3 control-label">Tanggal Sales</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_sales" value="<?=$data['tgl_sales']?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_customer" class="col-sm-3 control-label">ID Customer</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_customer" value="<?=$data['id_customer']?>" class="form-control" placeholder="Masukkan ID Customer">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="do_number" class="col-sm-3 control-label">Nomor DO (Delivery Order)</label>
                            <div class="col-sm-9">
                                <input type="text" name="do_number" value="<?=$data['do_number']?>" class="form-control" placeholder="Masukkan DO Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-3">
                                <select name="status" class="form-control">
                                    <option value="pending" <?=($data['status']=='pending')?'selected':''?>>Pending</option>
                                    <option value="proses" <?=($data['status']=='proses')?'selected':''?>>Proses</option>
                                    <option value="selesai" <?=($data['status']=='selesai')?'selected':''?>>Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Sales
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="?page=sales&actions=tampil" class="btn btn-danger btn-sm">Kembali Ke Data Sales</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
if ($_POST) {
    // Ambil data dari form
    $tgl_sales    = $_POST['tgl_sales'];
    $id_customer  = $_POST['id_customer'];
    $do_number    = $_POST['do_number'];
    $status       = $_POST['status'];

    // Query update
    $sql = "UPDATE sales SET 
                tgl_sales='$tgl_sales', 
                id_customer='$id_customer', 
                do_number='$do_number', 
                status='$status' 
            WHERE id_sales='$id'";

    $query = mysqli_query($koneksi, $sql) or die("SQL Update Error");

    if ($query) {
        echo "<script>window.location.assign('?page=sales&actions=tampil');</script>";
    } else {
        echo "<script>alert('Update data gagal');</script>";
    }
}
?>
