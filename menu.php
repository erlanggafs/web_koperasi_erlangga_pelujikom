<!-- menu.php -->
<div id="sidebar">
    <h4>Koperasi Erlangs</h4>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="?page=utama"><i class="fa fa-home"></i> Home</a></li>

        <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1): ?>

            <!-- Master Data -->
            <li>
                <a data-toggle="collapse" href="#masterSubmenu" role="button" aria-expanded="false" aria-controls="masterSubmenu">
                    <i class="fa fa-database"></i> Master Data <span class="caret"></span>
                </a>
                <ul class="collapse" id="masterSubmenu">
                    <li><a href="?page=sales&actions=tampil">Data Sales</a></li>
                    <li><a href="?page=transaksi&actions=tampil">Transaksi</a></li>
                </ul>
            </li>

            <!-- Reports -->
            <li>
                <a data-toggle="collapse" href="#reportSubmenu" role="button" aria-expanded="false" aria-controls="reportSubmenu">
                    <i class="fa fa-file-text-o"></i> Reports <span class="caret"></span>
                </a>
                <ul class="collapse" id="reportSubmenu">
                    <li><a href="?page=sales&actions=report">Laporan Sales</a></li>
                    <li><a href="?page=transaksi&actions=report">Laporan Transaksi</a></li>
                </ul>
            </li>

            <!-- Customer -->
            <li><a href="?page=user&actions=tampil"><i class="fa fa-users"></i> Customer</a></li>

        <?php endif; ?>

        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
        <?php endif; ?>
    </ul>
</div>
