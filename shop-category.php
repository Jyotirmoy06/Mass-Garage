<?php include 'connection.php'; ?>

<?php
//category ID fetch
if (!isset($_GET['category'])) {
    $category_id = 2;
} else {

    $category_id = $_GET['category'];
}
if (!isset($_GET['pageid'])) {
    $page_Id = 1;
} else {
    $page_Id = $_GET['pageid'];
}

$data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=$category_id");
$total_Products = mysqli_num_rows($data);
$total_Pages = ($total_Products / 10) + 1;
$data_cateory = mysqli_query($con, "SELECT * FROM `category` WHERE `category_id`=$category_id");
$data_list_category = mysqli_query($con, "SELECT * FROM `category` WHERE 1");

$temp_price=0;
 //price 
 $product_Min_Price = [];
 $product_Max_Price = [];
$category_list = [];
$product_image = [];
$product_title = [];
$product_price = [];
$category_id_list = [];
$product_id = [];
$product_options=[];
$k = 0;
while ($category_all = mysqli_fetch_array($data_list_category)) {
    $category_list[$k] = $category_all['category'];
    $category_id_list[$k] = $category_all['category_id'];
    $k++;
}

$i = 0;
while ($title = mysqli_fetch_array($data)) {
    $product_id[$i] = $title['product_id'];
    $data_image = mysqli_query($con, "SELECT * FROM `image` WHERE `product_id`= $product_id[$i]");
    $row = mysqli_fetch_assoc($data_image);
    $product_image[$i] = $row['image_url'];

   
    $data_price = mysqli_query($con, "SELECT * FROM `product_pricing` WHERE `product_id` =$product_id[$i]");
 
    if (mysqli_num_rows($data_price)>1)
  {$product_Min_Price[$i]=1000;
    $product_Max_Price[$i]=0;   

    while ($price = mysqli_fetch_array($data_price)) {
        //$product_options[$i]=$i;
        
      $temp_price = $price['price_value'];
      
       // $product_text[$i] = $price['price_text'];
       // $product_option[$i] = $price['option_name'];
      
        if ($product_Max_Price[$i] < $temp_price) {
            $product_Max_Price[$i] = $temp_price;
        
        }
        if ($product_Min_Price[$i] > $temp_price) {
            $product_Min_Price[$i] = $temp_price;
        }
  
    }
      $product_options[$i]=2;
  }
  else if(mysqli_num_rows($data_price)<1)
  {
     $product_options[$i]=0;
  }
  else
  {
      $product_options[$i]=1;
      $row = mysqli_fetch_assoc($data_price);
      $product_price[$i] = $row['price_value'];
  }
   
    $product_title[$i] = $title['title'];

    $i++;



}
?>

<?php
    $noIndexNoFollow = true;
    include 'includes/header.php'; 
?>
<section class="breadecrumb">

    <div class="wrapper">

        <ul>

            <li><a href="/">Home</a></li>

            <li><a href="/shop-category.php">Shop</a></li>

            <li><?php echo $category_list[$category_id - 1] ?></li>

        </ul>

    </div>

</section>

<section class="shop_banner shop_category_banner">

    <img src="images/about-us-banner.jpg" alt="">

    <div class="banner_text">

        <h1><?php echo $category_list[$category_id - 1] ?></h1>

    </div>

</section>

<h1 class="headstrip">See our selection of <?php echo $category_list[$category_id-1]?> below </h1>

<section class="shop_cat_row1">

    <div class="wrapper">
        <p><?php $category_info = mysqli_fetch_assoc($data_cateory);
            echo $category_info['description'];
            ?>

        </p>

    </div>

</section>

<section class="shop_cat_row2 py">

    <div class="wrapper">

        <section class="product_grid">

            <div class="filters">

                <div class="filter_box">

                    <h3>Categories</h3>

                    <ul>
                        <?php for ($j = 0; $j < $k; $j++) {
                        ?>
                            <li><a href="?category=<?php echo $category_id_list[$j] ?>"><?php echo $category_list[$j] ?></a></li>
                        <?php } ?>

                    </ul>

                </div>
                <!--
                <div class="filter_box">

                    <h3>Price</h3>

                    <div class="range_slider">

                        <div id="my-slider" se-min="0" se-step="1" se-min-value="0" se-max="1000" class="slider">

                            <div class="slider-touch-left">

                                <span></span>

                            </div>

                            <div class="slider-touch-right">

                                <span></span>

                            </div>

                            <div class="slider-line">

                                <span></span>

                            </div>

                        </div>

                        <div id="result"><span class="minprice">$0</span> To <span class="maxprice">$1000</span></div>

                    </div>

                </div>

                <div class="filter_box">

                    <h3>Color</h3>

                    <ul class="checklist">

                        <li><input type="checkbox" id="black"><label for="black">Black</label></li>

                        <li><input type="checkbox" id="white"><label for="white">White</label></li>

                        <li><input type="checkbox" id="blue"><label for="blue">Blue</label></li>

                        <li><input type="checkbox" id="gray"><label for="gray">Gray</label></li>

                    </ul>

                </div>

                <div class="filter_box">

                    <h3>Style</h3>

                    <ul class="checklist">

                        <li><input type="checkbox" id="framing"><label for="framing">Framing</label></li>

                        <li><input type="checkbox" id="nailing"><label for="nailing">Nailing</label></li>

                        <li><input type="checkbox" id="sledge"><label for="sledge">Sledge</label></li>

                        <li><input type="checkbox" id="specialty"><label for="specialty">Specialty</label>

                        </li>

                    </ul>

                </div>
-->
            </div>

            <div class="products">
                <!--
                <section class="product_sort">

                    <div class="dropdown">

                       <p>Sort By:</p>

                        <select name="" id="">

                            <option value="">Default</option>

                            <option value="">Price Low to High</option>

                            <option value="">Price High to Low</option>

                        </select>

                    </div>

                </section>-->

                <section class="product_section">

                    <section class="product_list">
                        <?php for ($j = ($page_Id - 1) * 10; $j < $total_Products; $j++) {
                        ?>
                            <div class="item">

                                <img src="<?php echo $product_image[$j] ?>" alt="">

                                <div class="star">

                                    <h3><?php echo $product_title[$j]; ?></h3>

                                    <?php if ($product_options[$j] > 1) { ?>
                                        <span class="price">$<?php echo number_format((float) $product_Min_Price[$j], 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price[$j], 2, '.', ',') ?></span>
                                    <?php } else if ($product_options[$j] < 1) { ?>
                                        <span class="price">Contact for price</span>
                                    <?php } else {
                                    ?> <span class="price">$<?php echo $product_price[$j] ?></span>
                                    <?php }
                                    ?>

                                    <a href="/product-page.php?productid=<?php echo $product_id[$j] ?>" class="btn1">View Details</a>

                                </div>

                            </div>
                        <?php    }
                        ?>

                    </section>

                    <ul class="pagination center">
                        <?php for ($i = 1; $i < $total_Pages; $i++) {

                            if ($i == $page_Id) {
                        ?> <li><a href="shop-category.php?category=<?php echo $category_id ?>&pageid=<?php echo $i ?>"> <button class="active"> <?php echo $i ?> </button></a></li>
                            <?php } else { ?>
                                <li><a href="shop-category.php?category=<?php echo $category_id ?>&pageid=<?php echo $i ?>"><button> <?php echo $i ?> </button></a></li>
                        <?php }
                        } ?>


                    </ul>

                </section>

            </div>

        </section>

    </div>

</section>
<script>
// Filter Box dropdown

let arrow = document.querySelectorAll('.filter_box > h3');

arrow.forEach((el) => {

    el.addEventListener('click', (e) => {

        e.target.parentNode.classList.toggle('collapse');

    });

});</script>

<?php include 'includes/footer.php'; ?>