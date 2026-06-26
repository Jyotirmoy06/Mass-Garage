<link rel="stylesheet" href="./css/product-slider.css?v=1.1">
<style type="text/css">
    .comingsoontext 
    {
        font-weight: normal;
        color: #000000;
        text-transform: uppercase;
        margin-bottom: 20px;
        text-align: center;
        font-size: xx-large;
        display: none;
    }
</style>
<?php

function fetchUrl($url)
{
    $consumer_key = 'ck_99b0e18b061057f838b0c44b81350838ff7249e2';
    $consumer_secret = 'cs_d24671f63855023fa6dffe50add43040bcd45989';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . base64_encode("$consumer_key:$consumer_secret"),
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) 
    {
        echo 'Error: ' . curl_error($ch);
        curl_close($ch);
        return [];
    }

    curl_close($ch);
    return json_decode($response, true);
}


// Fetch categories
$url = "https://store.massgaragedoorsexpert.com/wp-json/wc/v3/products/categories";
$categories = fetchUrl($url);

if (empty($categories)) 
{
    echo '<p>No categories found.</p>';
    return;
}

#38-Accessories|39-Hardware|37-Openers
$catIdsAllowed = [38, 39, 37];

?>

<section class="product_slider">
    <div class="product_title">
        <div class="wrapper">
            <?php
            $tabIndex = 0;
            foreach ($categories as $category) 
            {
                if (!in_array($category['id'], $catIdsAllowed)) 
                    { 
                        break; 
                    }
                $tabIndex++;
            ?>
                <h3 class="productTitle <?= $tabIndex === 1 ? 'activeTitle' : '' ?>" data-id="tab<?= $tabIndex ?>">
                    <span>Featured Product</span><?= htmlspecialchars($category['name']); ?>
                </h3>
            <?php
            }
            ?>
            <ul class="tabs productTab">
                <?php
                $tabIndex = 0;
                foreach ($categories as $category) 
                {
                    if (!in_array($category['id'], $catIdsAllowed)) 
                        { 
                            break; 
                        }
                    $tabIndex++;
                ?>
                    <li class="tablink <?= $tabIndex === 1 ? 'active' : '' ?>" data-id="tab<?= $tabIndex ?>">
                        <?= htmlspecialchars($category['name']); ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="section itemSlider">
        <div class="wrapper">
            <?php
            $tabIndex = 0;
            foreach ($categories as $category) 
            {
                if (!in_array($category['id'], $catIdsAllowed)) 
                    { 
                        break; 
                    }
                $tabIndex++;
                $url = "https://store.massgaragedoorsexpert.com/wp-json/wc/v3/products?category=" . $category['id'];
                $products = fetchUrl($url);
                $productCount = count($products) ;

                if (empty($products)) 
                {
                    if (strtolower($category['name']) === 'hardware') 
                    {
            ?>
                        <h3 class="comingsoontext">Hardware is coming soon</h3>
                    <?php
                    }
                    continue;
                }
                ?>
                <div class="section owl-carousel owl-theme <?= $productCount > 1 ? 'productSlider' : 'productSlider productGri'; ?> <?= $tabIndex === 1 ? 'tab-active' : '' ?>" data-id="tab<?= $tabIndex ?>">
                    <?php 
                    $doubledProducts = array_merge($products, $products);
                    foreach ($products as $product) 
                    {
                        $product_id = htmlspecialchars($product['id']);
                        $product_image = htmlspecialchars($product['images'][0]['src'] ?? '');
                        $product_price = htmlspecialchars($product['price'] ?? '0.00');
                        $product_title = htmlspecialchars($product['name'] ?? 'No Title');
                        $product_url = htmlspecialchars($product['permalink'] ?? '#');
                    ?>
                        <div class="item">
                            <div class="product-image">
                                <img loading="lazy" src="<?= $product_image ?>" alt="Product Image">
                            </div>
                            <div class="star">
                                <h3 title="<?= $product_title ?>">
                                    <?= strlen($product_title) > 40 ? substr($product_title, 0, 40) . '...' : $product_title; ?>
                                </h3>
                                <span class="price">$<?= $product_price ?></span>
                                <a href="<?=$product_url?>" class="btn1" rel="nofollow">Buy Now</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<script>
    // Product Tab
    $(document).ready(function () 
    {
        $('.tablink').click(function () 
        {
            const tabId = $(this).data('id');
            if(tabId == 'tab2')
            {
                $('.comingsoontext').show();
            }else
            {
                $('.comingsoontext').hide();
            }
            $(".productSlider").removeClass('tab-active');
            $(`.productSlider[data-id='${tabId}']`).addClass('tab-active');

            $(".productTitle").removeClass('activeTitle');
            $(`.productTitle[data-id='${tabId}']`).addClass('activeTitle');

            $(".tablink").removeClass('active');
            $(this).addClass('active');
        });

        if ($(".tab-active").hasClass("productGri")) 
        {
            $(".tab-active").addClass('productGrid');
        }
    });
</script>
