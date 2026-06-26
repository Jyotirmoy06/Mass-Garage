
<?php
// List of Categories to be displayed in slider
$categories = "1, 2, 3";
// Query for the product title
$cat_data = mysqli_query($con, "SELECT * FROM category WHERE category_id IN ($categories)");
//Query for the Tab links
$cat_data2 = mysqli_query($con, "SELECT * FROM category WHERE category_id IN ($categories)");
// Query for the products
$cat_data3 = mysqli_query($con, "SELECT * FROM category WHERE category_id IN ($categories)");

if ($cat_data->num_rows) {
?>
    <section class="product_slider">

        <div class="product_title">
            <div class="wrapper">
                <?php
                $j = 0;
                while ($cat = $cat_data->fetch_object()) {
                    $j++;
                ?>
                    <h3 class="productTitle <?= $j == 1 ? 'activeTitle' : '' ?>" data-id="tab<?= $j ?>"><span>Featured Product</span><?= $cat->category; ?></h3>
                <?php
                }
                ?>

                <ul class="tabs productTab">
                    <?php
                    $k = 0;
                    while ($catt = $cat_data2->fetch_object()) {
                        $k++;
                    ?>
                        <li class="tablink <?= $k == 1 ? 'active' : '' ?>" data-id="tab<?= $k ?>"><?= $catt->short_name == "" ? $catt->category : $catt->short_name; ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="section itemSlider">
            <div class="wrapper">
                <?php
                $x = 0;
                while ($catt = $cat_data3->fetch_object()) {
                    $x++;

                    $datax = mysqli_query($con, "SELECT * FROM product WHERE category_id=$catt->category_id");
                    $num_products_x = mysqli_num_rows($datax);
                ?>
                    <div class="section owl-carousel owl-theme <?= $num_products_x > 5 ? 'productSlider' : 'productSlider productGri'; ?> <?= $x == 1 ? 'tab-active' : '' ?>" data-id="tab<?= $x ?>">

                        <?php
                        $data = mysqli_query($con, "SELECT * FROM product WHERE category_id=$catt->category_id");
                        $num_products = mysqli_num_rows($data);
                        $i = 0;
                        while ($title = mysqli_fetch_array($data)) {
                            $product_id = $title['product_id'];
                            $data_image = mysqli_query($con, "SELECT * FROM `image` WHERE `product_id`= $product_id");

                            $row = mysqli_fetch_assoc($data_image);
                            $product_image = $row['image_url'];

                            $data_price = mysqli_query($con, "SELECT * FROM `product_pricing` WHERE `product_id` =$product_id");

                            if (mysqli_num_rows($data_price) > 1) {
                                $product_Min_Price = 1000;
                                $product_Max_Price = 0;

                                while ($price = mysqli_fetch_array($data_price)) {
                                    //$product_options[$i]=$i;

                                    $temp_price = $price['price_value'];

                                    // $product_text[$i] = $price['price_text'];
                                    // $product_option[$i] = $price['option_name'];

                                    if ($product_Max_Price < $temp_price) {
                                        $product_Max_Price = $temp_price;
                                    }
                                    if ($product_Min_Price > $temp_price) {
                                        $product_Min_Price = $temp_price;
                                    }
                                }
                                $product_options = 2;
                            } else if (mysqli_num_rows($data_price) < 1) {
                                $product_options = 0;
                            } else {
                                $product_options = 1;
                                $row = mysqli_fetch_assoc($data_price);
                                $product_price = $row['price_value'];
                            }
                            $product_title = $title['title']; ?>
                            <div class="item <?= $num_products < 5 ? 'active' : ''; ?>">
                                <div class="product-image" style="height: 130px !important;">
                                    <img loading="lazy" style="height: 100% !important; width: auto !important; object-fit: cover !important;" src="<?php echo str_replace("png","webp",$product_image);  ?>" alt="">
                                </div>
                                <div class="star">
                                    <h3 title="<?= $product_title ?>"><?php if (strlen($product_title) > 40) {
                                                                            echo substr($product_title, 0, 40) . '...';
                                                                        } else {
                                                                            echo $product_title;
                                                                        } ?></h3>
                                    <?php if ($product_options > 1) { ?>
                                        <span class="price">$<?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?></span>
                                    <?php } else if ($product_options < 1) { ?>
                                        <span class="price">Contact for price</span>
                                    <?php } else { ?>
                                        <span class="price">$<?php echo $product_price ?></span>
                                    <?php } ?>
                                    <a href="/product-page.php?productid=<?= $title['product_id'] ?>" class="btn1">Buy Now</a>
                                </div>
                            </div>
                        <?php $i++;
                        } ?>

                    </div>
                <?php
                }
                ?>
            </div>
    </section>
<?php
}
?>
<script>
    // Product Tab

    $('.tablink').click(function() {

        $(".productSlider").removeClass('tab-active');

        $(".productSlider[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");



        $(".productTitle[data-id='" + $(this).attr('data-id') + "']").addClass("activeTitle").siblings().removeClass('activeTitle');

        $(this).removeClass('active-a');

        $(this).addClass('active').siblings().removeClass('active');

        $(".productGri").removeClass('productGrid');
        if ($(".tab-active").hasClass("productGri")) {
            $(".tab-active").addClass('productGrid')
        }
    });
</script>

<script>
    $(document).ready(function() {

        if ($(".tab-active").hasClass("productGri")) {
            $(".tab-active").addClass('productGrid')
        }

    });
</script>