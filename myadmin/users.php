<?php
$pageTitle = "All Users - CMS";
require_once 'classes/Settings.php';
require_once 'classes/Database.php';
require_once 'classes/Access.php';
$authPage = false;
if (Access::check('admin') == false)
{
    header("location: ".Root."/");
}
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
        if ($sort == 'username')
        {
            $order_by = $sort.' ASC';
        }
        else
        {
            $order_by = 'id '.$sort;
        }
    }
    else
    {
        $order_by = "";
    }
    $obj = new UserController();
    $data = $obj->search($keyword, $order_by);
    if($data)
    {
        $all_users = $data;
        $users = $obj->search($keyword, $order_by, $per_page, $starts_from);
    }

    $search_link = '&sort='.$sort.'&keyword='.$_GET['keyword'];
}
else
{

    $userObj = new UserController();
    $users = $userObj->adminIndex($per_page,$starts_from );
    $all_users = $userObj->adminIndex();
}
if (isset($all_users))
{
    $total_pages = ceil(count($all_users) / $per_page);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 p-4 mt-5 text-center">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">All Users </h1>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <form class="input-group mb-3" action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">

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
            </div>

            <div class="row">
                <?php
                if (isset($users) && count($users) > 0)
                {
                    ?>
                    <div >
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark" style="text-align: left;">
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach($users as $user)
                            {
                                $db = new Database();
                                $level = $db->readData('cms_roles', [], ['role_id' => $user->access_level]);
                                ?>
                                <tr style="text-align: left;">
                                    <td><?= $user->username ?></td>
                                    <td style=" text-transform: capitalize;"><?= $level[0]->role ?? 'Author' ?></td>
                                    <td>
                                        <a href="<?= Root.'/edit_user.php?user='.$user->id; ?>" class="btn btn-outline-primary btn-sm mx-3">Edit</a>
                                        <a href="<?= Root.'/inc/user_delete.inc.php?user='.$user->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>

                        <?php
                        if(count($users) > 0)
                        {
                            if(count($all_users) > $per_page)
                            {
                                ?>
                                <nav aria-label="..." class="d-flex justify-content-center my-4">
                                    <ul class="pagination">
                                        <li class="page-item <?= $page >= 2 ? '' : 'disabled' ?>">
                                            <a class="page-link" href="<?=  isset($search_link) ? Root.'/users.php?page='.($page -1).''. $search_link : Root.'/users.php?page='.($page -1).'';  ?>">Previous</a>
                                        </li>
                                        <?php
                                        for($i = 1; $i <= $total_pages; $i++)
                                        {
                                            ?>
                                            <li class="page-item <?= $page == $i ? 'active' : '' ?>"  <?= $page == $i ? 'aria-current="page"' : '' ?>>
                                                <a class="page-link" href="<?=  isset($search_link) ? Root.'/users.php?page='.$i.''.$search_link : Root.'/users.php?page='.$i.'' ?>"><?= $i ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <li class="page-item <?= $page < $total_pages ? '' : 'disabled' ?>">
                                            <a class="page-link" href="<?=  isset($search_link) ? Root.'/users.php?page='.($page +1).''.$search_link : Root.'/users.php?page='.($page +1).'' ?>">Next</a>
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
