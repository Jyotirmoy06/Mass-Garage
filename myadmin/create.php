<?php
$pageTitle = "Create Article - CMS";
$authPage = false;
include "inc/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Create Article </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="<?= Root.'/inc/article_form.inc.php'; ?>" method="post" id="form" enctype="multipart/form-data" class="col-md-10 offset-1">
                            <input type="hidden" name="author_id" value="<?= $_SESSION['id']; ?>"/>
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
                                <input type="text" class="form-control" id="short_name" name="short_name" placeholder="Short Name">
                                <label for="short_name">Short Name</label>
                                <?php
                                if(in_array('short_name', $errors))
                                {
                                ?>
                                <div class="invalid-feedback d-block">
                                    Article short title is mandatory!!
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="long_name" name="long_name" placeholder="Long Name">
                                <label for="long_name">Long Name</label>
                            </div>
                            <?php
                            if(in_array('long_name', $errors))
                            {
                                ?>
                                <div class="invalid-feedback d-block">
                                    Article long title is mandatory!!
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="url_slug" name="url_slug" placeholder="Slug">
                                <label for="url_slug">Slug</label>
                                <?php
                                if(in_array('url_slug', $errors))
                                {
                                    ?>
                                    <div class="invalid-feedback d-block">
                                        Please provide a unique slug for your article.
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="category_id" class="form-control">
                                    <option value=""> Select Category</option>
                                    <?php
                                    $categories = new Category();
                                    $cats = $categories->getCategories();
                                    if($cats)
                                    {
                                        foreach ($cats as $cat)
                                        {
                                        ?>
                                        <option value="<?= $cat['category_id'] ?>"> <?= $cat['short_name'] ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="category_id">Categories</label>
                                <?php
                                if(in_array('category_id', $errors))
                                {
                                    ?>
                                    <div class="invalid-feedback d-block">
                                       Select a article category!!
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <label for="article_summary" class="control-label mb-3">Summary</label>
                            <textarea name="article_summary" id="article_summary" class="form-control" cols="10" rows="10" placeholder=""></textarea>
                            <br>
                            <?php
                            if(in_array('article_summary', $errors))
                            {
                                ?>
                                <div class="invalid-feedback d-block">
                                    Article summary is required!!
                                </div>
                                <?php
                            }
                            ?>
                            <br>
                            <label for="article_content" class="control-label mb-3">Content</label>
                            <!-- <textarea name="article_content" id="article_content" class="editor" cols="30" rows="10" placeholder=""></textarea> -->
                            <textarea name="article_content" id="editor" cols="30" rows="10" placeholder=""></textarea>
                            <br>
                            <?php
                            if(in_array('article_content', $errors))
                            {
                                ?>
                                <div class="invalid-feedback d-block">
                                    Article content is required!!
                                </div>
                                <?php
                            }
                            ?>
                            <br>
                            <div class="form-group my-3">
                                <label for="small_image_url" class="control-label mb-3">Featured Image (Small) <br/><small class="text-danger">(Allowed size: less than 10MB, Format: jpg, bmp, png)</small></label>
                                <input type="file" name="simage_url" onchange="imageUpload('small', event)" id="simage_url" class="form-control"/>
                                <input type="hidden" name="small_image_url" id="small_image_url" class="form-control"/>

                                <div class="alert alert-danger" style="display: none; margin-top: 7px;" id="err-s"></div>
                                <div id="preview-s" style="display: none; margin-top: 10px; width: 100px; height: 100px;">
                                    <label>Preview:</label><br/>
                                    <img src="" style="width: 100%; height: auto; object-fit: cover;" alt="">
                                </div>

                                <div class="progress my-3 small-progress-bar d-none">
                                    <div class="progress-bar progress-bar-striped bg-warning" id="progressbar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="form-group my-3">
                                <label for="large_image_url" class="control-label mb-3">Featured Image (Large) <br/><small class="text-danger">(Allowed size: less than 10MB, Format: jpg, bmp, png)</small></label>
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

                            <label for="status" class="control-label my-2 mx-2">Show Large Image<br/></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" style="height: 30px; width: 55px;" name="large_image_status" id="status" type="checkbox"  value="1">
                            </div>
                            <br/>
                            <label for="status" class="control-label my-2">Publish Blog<br/></label>
                            <div class="form-check form-switch">
                                    <input class="form-check-input" style="height: 30px; width: 55px;" name="status" id="status" type="checkbox"  value="1">
                            </div>

                            <div class="my-4 d-flex justify-content-end">
                                <button name="submit" type="submit" class="mx-3 btn btn-success">Save</button>
                                <button name="continue" class="btn btn-primary">Continue Editing</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
