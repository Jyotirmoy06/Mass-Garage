<?php
$pageTitle = "Create User - CMS";
require_once 'classes/Settings.php';
require_once 'classes/Database.php';
require_once 'classes/Access.php';
$authPage = false;
if (Access::check('admin') == false)
{
    header("location: ".Root."/");
}
include "inc/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Create User </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="<?= Root.'/inc/user_form.inc.php'; ?>" method="post" id="form" enctype="multipart/form-data" class="col-md-10 offset-1">

                            <?php
                            if(isset($success) && !empty($success))
                            {
                                ?>
                                <div class="alert alert-success">
                                    <?= $success['message'] ?>
                                </div>
                                <?php
                            }
                            elseif(isset($error) && !empty($error))
                            {
                                ?>
                                <div class="alert alert-danger">
                                    <?= $error['message'] ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <label for="short_name">Username</label>
                                <?php
                                if(in_array('username', $errors))
                                {
                                    ?>
                                    <div class="invalid-feedback d-block">
                                        Please provide a unique username!!
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder=Password">
                                <label for="long_name">Password</label>
                            </div>
                            <?php
                            if(in_array('password', $errors))
                            {
                                ?>
                                <div class="invalid-feedback d-block">
                                    Please provide a 6 characters password
                                </div>
                                <?php
                            }
                            ?>
                            <label for="role" class="control-label mb-3">Access Level/Role</label>
                            <br/>
                            <ul class="list">
                                <?php
                                $db =  new Database();
                                $roles =  $db->readData('cms_roles', []);
                                foreach ($roles as $key => $role)
                                {
                                if (Access::check('super admin') == false && $roles[$key]->role_id > 3)
                                {
//                                    var_dump('failed');
                                    continue;
                                }
                                ?>
                                <li class="form-check">
                                    <label style="text-transform: capitalize;" class="form-check-label" for="<?= $role->role ?>"><input checked class="form-check-input" type="radio" name="access_level" id="<?= $role->role ?>" value="<?= $role->role_id ?>"> <?= $role->role ?> </label>
                                </li>
                                <?php

                                }
                                ?>
                            </ul>
                            <div class="my-4 d-flex justify-content-end">
                                <button name="submit" type="submit" class="mx-3 btn btn-success">Create User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
