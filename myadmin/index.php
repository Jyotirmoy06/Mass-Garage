<?php
$pageTitle = "CMS Home";
$authPage = false;
include "inc/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 p-4 mt-5 text-center">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Mass Garage Doors Expert CMS [ Admin Panel ]</h1>
            <h4>Welcome, <br/> <b><?= $_SESSION['username']; ?></b></h4>
            <a href="<?= Root ?>/inc/logout.inc.php" class="btn btn-danger my-4">Logout</a>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
