<?php
$pageTitle = "Create Location Page - CMS";
$authPage = false;
include "inc/header.php";

// $controller = new Database();
// $serviceCategoriesData = $controller->readData('service_categories', [], []);

?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Add Location Page</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="<?= Root.'/inc/location_page_form.inc.php'; ?>" method="post" id="form" enctype="multipart/form-data" class="col-md-10 offset-1">
                            
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
                                <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                                <label for="name">City Name*</label>
                            </div>

                            <!-- <input type="hidden" value="" required> -->
                            <input type="hidden" id="citySlug" name="citySlug" value="">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="county" name="county" placeholder="" required>
                                <label for="name">County Name*</label>
                            </div>

                            <input type="hidden" id="countySlug" name="countySlug" value="">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="map" name="map" placeholder="" required>
                                <label for="map">Map Link*</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="metaTitle" name="metaTitle" placeholder="">
                                <label for="metaTitle">Meta Title</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="metaDescription" name="metaDescription" placeholder="">
                                <label for="metaDescription">Meta Description</label>
                            </div>


                            <!-- <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="category" name="category" placeholder="Category" required>
                                <label for="long_name">Category</label>
                            </div> -->
                            <div class="form-floating mb-3" id="">
                                <select id="pageType" name="pageType" class="form-control" required>
                                    <option value="">Select Category*</option>
                                    <option value="Default">Default</option>
                                    <option value="LocationBased">LocationBased</option>
                                </select>
                                <label for="pageType">Page Type*</label>
                            </div>
                            <?php
                            // if(in_array('long_name', $errors))
                            // {
                            //     ?>
                            <!-- //     <div class="invalid-feedback d-block">
                            //         Category long name is mandatory!!
                            //     </div> -->
                               <?php
                            // }
                            ?>
                            <!-- <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="url_slug" name="url_slug" placeholder="Slug" required>
                                <label for="url_slug">Slug</label>
                            </div> -->

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="h1" name="h1" placeholder="">
                                <label for="h1">h1</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="topBlackH3" name="topBlackH3" placeholder="">
                                <label for="topBlackH3">Top Black H3</label>
                            </div>

                            
                            <label for="topBlackHtml" class="control-label mb-3">Top Black Html</label>
                            <textarea name="topBlackHtml" id="topBlackHtml" class="form-control" cols="10" rows="3" placeholder=""></textarea>
                            <br>


                            <br>
                            <label for="article_content" class="control-label mb-3">Text Block Top Left</label>
                            <textarea name="textBlockTopLeft" id="textBlockTopLeft" class="editor" cols="10" rows="5" placeholder=""></textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Black Text Section 1</label>
                            <textarea name="blackTextSection1" id="blackTextSection1" class="editor" cols="10" rows="5" placeholder=""></textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Text Block 2nd Right</label>
                            <textarea name="textBlock2ndRight" id="textBlock2ndRight" class="editor" cols="10" rows="5" placeholder=""></textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Black Text Section 2</label>
                            <textarea name="blackTextSection2" id="blackTextSection2" class="editor" cols="10" rows="5" placeholder=""></textarea>
                            <br>

                            <br>
                            <label for="article_content" class="control-label mb-3">Text Block Bottom Left</label>
                            <textarea name="textBlockBottomLeft" id="textBlockBottomLeft" class="editor" cols="10" rows="5" placeholder=""></textarea>
                            <br>

                            <?php
                            // if(in_array('short_description', $errors))
                            // {
                                ?>
                                <!-- <div class="invalid-feedback d-block">
                                    Short Description is required!!
                                </div> -->
                                <?php
                            // }
                            ?>
                            <br>
                            <!-- <label for="long_description" class="control-label mb-3">Long Description</label>
                            <textarea name="long_description" id="long_description" class="editor" cols="30" rows="10" placeholder="" required></textarea>
                            <br> -->
                            <?php
                            // if(in_array('long_description', $errors))
                            // {
                                ?>
                                <!-- <div class="invalid-feedback d-block">
                                    Long Description is required!!
                                </div> -->
                                <?php
                            // }
                            ?>
                            <br>

                            <div class="form-group my-3">
                                <label for="large_image_url" class="control-label mb-3">Featured Image <br/><small class="text-danger">(Allowed size: less than 10MB, Format: jpg, bmp, png)</small></label>
                                <input type="file" onchange="imageUpload('large', event)" name="image_url" id="image_url" class="form-control"/>
                                <input type="hidden" name="large_image_url" id="large_image_url" class="form-control"/>

                                <div class="alert alert-danger" style="display: none; margin-top: 7px;" id="err"></div>
                                <div id="preview" style="display: none; margin-top: 10px; width: 150px; height: 150px;">
                                    <label>Preview:</label><br/>
                                    <img src="" style="width: 100%; height: auto; object-fit: cover;" alt="">
                                </div>
                                <div class="progress my-3 large-progress-bar d-none">
                                    <div class="progress-bar progress-bar-striped bg-warning" id="progressbar-large" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <label for="status" class="control-label my-2">Publish<br/></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" style="height: 30px; width: 55px;" name="status" id="status" type="checkbox"  value="1">
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
<script>
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
