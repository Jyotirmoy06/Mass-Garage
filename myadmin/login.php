<?php
$pageTitle = "CMS Login";
$authPage = true;
include "inc/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 p-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in </h1>
                </div>
                <div class="card-body">
                    <div id="logreg-forms">
                        <form class="form-signin" action="inc/login.inc.php" method="POST">
                            <?php
                            if(isset($_GET['error']) && !empty($_GET['error']))
                            {
                            ?>
                            <div class="alert alert-danger">
                                <span>
                                    <?= $message ?>
                                </span>
                            </div>
                            <?php
                            }
                            ?>
                            <input type="text" id="inputEmail" name="username" class="form-control my-3" placeholder="Username" required="" autofocus=""/>
                            <input type="password" id="inputPassword" name="password" class="form-control my-3" placeholder="Password" required=""/>

                            <button class="btn btn-success btn-block" type="submit" name="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                        </form>

                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>