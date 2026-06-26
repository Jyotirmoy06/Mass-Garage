<?php

$folder_Depth=1;
$meta_Title = 'Blog - Mass Garage Doors Expert';
$meta_Description = '';
$meta_url='https://massgaragedoorsexpert.com/blog';
$meta_ogTitle='Blog';


require_once 'classes/ArticleController.php';


if(!isset($_GET['page']))
{
    $page = 1;
}
elseif(isset($_GET['page']) && is_numeric($_GET['page']))
{
    $page = $_GET['page'];
}
$per_page = 9;
$starts_from = ($page - 1) * $per_page;
$last_url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//var_dump($last_url);
$articleObj = new ArticleController();
if($last_url != 'info')
{
    $articles = $articleObj->category($last_url, $per_page, $starts_from);
//    var_dump($articles);
    if(!empty($articles))
    {
        $articles = $articles['articles'];
        $all_articles = $articleObj->category($last_url);
        $category_name = $all_articles['category']->short_name;
        $all_articles = $all_articles['articles'];
    }
    else
    {
        $articles = [];
//        $all_articles = $articleObj->category($last_url);
        $category_name = '';
        $all_articles = [];
    }

}
else
{
    $category_name = '';
    $articles = $articleObj->index($per_page, $starts_from);
    $all_articles = $articleObj->index();
}
$total_pages = ceil(count($all_articles) / $per_page);
?>
<?php include '../includes/header.php' ?>

<?php include '../includes/blog_banner.php' ?>
    <style>
        .post_link::after{
            content: '' !important;
            background: none !important;
        }
    </style>

    <h2 class="headstrip">MASSACHUSETTS GARAGE DOORS BLOG</h2>

    <section class="black_dividers">

        <div class="wrapper">

            <p>Owned and operated by Ronen Sisso, Mass Garage Doors Expert has continuously been growing since

                we first started six years ago. With more than 10 years of experience in the industry, Ronen has

                been instrumental in building our reputation as a reliable garage door

                service provider.

                <br><br>

                Our eye for quality and perfection is what keeps our clients coming back and referring our

                services to their loved ones. As a result, we are now one of the leading garage door companies

                in and around the <?php echo $city_name ?> area.

            </p>

        </div>

    </section>

    <section class="home_row1 post_row" style="display: none;">

        <div class="grid">

            <div href="yoyo" class="col">

                <div class="front">

                    <img src="images/blog-post-img.jpg" alt="">

                    <div class="hover">

                        <div class="text">

                            <h4>GARAGE REPAIR SERVICE IN <?php echo $city_name ?> AND HANDY HOMEOWNERS</h4>

                            <a href="yoyo" class="btn1">More Info</a>

                        </div>

                    </div>

                </div>

            </div>

            <div href="#" class="col">

                <div class="front">

                    <img src="images/blog-post-img.jpg" alt="">

                    <div class="hover">

                        <div class="text">

                            <h4>GARAGE REPAIR SERVICE IN <?php echo $city_name ?> AND HANDY HOMEOWNERS</h4>

                            <a href="#" class="btn1">More Info</a>

                        </div>

                    </div>

                </div>

            </div>

            <div href="#" class="col">

                <div class="front">

                    <img src="images/blog-post-img.jpg" alt="">

                    <div class="hover">

                        <div class="text">

                            <h4>GARAGE REPAIR SERVICE IN <?php echo $city_name ?> AND HANDY HOMEOWNERS</h4>

                            <a href="#" class="btn1">More Info</a>

                        </div>

                    </div>

                </div>

            </div>

            <div href="#" class="col">

                <div class="front">

                    <img src="images/blog-post-img.jpg" alt="">

                    <div class="hover">

                        <div class="text">

                            <h4>GARAGE REPAIR SERVICE IN <?php echo $city_name ?> AND HANDY HOMEOWNERS</h4>

                            <a href="#" class="btn1">More Info</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <section class="post_listing py">

        <div class="wrapper">

            <div class="flex">

                <div class="blog_posts">

                    <div class="post_list">
                        <?php
                        if(count($articles) > 0)
                        {
                            foreach ($articles as $article)
                            {
                                $art = new ArticleController();
                                $category = $art->category($article->category_id);
                                ?>
                                <div class="post_box">
                                    <a class="post_link" href="<?= $category['category']->url_slug.'/'.$article->url_slug ?>">
                                        <?php
                                        if(!empty($article->small_image_url) && file_exists($_SERVER['DOCUMENT_ROOT'].$article->small_image_url))
                                        {
                                            ?>
                                            <img src="<?= file_exists($_SERVER['DOCUMENT_ROOT'].$article->large_image_url) ? $article->small_image_url : '/images/blog-img7.jpg' ?>" alt="<?= $article->short_name ?>">
                                            <?php
                                        }
                                        elseif(!empty($article->large_image_url) && file_exists($_SERVER['DOCUMENT_ROOT'].$article->large_image_url))
                                        {
                                            ?>
                                            <img src="<?= file_exists($_SERVER['DOCUMENT_ROOT'].$article->large_image_url) ? $article->large_image_url : '/images/blog-img7.jpg' ?>" alt="<?= $article->short_name ?>">
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?= '/images/blog-img7.jpg' ?>" alt="<?= $article->short_name ?>">
                                            <?php
                                        }
                                        ?>
                                    </a>
                                    <h3><a href="<?= $category['category']->url_slug.'/'.$article->url_slug ?>"><?= strlen($article->short_name) > 30 ? substr($article->short_name, 0, 30).'...' : $article->short_name ?> </a></h3>
                                    <a style="color: black;" class="post_link" href="<?= $category['category']->url_slug ?>"><small style="font-weight: bold; font-size: 12px;"><?= $category['category']->short_name ?></small></a>
                                    <div class="blog_info">By Mass Garage Doors Expert | <span class="date"><?= date_format(date_create($article->created_at), 'M d, Y') ?></span></div>

                                    <p><?= strlen(trim($article->article_summary)) > 92 ? substr(trim($article->article_summary), 0, 90).'...' : $article->article_summary ?></p>

                                    <a href="<?= $category['category']->url_slug.'/'.$article->url_slug ?>">Read More</a>

                                </div>

                                <?php
                            }

                            // If the final page arrives, show the more blogs page link
                            if( $total_pages == $page )
                            {

                            ?>

                                <div class="post_box">
                                    <a class="post_link" href="/blog-1.php">    
                                        <img src="<?= '/images/blog-img7.jpg' ?>" alt="<?= $article->short_name ?>">
                                    </a>
                                    <h3>
                                        <a href="/blog-1.php">
                                            View More Garage Door Articles
                                        </a>
                                    </h3>
                                </div>
                            
                        <?php
                            }

                        }
                        else
                        {
                            ?>
                            <div>
                                Oops!! NO Posts Found
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <?php
                    if(count($articles) > 0)
                    {
                        if(count($all_articles) > $per_page)
                        {
                            ?>
                            <ul class="pagination">
                                <?php
                                for($i = 1; $i <= $total_pages; $i++)
                                {
                                    ?>
                                    <li>
                                        <a href="<?= '?page='.$i ?>">
                                            <button class="<?= $page == $i ? 'active' : '' ?>">
                                                <?= $i ?>
                                            </button>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="blog_filter">

                    <div class="block">

                        <h4>Search Posts</h4>

                        <form action="">

                            <div class="form_div"><input type="search" placeholder="Search..."></div>

                        </form>

                    </div>

                    <div class="block">

                        <h4>Recent Posts</h4>

                        <ul>

                            <?php
                                for ($i=0; $i <= 4; $i++) 
                                { 
                                    $art = new ArticleController();
                                    $category = $art->category($articles[$i]->category_id);
                            ?>
                                <li>
                                    <a href="<?= $category['category']->url_slug.'/'.$articles[$i]->url_slug ?>">
                                        <?= strlen($articles[$i]->short_name) > 30 ? substr($articles[$i]->short_name, 0, 30).'...' : $articles[$i]->short_name ?>
                                    </a>
                                    <span class="date"> 
                                        <?= date_format(date_create($articles[$i]->created_at), 'M d, Y') ?>
                                    </span>
                                    
                                </li>    
                            <?php                                    
                                }
                            ?>


                        </ul>

                    </div>

                    <div class="block">

                        <h4>Subscribe!</h4>

                        <form action="">

                            <div class="form_div"><input type="text" placeholder="Name"></div>

                            <div class="form_div"><input type="email" placeholder="Email"></div>

                            <div class="form_div"><input type="submit" value="Sign Me Up!"></div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="blog_section_img">

        <div class="cont_text">

            <h2>WHAT MAKES US DIFFERENT </h2>

            <p>Our services are available all throughout the year, and we do not charge additional costs for

                Sunday appointments. We are also able to provide quick, same-day services when you give us a

                call.

            </p>

        </div>

    </section>

<?php include '../includes/footer.php' ?>