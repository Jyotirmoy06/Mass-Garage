<?php
$pageTitle = "Test Article";
$authPage = false;
include "inc/header.php";
if(!isset($_GET['page']))
{
    $page = 1;
}
elseif(isset($_GET['page']) && is_numeric($_GET['page']))
{
    $page = $_GET['page'];
}
$per_page = 20;
$starts_from = ($page - 1) * $per_page;
if(isset($_GET['keyword']) || isset($_GET['sort']))
{
    $keyword = htmlspecialchars($_GET['keyword']);
    $sort = $_GET['sort'];
    if(isset($sort) && !empty($sort))
    {
        if ($sort == 'short_name')
        {
            $order_by = $sort.' DESC';
        }
        else
        {
            $order_by = 'created_at '.$sort;
        }
    }
    else
    {
        $order_by = "";
    }
    $obj = new ArticleController();
    $data = $obj->search($keyword, $order_by);
    if($data)
    {
        $all_articles = $data;
        $articles = $obj->search($keyword, $order_by, $per_page, $starts_from);
    }

    $search_link = '&sort='.$sort.'&keyword='.$_GET['keyword'];
}
else
{

    $articleObj = new ArticleController();
    $articles = $articleObj->adminIndex($per_page,$starts_from );
    $all_articles = $articleObj->adminIndex();
}
$total_pages = ceil(count($all_articles) / $per_page);
?>
    
<div class="container">
    <div class="row">
        <div class="col-md-12 p-4 mt-5 text-center">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">All Articles </h1>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <!-- <form class="input-group mb-3" action="<?php // $_SERVER['PHP_SELF'] ?>" method="GET">

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
                    </form> -->
                </div>
            </div>

            <div class="row">
                    <?php
                    if (!is_null($articles) && count($articles) > 0)
                    {
                        ?>
                    <div >
                        <table id="example" class="table table-bordered table-hover" style="width:100%; font-size: 16px;">
                            <thead class="thead-dark" style="text-align: left;">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Date Edited</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach($articles as $post)
                                {
                                    $db = new Database();
                                    $cat_name = $db->readData('cms_categories', [], ['category_id' => $post->category_id]);
                                ?>
                                    <tr style="text-align: left;">
                                        <td><?= $post->short_name ?></td>
                                        <td><?= $cat_name[0]->short_name ?></td>
                                        <td>
                                            <?php
                                            if($post->status == '1')
                                            {
                                                echo '<span class="text-success"> Published </span>';
                                            }
                                            elseif ($post->status == '-1')
                                            {
                                                echo '<span class="text-danger"> Deleted </span>';
                                            }
                                            else
                                            {
                                                echo '<span class="text-warning"> Draft </span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <small class="fw-bold"><?= date_format(date_create($post->created_at), 'Y-m-d') ?></small>
                                        </td>
                                        <td>
                                            <small class="fw-bold"><?= date_format(date_create($post->updated_at), 'Y-m-d') ?></small>
                                        </td>
                                        <td>
                                            <a href="/info/<?= $cat_name[0]->url_slug.'/'.$post->url_slug ?>" target="_blank" class="btn btn-primary btn-sm">View</a>
                                            <a href="<?= Root.'/edit.php?article='.$post->id; ?>" class="btn btn-outline-primary btn-sm mx-3">Edit</a>
                                            <a href="<?= Root.'/inc/article_delete.inc.php?article='.$post->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php
                        if(count($articles) > 0)
                        {
                            if(count($all_articles) > $per_page)
                            {
                                ?>
                                <nav aria-label="..." class="d-flex justify-content-center my-4">
                                    <ul class="pagination">
                                        <li class="page-item <?= $page >= 2 ? '' : 'disabled' ?>">
                                            <!-- <a class="page-link" href="<?php // isset($search_link) ? Root.'/articles.php?page='.($page -1).''. $search_link : Root.'/articles.php?page='.($page -1).'';  ?>">Previous</a> -->
                                        </li>
                                        <?php
                                        for($i = 1; $i <= $total_pages; $i++)
                                        {
                                            ?>
                                            <li class="page-item <?= $page == $i ? 'active' : '' ?>"  <?= $page == $i ? 'aria-current="page"' : '' ?>>
                                                <!-- <a class="page-link" href="<?php  // isset($search_link) ? Root.'/articles.php?page='.$i.''.$search_link : Root.'/articles.php?page='.$i.'' ?>"><?php //echo $i ?></a> -->
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <li class="page-item <?= $page < $total_pages ? '' : 'disabled' ?>">
                                            <!-- <a class="page-link" href="<?php // isset($search_link) ? Root.'/articles.php?page='.($page +1).''.$search_link : Root.'/articles.php?page='.($page +1).'' ?>">Next</a> -->
                                        </li>
                                    </ul>
                                </nav>
                                <?php
                            }
                        }
                        ?>
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
