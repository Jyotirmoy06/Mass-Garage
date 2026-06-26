<?php

session_start();
// require_once 'classes/Settings.php';
// require_once 'classes/Database.php';
// require_once 'classes/Access.php';
require_once 'classes/CallTrackingController.php';

$callTracking = new CallTrackingController();
$botLogs = $callTracking->getBotsLog();

$pageTitle = "Bot Log Table - CMS";
$authPage = false;


include "inc/header.php";

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 p-4 mt-5 text-center">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Bot Log </h1>
            

            <div class="row">
                    <?php
                    if (!is_null($botLogs) && count($botLogs) > 0)
                    {
                        ?>
                    <div >
                        <table class="table table-bordered table-hover" id="example" cellspacing="0" width="100%">
                            <thead class="thead-dark" style="text-align: left;">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Ip Address</th>
                                <th scope="col">Visited Page</th>
                                <th scope="col">Session</th>
                                <th scope="col">Click Date</th>
                                <th scope="col">Click Time</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach($botLogs as $log)
                                {
                                    $db = new Database();
                                    $cat_name = $db->readData('cms_categories', [], ['category_id' => $post->category_id]);
                                ?>
                                    <tr style="text-align: left;">
                                        <td><?= $log->id ?></td>
                                        <td><?= $log->user_ip ?></td>
                                        <td><?= $log->page_link ?></td>
                                        <td><?= $log->session ?></td>
                                        <td><?= $log->click_date ?></td>
                                        <td><?= $log->click_time ?></td>
                                        <td>
                                            <a href="<?= Root.'/inc/location_page_delete.inc.php?botLogId='.$log->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this log?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        
                    </div>
                    <?php
                    }
                    else
                    {
                    ?>
                    <div class="alert alert-warning"><i class=""></i> Oops!! No article found</div>
                    <?php
                    }
                    ?>

            </div>

        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
