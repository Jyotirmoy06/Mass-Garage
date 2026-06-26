<?php

session_start();
// require_once 'classes/Settings.php';
// require_once 'classes/Database.php';
// require_once 'classes/Access.php';
require_once 'classes/CallTrackingController.php';

$callTracking = new CallTrackingController();
$allCompletedCallDetails = $callTracking->getTableData();

$pageTitle = "Call Tracking Table - CMS";
$authPage = false;


include "inc/header.php";

?>

<style>

    .fade {
        opacity: 99 !important;
    }

</style>

<div class="container">
    <div class="mt-5 mb-5">

        <?php
            if(isset($_SESSION['totalCalls']))
            {
                $message = "Total Number of Calls: ".$_SESSION['totalCalls']; 
                unset($_SESSION['totalCalls']); 
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=$message?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>

        <?php
            if(isset($_SESSION['totalIncomingCalls']))
            {
                $message = "Total Number of Incoming Calls: ".$_SESSION['totalIncomingCalls'];
                unset($_SESSION['totalIncomingCalls']); 
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=$message?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>

        <?php
            if(isset($_SESSION['totalUpdatedCalls']))
            {
                $message = "Total Number of Incoming Calls Updated in Database: ".$_SESSION['totalUpdatedCalls']; 
                unset($_SESSION['totalUpdatedCalls']); 
        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=$message?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        ?>

        <div class="text-center mt-5 mb-5">
            <form enctype='multipart/form-data' action='call_tracking_updates.php' method='POST'>
                <h1>Upload Inbound Calls CSV</h1>
                <br/>
                <input type='file' name='filename' accept=".csv" style="border: 1px solid black; display: inline-block;">
                </br>
                <br/>
                <input type='submit' name='submitCSV' value='Upload'>
            </form>
        </div>

            
        <h1 class="text-center">Completed Call Details</h1>
        <br/>
        
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="datetime">Date & Time</th>
                    <th class="track_no">Tracking Number</th>
                    <th class="provider">Number Provider</th>
                    <th class="customer_no">Customer Number</th>
                    <th class="click_id">Click ID</th>
                    <th class="notes">Notes</th>
                    <th class="is_valid">Valid Call</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Date & Time</th>
                    <th>Tracking Number</th>
                    <th>Number Provider</th>
                    <th>Customer Number</th>
                    <th>Click ID</th>
                    <th>Notes</th>
                    <th>Valid Call</th>
                    
                </tr>
            </tfoot>
            <tbody>
                <?php
                    foreach ($allCompletedCallDetails as $key => $call) 
                    {

                        $callTime = $call->call_start_time;
                ?>
                        <tr id="row<?=$key?>">
                            <td>
                                <input type="text" name="data<?=$key?>1"  id="data<?=$key?>1" value="<?=$callTime;?>" onblur="saveData(event,'datetime', <?=$call->id?>)" disabled>
                                <button class="btn btn-primary btn-sm" onclick="copyToClipboard('data<?=$key?>1')">Copy</button>
                                <span style="display:none"><?=$callTime;?></span>
                            </td>
                            <td>
                                <input type="text" name="data<?=$key?>2"  id="data<?=$key?>2" value="<?=$call->tracking_no;?>" onblur="saveData(event,'track_no', <?=$call->id?>)" disabled>
                                <span style="display:none"><?=$call->tracking_no;?></span>
                            </td>
                            <td>
                                <input type="text" name="data<?=$key?>3"  id="data<?=$key?>3" value="<?=$call->number_src;?>" onblur="saveData(event,'provider', <?=$call->id?>)" disabled>
                                <span style="display:none"><?=$call->number_src;?></span>
                            </td>
                            <td>
                                <input type="text" name="data<?=$key?>4"  id="data<?=$key?>4" value="<?=$call->call_from_no;?>" onblur="saveData(event,'customer_no', <?=$call->id?>)" disabled>
                                <span style="display:none"><?=$call->call_from_no;?></span>
                            </td>
                            <td>
                                <input type="text" name="data<?=$key?>5"  id="data<?=$key?>5" value="<?=$call->verification_token;?>" onblur="saveData(event,'click_id', <?=$call->id?>)" disabled>
                                <button class="btn btn-primary btn-sm" onclick="copyToClipboard('data<?=$key?>5')">Copy</button>
                                <span style="display:none"><?=$call->verification_token;?></span>
                            </td>
                            <td>
                                <input type="text" name="data<?=$key?>6"  id="data<?=$key?>6" value="<?=$call->notes;?>" onblur="saveData(event,'notes', <?=$call->id?>)">
                                <span style="display:none"><?=$call->notes;?></span>
                            </td>
                            <td>
                                <select name="data<?=$key?>7" id="data<?=$key?>7" onChange="saveData(event,'is_valid', <?=$call->id?>)">
                                    <option <?= ($call->is_valid == "Unknown" || $call->is_valid == NULL) ? "Selected" : ""; ?> >Unknown</option>
                                    <option <?= ($call->is_valid == "Yes") ? "Selected" : ""; ?> >Yes</option>
                                    <option <?= ($call->is_valid == "No") ? "Selected" : ""; ?> >No</option>
                                </select>
                                <span style="display:none">Unknown</span></td>
                        </tr>
                <?php
                    }
                ?>

            </tbody>
        </table> 

    </div>
</div>
<?php include "inc/footer.php"; ?>

