<?php
include_once __DIR__ . '/../config/koneksi.php';

$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM transaction WHERE id_transaction='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Transaksi</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <!-- ID Item -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Item</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_item" class="form-control" value="<?=$data['id_item']?>" required>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="quantity" class="form-control" value="<?=$data['quantity']?>" required>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Harga Satuan</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" value="<?=$data['price']?>" required>
                            </div>
                        </div>

                      

                        <!-- Remark -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="remark" class="form-control"><?=$data['remark']?></textarea>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Transaksi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel-footer">
                    <a href="?page=transaksi&actions=tampil" class="btn btn-danger btn-sm">Kembali ke Data Transaksi</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
if ($_POST) {
    $id_item = $_POST['id_item'];
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];
    $amount = $quantity * $price;
    $session_id = $_POST['session_id'];
    $remark = $_POST['remark'];

    $sql = "UPDATE transaction SET 
                id_item='$id_item', 
                quantity='$quantity', 
                price='$price', 
                amount='$amount', 
                session_id='$session_id', 
                remark='$remark' 
            WHERE id_transaction='$id'";

    $query = mysqli_query($koneksi, $sql) or die("SQL Update Error: " . mysqli_error($koneksi));

    if ($query) {
        echo "<script>window.location.assign('?page=transaksi&actions=tampil');</script>";
    } else {
        echo "<script>alert('Gagal update transaksi');</script>";
    }
}
?>
