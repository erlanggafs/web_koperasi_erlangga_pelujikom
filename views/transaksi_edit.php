<?php
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id='$id'") or die("SQL Edit error");
$data = mysqli_fetch_array($ambil);

// Ambil nilai tahun, bulan, tanggal dari tgl_pinjam dan tgl_kembali
$tglPinjam = explode('-', $data['tgl_pinjam']);
$tahunPinjam = $tglPinjam[0];
$bulanPinjam = ltrim($tglPinjam[1], '0');
$tanggalPinjam = ltrim($tglPinjam[2], '0');

$tglKembali = explode('-', $data['tgl_kembali']);
$tahunKembali = $tglKembali[0];
$bulanKembali = ltrim($tglKembali[1], '0');
$tanggalKembali = ltrim($tglKembali[2], '0');
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Data peminjaman sales</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Judul sales</label>
                            <div class="col-sm-9">
                                <input type="text" name="judulsales" value="<?=$data['judul_sales']?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="peminjam" value="<?=$data['peminjam']?>" class="form-control">
                            </div>
                        </div>

                        <!-- nomor indentitas peminjam -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nomor Identitas</label>
                            <div class="col-sm-9">
                                <input type="text" name="nim" value="<?=$data['nim']?>" class="form-control">
                            </div>
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-2">
                                <select name="tanggal" class="form-control">
                                    <?php for($k=1;$k<=31;$k++) { ?>
                                        <option value="<?=$k?>" <?=($k == $tanggalPinjam ? 'selected' : '')?>><?=$k?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="bulan" class="form-control">
                                    <?php 
                                    $bulan= array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                    for($j=1;$j<=12;$j++) { ?>
                                        <option value="<?=$j?>" <?=($j == $bulanPinjam ? 'selected' : '')?>><?=$bulan[$j]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="tahun" class="form-control">
                                    <?php for($i=2025;$i>=1980;$i--) { ?>
                                        <option value="<?=$i?>" <?=($i == $tahunPinjam ? 'selected' : '')?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                        </div>

                        <!-- Tanggal Kembali -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-2">
                                <select name="tanggal_kem" class="form-control">
                                    <?php for($k=1;$k<=31;$k++) { ?>
                                        <option value="<?=$k?>" <?=($k == $tanggalKembali ? 'selected' : '')?>><?=$k?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="bulan_kem" class="form-control">
                                    <?php 
                                    for($j=1;$j<=12;$j++) { ?>
                                        <option value="<?=$j?>" <?=($j == $bulanKembali ? 'selected' : '')?>><?=$bulan[$j]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="tahun_kem" class="form-control">
                                    <?php for($i=2025;$i>=1980;$i--) { ?>
                                        <option value="<?=$i?>" <?=($i == $tahunKembali ? 'selected' : '')?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="ket" value="<?=$data['keterangan']?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Transaksi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-danger btn-sm">Kembali Ke Data Transaksi</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
if($_POST){
    $judulsales = $_POST['judulsales'];
    $peminjam = $_POST['peminjam'];
    $nim = $_POST['nim'];
    $tglPinjam = $_POST['tahun'] . "-" . str_pad($_POST['bulan'], 2, '0', STR_PAD_LEFT) . "-" . str_pad($_POST['tanggal'], 2, '0', STR_PAD_LEFT);
    $tglKembali = $_POST['tahun_kem'] . "-" . str_pad($_POST['bulan_kem'], 2, '0', STR_PAD_LEFT) . "-" . str_pad($_POST['tanggal_kem'], 2, '0', STR_PAD_LEFT);

    $date1 = new DateTime($tglPinjam);
    $date2 = new DateTime($tglKembali);
    $diff = $date2->diff($date1);
    $lamapinjam = $diff->days;

    $ket = $_POST['ket'];

    $sql = "UPDATE peminjaman SET judul_sales='$judulsales', peminjam='$peminjam', nim='$nim',tgl_pinjam='$tglPinjam', tgl_kembali='$tglKembali', lama_pinjam='$lamapinjam', keterangan='$ket' WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql) or die("SQL Edit Error");

    if ($query) {
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');</script>";
    }
}
?>
