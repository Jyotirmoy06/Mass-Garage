<?php
require_once 'classes/Settings.php';
require_once 'classes/Database.php';
require_once 'classes/Access.php';
if (isset($_GET['pageId']) && !empty($_GET['pageId']))
{
    $pageId = $_GET['pageId'];

    $db = new Database();
    $locationPageData = $db->readData('location_page_contents', [], ['id' => $pageId]);
    $pageTitle = "Edit Location Page | ".$article[0]->short_name ."- CMS";
}
else
{
    header("Location: ".Root."/location_page_contents.php");
}
$authPage = false;


$locationPageData = $locationPageData[0];

$explodeValue = explode("/", $locationPageData->slug);
// var_dump($explodeValue);
// echo "<br/>";
// echo $locationPageData->pageType;
// die();

// if ($article[0]->author_id != $_SESSION['id'])
// {
//     if (Access::check('manager') == false)
//     {
//         header("location: ".Root."/");
//     }
// }
include "inc/header.php";
//var_dump(Access::check('manager'));
?>


<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Update Location Page</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="<?= Root.'/inc/location_page_form.inc.php'; ?>" method="post" id="form" enctype="multipart/form-data" class="col-md-10 offset-1">
                            
                            <input type="hidden" name="id" value="<?= $locationPageData->id ?>"/>
                            <?php
                            if(isset($success) && !empty($success))
                            {
                            ?>
                            <div class="alert alert-success">
                                <?= $success['message'] ?>
                            </div>
                            <?php
                            }
                            ?>
                            

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="city" name="city" value="<?= $locationPageData->city ?: ''; ?>" placeholder="Short Name" >
                                <label for="name">City Name*</label>
                            </div>

                            <input type="hidden" id="citySlug" name="citySlug" value="<?=$explodeValue[2];?>">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="county" name="county" value="<?= $locationPageData->county ?: ''; ?>" placeholder="Short Name" >
                                <label for="name">County Name*</label>
                            </div>

                            <input type="hidden" id="countySlug" name="countySlug" value="<?=$explodeValue[1];?>">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="map" name="map" placeholder="Short Name" value="<?= $locationPageData->map ?: ''; ?>" required>
                                <label for="name">Map Link*</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="metaTitle" name="metaTitle" value="<?= $locationPageData->metaTitle ?>" placeholder="Short Name">
                                <label for="name">Meta Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="metaDescription" name="metaDescription" value="<?= $locationPageData->metaDescription ?>" placeholder="Short Name">
                                <label for="name">Meta Description</label>
                            </div>

                            <div class="form-floating mb-3" id="">
                                <select id="pageType" name="pageType" class="form-control" required>
                                    <option value="">Select Category*</option>
                                    <option value="Default" <?= ($locationPageData->pageType == "Default") ? "selected" : "" ?>>Default</option>
                                    <option value="LocationBased" <?= ($locationPageData->pageType == "LocationBased") ? "selected" : "" ?>>LocationBased</option>
                                </select>
                                <label for="pageType">Page Type*</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="h1" name="h1" value="<?= $locationPageData->h1 ?>" placeholder="Short Name">
                                <label for="h1">h1</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="topBlackH3" name="topBlackH3" value="<?= $locationPageData->topBlackH3 ?>" placeholder="Short Name">
                                <label for="topBlackH3">Top Black H3</label>
                            </div>

                            
                            <label for="short_description" class="control-label mb-3">Top Black Html</label>
                            <textarea name="topBlackHtml" id="topBlackHtml" class="form-control" cols="10" rows="3" placeholder="">
                                <?= $locationPageData->topBlackHtml ?>
                            </textarea>
                            <br>


                            <br>
                            <label for="article_content" class="control-label mb-3">Text Block Top Left</label>
                            <textarea name="textBlockTopLeft" id="textBlockTopLeft" class="editor" cols="10" rows="5" placeholder="">
                                <?= $locationPageData->textBlockTopLeft ?>
                            </textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Black Text Section 1</label>
                            <textarea name="blackTextSection1" id="blackTextSection1" class="editor" cols="10" rows="5" placeholder="">
                                <?= $locationPageData->blackTextSection1 ?>
                            </textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Text Block 2nd Right</label>
                            <textarea name="textBlock2ndRight" id="textBlock2ndRight" class="editor" cols="10" rows="5" placeholder="">
                                <?= $locationPageData->textBlock2ndRight ?>
                            </textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Black Text Section 2</label>
                            <textarea name="blackTextSection2" id="blackTextSection2" class="editor" cols="10" rows="5" placeholder="">
                                <?= $locationPageData->blackTextSection2 ?>
                            </textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Text Block Bottom Left</label>
                            <textarea name="textBlockBottomLeft" id="textBlockBottomLeft" class="editor" cols="10" rows="5" placeholder="">
                                <?= $locationPageData->textBlockBottomLeft ?>
                            </textarea>
                            <br>

                            <div class="form-group my-3">
                                <label for="large_image_url" class="control-label mb-3">Featured Image <br/><small class="text-danger">(Allowed size: less than 10MB, Format: jpg, bmp, png)</small></label>
                                <input type="file" name="image_url" onchange="imageUpload('large', event)" id="image_url" class="form-control"/>
                                <input type="hidden" name="large_image_url" id="large_image_url" value="<?= $locationPageData->image ?: ''; ?>" class="form-control"/>

                                <div class="alert alert-danger" style="display: none; margin-top: 7px;" id="err"></div>
                                <div id="preview" style="<?= $locationPageData->image == '' ? 'display: none;': ''; ?> margin-top: 10px; width: 150px; height: 150px;">
                                    <label>Preview:</label><br/>
                                    <img src="<?= $locationPageData->image ?: ''; ?>" style="width: 100%; height: auto; object-fit: cover;" alt="">
                                </div>
                                <div class="progress my-3 large-progress-bar d-none">
                                    <div class="progress-bar progress-bar-striped bg-warning" id="progressbar-large" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <br>
                            <label for="status" class="control-label my-2">Publish<br/></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status" id="status" style="height: 30px; width: 55px;" <?= $locationPageData->status == '1' ? 'checked="true"': ''; ?> type="checkbox"  value="1">
                            </div>
                            <div class="my-4 d-flex justify-content-end">
                                <button name="submit" type="submit" class="mx-3 btn btn-success">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>
<script type="text/javascript">

    $(document).ready(function(){

        $('#city').keyup(function () {
            var title = $(this).val();
            var slug = title.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
            $('#citySlug').val(slug);
        });
        $('#county').keyup(function () {
            var title = $(this).val();
            var slug = title.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
            $('#countySlug').val(slug);
        });
    });

    $("#city").focusout(function(){
        // $(this).css("background-color", "#FFFFHF");
        var city = $(this).val();
        $.ajax({
            type:"POST",
            url:"inc/check_city_in_db.php",
            data: { city : city },
            beforeSend:function(){
                // window.alert("Checking data");
                // $(".post_submitting").show().html("<center><img src='images/loading.gif'/></center>");
            },success:function(response){   
                if(response == "error")
                {
                    window.alert("Field 'City Name' cannot be empty!");
                }

                if(response == "found")
                {
                    window.alert("This 'City Name' is already in the Database!");
                }

                if(response == "empty")
                {
                    // window.alert("");
                }
            }
        });

    });

</script>
