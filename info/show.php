<?php

require_once 'classes/ArticleController.php';
$folder_Depth=1;

$category_slug = $current_urls[$blog_route_key+1];
$article_slug = $current_urls[$blog_route_key+2];

$articleObj = new ArticleController();
$article = $articleObj->show($category_slug, $article_slug);
if(empty($article))
{
    header("Location: /info");
}

$meta_Title = $article->long_name.' - Mass Garage Doors Expert';
$meta_Description = $article->article_summary;
?>
<?php include '../includes/header.php' ?>

<style>
    /* li {
        list-style-type: circle;
    } */

    /* .content_row1 p {
        float: inherit !important;
    } */
    ol {
        display: block;
        list-style: decimal;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    article ul {
        display: block;
        list-style: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    ol li {
        list-style: decimal !important;
        list-style-position: inside !important;
    }

    ol li::marker {
        font-weight: bolder !important;
    }

    ul li {
        list-style: disc !important;
    }

    .about_row1 [type=button] {
        display: inline-block;
        /* float: right; */
        font-size: 20px;
        line-height: 30px;
        font-weight: normal;
        color: #fff;
        background: #57ad46;
        padding: 6px 20px;
        border-radius: 3px;
    }

    .about_row1 [type=button]:hover {
        cursor: pointer;
    }

    .about_row1 .wrapper h1{
        font-size: 2em;    
    }

    .img_inside_content {
        border: 5px solid;
        padding: 5px;
        margin: 5px;
        background-color: #ffc600;
    }

    .text-center {
        text-align:center;
    }

    /* .btn_list {
        margin-left: -38px;
    } */
    @media only screen and (max-device-width: 600px) {
        .banner .banner_text {
            top: 112px !important;
        }
        .banner.inner_banner > img {
            height: 460px !important;
        }

        .banner_text .wrapper .cont ul {
            margin-left: 0;
        }
        .img_inside_content {
            margin: 0 0px 5px 0px;
        }

    }

</style>

<?php include '../includes/blog_banner.php' ?>

    <h2 class="headstrip">MASSACHUSETTS GARAGE DOORS BLOG</h2>

    <section class="black_dividers">

        <div class="wrapper">
            <h3><?= $article->short_name ?></h3>


        </div>

    </section>

    <section class="about_row1">

        <div class="wrapper">
            <article>
            <?php
            if(!empty($article->large_image_url) && file_exists($_SERVER['DOCUMENT_ROOT'].$article->large_image_url))
            {
                if($article->large_image_status == 1) { 
            ?>
                <img src="<?= $article->large_image_url ?>" alt="<?= $article->short_name ?>" class="article-image">
            <?php
                }
            }
            ?>
            <?= $article->article_content ?>
            </article>

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