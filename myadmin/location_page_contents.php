<?php

session_start();
// require_once 'classes/Settings.php';
require_once 'classes/Database.php';
// require_once 'classes/Access.php';
require_once 'classes/CallTrackingController.php';

$callTracking = new CallTrackingController();
$allCompletedCallDetails = $callTracking->getTableData();

$db = new Database();
$allLocationData = $db->read_query("location_page_contents", ["id", "slug", "pageType", "metaTitle", "status"]);
// var_dump($allLocationData);
// die();

$pageTitle = "Location Page Contents - CMS";
$authPage = false;



$url = $_SERVER['SERVER_NAME']; //'http://www.example.com/path/to/file.php';
$domain = parse_url($url, PHP_URL_HOST);
// echo $domain; // Outputs: example.com




include "inc/header.php";



?>

<style>

    .fade {
        opacity: 99 !important;
    }

    #DataTables_Table_0_length {
        text-align: left;
    }

    #DataTables_Table_0_filter {
        text-align: right;
        margin-bottom: 15px;
    }

    #DataTables_Table_0_filter label, #DataTables_Table_0_length label {
        display: inline-flex !important;
    }

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12 p-4 mt-5 text-center">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Location Pages List</h1>
            <!-- <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <form class="input-group mb-3" action="<?php // echo $_SERVER['PHP_SELF']; ?>" method="GET">

                        <select name="sort" class="custom-select">
                            <option value="">Sort by</option>
                            <option value="short_name">Name</option>
                            <option value="ASC">Ascending</option>
                            <option value="DESC">Descending</option>
                        </select>
                        <input type="text" name="keyword" class="form-control" placeholder="Search for anything..."/>
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-primary ">
                            <i class="fa fa-search"></i>
                        </button>
                        </div>
                    </form>
                </div>
            </div> -->

            <?php
                if($_SESSION['pageStatus'] != "")
                {
            ?>
                    <div class="alert alert-success" role="alert">
                        <?=$_SESSION['pageStatus']?>
                    </div>
            <?php
                }
                unset($_SESSION['pageStatus']);
            ?>

            <div class="row">
                    <?php
                    if (!is_null($allLocationData) && count($allLocationData) > 0)
                    {
                    ?>
                    <div >
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark" style="text-align: left;">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Page Type</th>
                                <th scope="col">Meta Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach($allLocationData as $data)
                                {
                                    // var_dump($data);
                                    // $db = new Database();
                                    // $cat_name = $db->readData('cms_categories', [], ['category_id' => $post->category_id]);
                                ?>
                                    <tr style="text-align: left;">
                                        <td><?= $data["id"] ?></td>
                                        <td><?= $data["slug"] ?></td>
                                        <td><?= $data["pageType"] ?></td>
                                        <td><?= $data["metaTitle"] ?></td>
                                        <td>
                                            <?php
                                            if($data["status"] == '1')
                                            {
                                                echo '<span class="text-success"> Active </span>';
                                            }
                                            elseif ($data["status"] == '-1')
                                            {
                                                echo '<span class="text-danger"> Deleted </span>';
                                            }
                                            else
                                            {
                                                echo '<span class="text-warning"> Inactive </span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <a href="<?= Root.'/edit_location_page.php?pageId='.$data["id"] ?>" class="btn btn-outline-primary btn-sm mx-3">Edit</a>
                                            <?php
                                                if($data["pageType"] != "Default")
                                                {
                                            ?> 
                                                    <a href="<?= $domain.'/locations'.$data["slug"] ?>" target="_blank" class="btn btn-primary btn-sm">View</a>
                                                    <a href="<?= Root.'/inc/location_page_delete.inc.php?pageId='.$data["id"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this city page?')">Delete</a>
                                            <?php
                                                }
                                            ?>
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('.table');
</script>
<?php include "inc/footer.php"; ?>

