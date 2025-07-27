<div class="container">
    <div class="navbar-header-">
        <?php if (isset($_SESSION['username'])) { ?>
            <p align="right">
                Anda masuk sebagai <strong><?=$_SESSION['username']?></strong>
                <?php if (isset($_SESSION['ket'])) { ?>
                    | <?=$_SESSION['ket']?>
                <?php } ?>
            </p>
        <?php } else {
            // Handle case when user is not logged in
        } ?>
    </div>
</div>