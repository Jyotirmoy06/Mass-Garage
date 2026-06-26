<?php

error_reporting(1);

include 'connection.php';

$product_id = $_GET['productid'];

$data = mysqli_query($con, "SELECT * FROM `product` WHERE `product_id`=$product_id");

$row = mysqli_fetch_assoc($data);



session_start();

$meta_Title = 'ULTRA-QUIET BELT DRIVE WI-FI GARAGE DOOR OPENER MODEL : B750';

$meta_Description = 'Built-in Wi-Fi® enables smartphone control with myQ®. PLUS lift power with a lift force equivalent to 3/4 HP*.';

$product_Description_long = $row['long_description'];

$product_Title = $row['title'];

$product_Url = $row['url_slug'];

//Related products Fetch

$related_product = mysqli_query($con, "SELECT * FROM `related_products` WHERE `product_id` =$product_id");



//category 

$category_Id = $row['category_id'];

$category_Row = mysqli_query($con, "SELECT * FROM `category` WHERE `category_id` = $category_Id");

$category = mysqli_fetch_array($category_Row);

$category_Value = $category['category'];

$product_Description = $row['short_description'];

$product_Sku = $row['sku_id'];



//product_Rating

//product price

$product_Min_Price = 1000;

$product_Max_Price = 0;

$price_id = [];

$product_price = [];

$price_data = mysqli_query($con, "SELECT * FROM `product_pricing` WHERE `product_id`=$product_id");

$i = 0;



while ($price = mysqli_fetch_array($price_data)) {

    $product_price[$i] = $price['price_value'];

    $price_id[$i] = $price['pricing_id'];

    $product_text[$i] = $price['price_text'];

    $product_option[$i] = $price['option_name'];

    if ($product_Max_Price < $product_price[$i]) {

        $product_Max_Price = $product_price[$i];
    }

    if ($product_Min_Price > $product_price[$i]) {

        $product_Min_Price = $product_price[$i];
    }

    $i++;
}



//product Specifications

$specs_name = [];
$specs_value = [];
$product_specs = mysqli_query($con, "SELECT * FROM `product_specs` WHERE `product_id`=$product_id");
$i = 0;
while ($specs = mysqli_fetch_array($product_specs)) {
    $specs_name[$i] = $specs['spec_name'];
    $specs_value[$i] = $specs['spec_value'];
    $i++;
}







?> <?php

include 'includes/header.php';

?>
<!--image Url Fetch--> <?php

$images = [];

$i = 0;

$records = mysqli_query($con, "SELECT * FROM `image` WHERE `product_id`=$product_id");

while ($data = mysqli_fetch_array($records)) {

    $images[$i] = $data['image_url'];

    $i++;
}

?> <section class="breadecrumb">
  <div class="wrapper">
    <ul>
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">Shop</a>
      </li>
      <li>
        <a href="/shop-category.php?category=
					<?php echo $category_Id ?>"> <?php echo $category_Value; ?> </a>
      </li>
      <li> <?php echo $product_Title ?> </li>
    </ul>
  </div>
</section> <?php



if ($_SESSION['success'] == true) {

    $success = $_SESSION['success'];

    unset($_SESSION['success']);

?> <section class="alert alert-success">
  <span> Thank you for submitting your review </span>
  <i class="bx bxs-x-circle close-alert"></i>
</section> <?php

} elseif ($_SESSION['error'] == true) {

    $error = $_SESSION['error'];

    unset($_SESSION['error']);

?> <section class="alert alert-success">
  <span> Oops!! Something went wrong </span>
  <i class="bx bxs-x-circle close-alert"></i>
</section> <?php

}



?> <section class="product_details">
  <div class="wrapper">
    <section class="product_sec">
      <div class="product_gal">
        <div class="xzoom-container">
          <div class="img_box">
            <img class="xzoom5" id="xzoom-magnific" src="
							<?php echo $images[0] ?>" xoriginal="
							<?php echo $images[0] ?>" />
          </div>
          <div class="xzoom-thumbs"> <?php for ($j = 0; $j <= count($images); $j++) {

                        ?> <a href="
								<?php echo $images[$j] ?>">
              <img class="xzoom-gallery5" width="80" src="
									<?php echo $images[$j] ?>" xpreview="
									<?php echo $images[$j] ?>" title="">
            </a> <?php } ?> </div>
        </div>
      </div>
      <div class="product_desc">
        <span class="sku"> <?php echo $product_Sku ?> </span>
        <h1> <?php echo $product_Title ?> </h1>
        <!--

                <div class="star_rating"><form action="" method="post"><p class="clasificacion"><input id="radio1" type="radio" name="estrellas" value="5"><label for="radio1">&#9733;</label><input id="radio2" type="radio" name="estrellas" value="4"><label for="radio2">&#9733;</label><input id="radio3" type="radio" name="estrellas" value="3"><label for="radio3">&#9733;</label><input id="radio4" type="radio" name="estrellas" value="2"><label for="radio4">&#9733;</label><input id="radio5" type="radio" name="estrellas" value="1"><label for="radio5">&#9733;</label></p></form>

                        -->
        <a onclick="showlightbox()" class="write_rating" style="font-weight:bold; color:black; text-decoration:underline; ">Write a Review</a>
        <p> <?php echo $product_Description ?> </p> <?php if (mysqli_num_rows($price_data) > 1) { ?> <span class="price">$ <?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $ <?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?> </span> <?php } else if (mysqli_num_rows($price_data) < 1) {

                ?> <span class="price">Contact for price</span> <?php } else {

                ?> <span class="price">$ <?php echo number_format((float)$product_Max_Price, 2, '.', ',') ?> </span> <?php } ?> <form method="post" action="contact-us.php"> <?php

                    if (mysqli_num_rows($price_data) > 1) {

                    ?> <div class="procuct_type">
            <select name="priceoption">
              <option value="No options selected. Available options are:  


										<?php for ($j = 0; $j < count($product_price); $j++) {

                            echo $product_option[$j] . ' : ' . $product_text[$j] . ' - $' . number_format((float) $product_price[$j], 2, '.', ',');

                            echo "

";
                        }      ?>"> Choose an Option </option> <?php

                                for ($j = 0; $j < count($product_price); $j++) {  ?> <option value="
										<?php echo 'that was quoted at $' . $product_price[$j] . ' for the ' .  $product_option[$j] . ' ' . $product_text[$j]; ?>"> <?php echo $product_option[$j] . ' : ' . $product_text[$j] . ' - $' . number_format((float) $product_price[$j], 2, '.', ','); ?> </option> <?php



                                }

                                ?>
            </select>
          </div> <?php } else if (mysqli_num_rows($price_data) < 1) {

                        // no price

                    } else { ?> <input type="hidden" value=", Listed for $
								<?php echo $product_price[0]; ?>" name="priceoption"> <?php }

                    ?> <input type="hidden" value="
									<?php echo $product_Title; ?>" name="title">
          <input type="hidden" value="
										<?php echo $product_Sku; ?>" name="sku">
          <input type="hidden" value="
											<?php echo $product_Url; ?>" name="url">
          <input class="buy_btn" type="submit" value="Buy Now" />
        </form>
        <!--    <a href="/contact-us.php?productid=
										<?php echo $product_id ?>" class="buy_btn">Buy Now</a>

                        -->
        <ul class="social_icons">
          <li>SHARE THIS PRODUCT:</li>
          <li>
            <a href="#">
              <img src="images/facebook.svg" alt="" width="18">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="images/youtube.svg" alt="" width="16">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="images/instagram.svg" alt="" width="18">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="images/bbb.svg" alt="" width="15">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="images/home.svg" alt="" width="18">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="images/yellow-pages-icon.png" alt="" width="15">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="images/google.svg" alt="" width="18">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="images/yelp.svg" alt="" width="18">
            </a>
          </li>
        </ul>
      </div>
    </section>
  </div>
</section>
<section class="product_info" id="description">
  <section class="info_head">
    <div class="wrapper">
      <ul class="tabnav">
        <li>
          <a class="page-scroll" href="#description">Description</a>
        </li>
        <li>
          <a class="page-scroll" href="#specifications">Specifications</a>
        </li>
        <li>
          <a class="page-scroll" href="#related_product">Related Products</a>
        </li>
      </ul>
    </div>
  </section>
  <section class="tab_content">
    <section class="description_cont">
      <div class="wrapper">
        <h3>Description</h3>
        <p> <?php echo $product_Description ?> </p> <?php echo htmlspecialchars_decode(Stripslashes($product_Description_long)); ?> <h4 id=specifications>SPECIFICATIONS</h4>
        <table> <?php for ($j = 0; $j < count($specs_name); $j++) { ?> <tr>
            <td> <?php echo $specs_name[$j] ?> </td>
            <td> <?php echo $specs_value[$j] ?> </td>
          </tr> <?php }

                                ?> </table>
      </div>
    </section>
    <!--

        <section class="product_slider" id="related_product"><div class="product_title"><div class="wrapper"><h3 class="productTitle activeTitle" data-id="tab1"><span>Featured Product</span>Related



                        Products</h3><h3 class="productTitle" data-id="tab2"><span>Featured Product</span>Accessories</h3><ul class="tabs productTab"><li class="tablink active" data-id="tab1">Related</li></ul></div></div><div class="section itemSlider"><div class="wrapper"><div class="section owl-carousel productSlider tab-active" data-id="tab1"><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div></div><div class="section owl-carousel owl-theme productSlider" data-id="tab2"><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div><div class="item"><img src="images/product-img.jpg" alt=""><div class="star"><img src="images/star.png" alt=""><span class="rating_count">(12)</span><h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3><span class="price">$195.00</span><a href="#" class="btn1">Buy Now</a></div></div></div></div></div>



                    -->
    <section class="section review_sec" id="reviews">
      <div class="wrapper">
        <div class="review_head">
          <div class="star_rating non_editable">
            <form action="" method="post"> <?php

                            $db = new Database();

                            $sql = 'SELECT overall FROM product_reviews WHERE productid=' . $product_id;

                            $connect = $db->getConnection()->query($sql);

                            $rating = $connect->fetchAll(PDO::FETCH_OBJ);

                            $onestar = 0;

                            $twostar = 0;

                            $threestar = 0;

                            $fourstar = 0;

                            $fivestar = 0;

                            foreach ($rating as $rate) {

                                if ($rate->overall == 1) {

                                    $onestar++;
                                }

                                if ($rate->overall == 2) {

                                    $twostar++;
                                }

                                if ($rate->overall == 3) {

                                    $threestar++;
                                }

                                if ($rate->overall == 4) {

                                    $fourstar++;
                                }

                                if ($rate->overall == 5) {

                                    $fivestar++;
                                }
                            }



                            $rating_total = (1 * $onestar) + (2 * $twostar) + (3 * $threestar) + (4 * $fourstar) + (5 * $fivestar);

                            $rating_sum = $onestar + $twostar + $threestar + $fourstar + $fivestar;

                            $avg_rating = round($rating_total / $rating_sum, 1);

                            $avg_rating_roundup = round($rating_total / $rating_sum);

                            ?> <p class="clasificacion">
                <input id="radio1" type="radio" name="estrellas" value="5" <?= $avg_rating_roundup >= 5 ? 'checked' : '' ?>>
                <label for="radio1">&#9733;</label>
                <input id="radio2" type="radio" name="estrellas" value="4" <?= $avg_rating_roundup == 4 ? 'checked' : '' ?>>
                <label for="radio2">&#9733;</label>
                <input id="radio3" type="radio" name="estrellas" value="3" <?= $avg_rating_roundup == 3 ? 'checked' : '' ?> />
                <label for="radio3">&#9733;</label>
                <input id="radio4" type="radio" name="estrellas" value="2" <?= $avg_rating_roundup == 2 ? 'checked' : '' ?>>
                <label for="radio4">&#9733;</label>
                <input id="radio5" type="radio" name="estrellas" value="1" <?= $avg_rating_roundup == 1 ? 'checked' : '' ?>>
                <label for="radio5">&#9733;</label>
              </p>
            </form>
            <p class="rating"> <?= $avg_rating_roundup > 0 ? $avg_rating_roundup : 0 ?> Rating ( <?= count($rating); ?>) </p>
            <a href="#" onclick="showlightbox()" class="write_rating">Write a Review</a>
          </div>
          <!--

                    <form action="" class="review_form"><input type="text" placeholder="Search Review..."><input type="submit"></form></div><section class="review_content"><h3>Review</h3><div class="review_cont"><div class="box"><h5>Filter By Review</h5><div class="rate_bars"><p>5 &#9733;</p><div class="rate_bar" rate="5"></div><p>(15)</p></div><div class="rate_bars"><p>4 &#9733;</p><div class="rate_bar" rate="3"></div><p>(3)</p></div><div class="rate_bars"><p>3 &#9733;</p><div class="rate_bar" rate="2"></div><p>(2)</p></div><div class="rate_bars"><p>2 &#9733;</p><div class="rate_bar" rate="0"></div><p>(0)</p></div><div class="rate_bars"><p>1 &#9733;</p><div class="rate_bar" rate="0"></div><p>(0)</p></div></div><div class="box right_box"><h5>Average Customer Ratings</h5><div class="rate_bars"><p>Overall</p><div class="rate_bar" rate="4"></div><p>4 (20)</p></div><div class="rate_bars"><p>Quality of Product</p><div class="rate_bar" rate="4"></div><p>4</p></div><div class="rate_bars"><p>Value of Product</p><div class="rate_bar" rate="2"></div><p>2</p></div><div class="rate_bars"><p>Ease of use</p><div class="rate_bar" rate="3"></div><p>3</p></div><div class="rate_bars"><p>Effectiveness</p><div class="rate_bar" rate="4"></div><p>4</p></div><div class="rate_bars"><p>Durability</p><div class="rate_bar" rate="4"></div><p>4</p></div></div></div><div class="review_cont"><div class="box"><h5>Most Helpful Favorable Review</h5><div class="single_review"><div class="star_rating non_editable"><form action="" method="post"><p class="clasificacion"><input id="radio1" type="radio" name="estrellas" value="5" class="disabled"><label for="radio1">&#9733;</label><input id="radio2" type="radio" name="estrellas" value="4" class="disabled"><label for="radio2">&#9733;</label><input id="radio3" type="radio" name="estrellas" value="3" class="disabled" checked><label for="radio3">&#9733;</label><input id="radio4" type="radio" name="estrellas" value="2" class="disabled"><label for="radio4">&#9733;</label><input id="radio5" type="radio" name="estrellas" value="1" class="disabled"><label for="radio5">&#9733;</label></p></form></div><p class="review_info">The Contractor - <span class="posted_on">3 years



                                        ago</span></p><h4>Love it</h4><p>I bought this nailer several months ago and I love it where has this been



                                    all



                                    my life. Gets into tho… <a href="#">Show Full Review</a></p></div><span class="review_helpful">4 of 5 people found this helpful</span><a href="#" class="review_more_btn">See more 4 and 5 star reviews</a></div><div class="box"><h5>Most Helpful Critical Review</h5><div class="single_review"><div class="star_rating non_editable"><form action="" method="post"><p class="clasificacion"><input id="radio1" type="radio" name="estrellas" value="5" class="disabled"><label for="radio1">&#9733;</label><input id="radio2" type="radio" name="estrellas" value="4" class="disabled"><label for="radio2">&#9733;</label><input id="radio3" type="radio" name="estrellas" value="3" class="disabled" checked><label for="radio3">&#9733;</label><input id="radio4" type="radio" name="estrellas" value="2" class="disabled"><label for="radio4">&#9733;</label><input id="radio5" type="radio" name="estrellas" value="1" class="disabled"><label for="radio5">&#9733;</label></p></form></div><p class="review_info">Howardski1 <span class="posted_on">3 years



                                        ago</span></p><h4>Dcn660 nailgun</h4><p>I have had 7 brand new guns in 3 years. I second fix houses and it’s a



                                    guarantee that the trigger me… <a href="#">Show Full Review</a></p></div><span class="review_helpful">6 of 11 people found this helpful</span><a href="#" class="review_more_btn">See more 1, 2 and 3 star reviews</a></div></div></section><section class="review_pagination"><p>1–8 of 17 Reviews</p><div class="right"><p>Sort by: </p><select name="" id=""><option value="">Most Relevant</option><option value="">Highest Stars</option><option value="">Lowest Stars</option></select><button class="filter"><svg fill="none" height="24" viewBox="0 0 24 24" width="24"
																								xmlns="http://www.w3.org/2000/svg"><path fill="#4e4e4e" clip-rule="evenodd" d="M12 3C12.5523 3 13 3.44772 13 4V15.1707C14.1652 15.5825 15 16.6938 15 18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18C9 16.6938 9.83481 15.5825 11 15.1707L11 4C11 3.44772 11.4477 3 12 3ZM18 3C18.5523 3 19 3.44772 19 4V9.17071C20.1652 9.58254 21 10.6938 21 12C21 13.3062 20.1652 14.4175 19 14.8293V20C19 20.5523 18.5523 21 18 21C17.4477 21 17 20.5523 17 20V14.8293C15.8348 14.4175 15 13.3062 15 12C15 10.6938 15.8348 9.58254 17 9.17071V4C17 3.44772 17.4477 3 18 3ZM3 6C3 4.34315 4.34315 3 6 3C7.65685 3 9 4.34315 9 6C9 7.30622 8.16519 8.41746 7 8.82929L7 20C7 20.5523 6.55228 21 6 21C5.44771 21 5 20.5523 5 20L5 8.82929C3.83481 8.41746 3 7.30622 3 6ZM6 5C5.44772 5 5 5.44772 5 6C5 6.55228 5.44772 7 6 7C6.55228 7 7 6.55228 7 6C7 5.44772 6.55228 5 6 5ZM18 11C17.4477 11 17 11.4477 17 12C17 12.5523 17.4477 13 18 13C18.5523 13 19 12.5523 19 12C19 11.4477 18.5523 11 18 11ZM12 17C11.4477 17 11 17.4477 11 18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18C13 17.4477 12.5523 17 12 17Z" fill="black" fill-rule="evenodd" /></svg></button></div></section><section class="reviews_section"><div class="review_row"><div class="left"><h4>Mayoral</h4><p>Reviews: <strong>5</strong><br>



                                Votes: <strong>4</strong><br>



                                Age: <strong>45 to 54</strong><br><br>



                                Trade: <strong>General Builder / Remodeler</strong><br>



                                Experience: <strong>Construction Professional</strong></p></div><div class="middle"><div class="star_row"><div class="star_rating non_editable"><form action="" method="post"><p class="clasificacion"><input id="radio1" type="radio" name="estrellas" value="5" class="disabled"><label for="radio1">&#9733;</label><input id="radio2" type="radio" name="estrellas" value="4" class="disabled"><label for="radio2">&#9733;</label><input id="radio3" type="radio" name="estrellas" value="3" class="disabled" checked><label for="radio3">&#9733;</label><input id="radio4" type="radio" name="estrellas" value="2" class="disabled"><label for="radio4">&#9733;</label><input id="radio5" type="radio" name="estrellas" value="1" class="disabled"><label for="radio5">&#9733;</label></p></form></div><p>- 3 years ago</p></div><h4>Best nailer ever</h4><p>Just so glad I bought this nailer and not having to carry my air compressor



                                ,that



                                alone is great ,i also have the cordless framing nailer and the cordless



                                circular saw best money I have ever spent on tools.



                            </p><div class="recommend_review"><p>Recommends this product span.</p><span class="yes"><img src="images/check.svg" alt="" width="20"> Yes</span><span class="no"><img src="images/cross.svg" alt="" width="12"> No</span></div><div class="review_img"><ul><li><img src="./images/review-img.jpg" alt=""></li><li><img src="./images/review-img.jpg" alt=""></li><li><img src="./images/review-img.jpg" alt=""></li></ul></div><ul class="helpful"><li>Helpful?</li><li>Yes - <span class="value yes">2</span></li><li>No - <span class="value no">0</span></li><li>Report</li></ul></div><div class="right"><p>Quality of Product</p><div class="rate_bars"><div class="rate_bar" rate="3"></div><p>3</p></div><p>Value of Product</p><div class="rate_bars"><div class="rate_bar" rate="4"></div><p>4</p></div><p>Ease of use</p><div class="rate_bars"><div class="rate_bar" rate="3"></div><p>3</p></div><p>Effectiveness</p><div class="rate_bars"><div class="rate_bar" rate="4"></div><p>4</p></div><p>Durability</p><div class="rate_bars"><div class="rate_bar" rate="5"></div><p>5</p></div></div></div><div class="review_row"><div class="left"><h4>Mayoral</h4><p>Reviews: <strong>5</strong><br>



                                Votes: <strong>4</strong><br>



                                Age: <strong>45 to 54</strong><br><br>



                                Trade: <strong>General Builder / Remodeler</strong><br>



                                Experience: <strong>Construction Professional</strong></p></div><div class="middle"><div class="star_row"><div class="star_rating non_editable"><form action="" method="post"><p class="clasificacion"><input id="radio1" type="radio" name="estrellas" value="5" class="disabled"><label for="radio1">&#9733;</label><input id="radio2" type="radio" name="estrellas" value="4" class="disabled"><label for="radio2">&#9733;</label><input id="radio3" type="radio" name="estrellas" value="3" class="disabled" checked><label for="radio3">&#9733;</label><input id="radio4" type="radio" name="estrellas" value="2" class="disabled"><label for="radio4">&#9733;</label><input id="radio5" type="radio" name="estrellas" value="1" class="disabled"><label for="radio5">&#9733;</label></p></form></div><p>- 3 years ago</p></div><h4>Best nailer ever</h4><p>Just so glad I bought this nailer and not having to carry my air compressor



                                ,that



                                alone is great ,i also have the cordless framing nailer and the cordless



                                circular saw best money I have ever spent on tools.



                            </p><div class="recommend_review"><p>Recommends this product span.</p><span class="yes"><img src="images/check.svg" alt="" width="20"> Yes</span><span class="no"><img src="images/cross.svg" alt="" width="12"> No</span></div><div class="review_img"><ul><li><img src="./images/review-img.jpg" alt=""></li><li><img src="./images/review-img.jpg" alt=""></li><li><img src="./images/review-img.jpg" alt=""></li></ul></div><ul class="helpful"><li>Helpful?</li><li>Yes - <span class="value yes">2</span></li><li>No - <span class="value no">0</span></li><li>Report</li></ul></div><div class="right"><p>Quality of Product</p><div class="rate_bars"><div class="rate_bar" rate="3"></div><p>3</p></div><p>Value of Product</p><div class="rate_bars"><div class="rate_bar" rate="4"></div><p>4</p></div><p>Ease of use</p><div class="rate_bars"><div class="rate_bar" rate="3"></div><p>3</p></div><p>Effectiveness</p><div class="rate_bars"><div class="rate_bar" rate="4"></div><p>4</p></div><p>Durability</p><div class="rate_bars"><div class="rate_bar" rate="5"></div><p>5</p></div></div></div></section><section class="reviews_pagination"><p>1–8 of 17 Reviews</p><ul><li><button class="left"><img src="images/arrow.svg" alt="" width="22"></button></li><li><button class="right"><img src="images/arrow.svg" alt="" width="22"></button></li></ul></section>

                    -->
        </div>
    </section>
  </section>
</section>
<section class="product_tab">
  <div class="wrapper">
    <div class="product_box">
      <a href="/" class="logo">
        <img src="images/logo.png" alt="">
      </a>
      <a href="#" class="product_info">
        <div class="img">
          <img src="
																											<?php echo $images[0]; ?>" alt="">
        </div>
        <div class="cont">
          <p class="sku"> <?php echo $product_Sku ?> </p>
          <h2> <?php echo $product_Title ?> </h2>
        </div>
      </a>
      <div class="btn_list">
        <form method="post" action="contact-us.php"> <?php if (mysqli_num_rows($price_data) > 1) {

                    ?> <input type="hidden" value="

No options selected. Available options are wow


																												<?php for ($j = 0; $j < count($product_price); $j++) {

                            echo $product_option[$j] . ' : ' . $product_text[$j] . ' - $' . number_format((float) $product_price[$j], 2, '.', ',');

                            echo "

";
                        }      ?>" name="priceoption"> <?php } else if (mysqli_num_rows($price_data) < 1) {

                        //no price

                    } else { ?> <input type="hidden" value=", Listed for $
																													<?php echo $product_price[0]; ?>" name="priceoption"> <?php } ?> <input type="hidden" value="
																														<?php echo $product_Title; ?>" name="title">
          <input type="hidden" value="
																															<?php echo $product_Sku; ?>" name="sku">
          <input type="hidden" value="
																																<?php echo $product_Url; ?>" name="url">
          <input class="btn1" type="submit" value="Buy Now" />
        </form>
        <!--    <a href="/contact-us.php?productid=
																															<?php echo $product_id ?>" class="btn1">Buy Now</a>

                    -->
      </div>
    </div>
  </div>
</section>
<script src="/js/scroll/productscroll.js"></script>
<script>
  $('.tablink').click(function() {
    $(".productSlider").removeClass('tab-active');
    $(".productSlider[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
    $(".productTitle[data-id='" + $(this).attr('data-id') + "']").addClass("activeTitle").siblings().removeClass('activeTitle');
    $(this).removeClass('active-a');
    $(this).addClass('active').siblings().removeClass('active');
  });
</script> <?php include_once "popup.php"; ?> </div> <?php include 'includes/footer.php' ?> <script src="js/porduct-gallery/setup.js"></script>

<script type="text/javascript" src="/js/porduct-gallery/xzoom.min.js"></script>
<script src="/js/porduct-gallery/magnific-popup.js"></script>
<link type="text/css" rel="stylesheet" media="all" href="css/porduct-gallery/magnific-popup.css" />
<link rel="stylesheet" type="text/css" href="css/porduct-gallery/xzoom.css?v=1.2" media="all" />

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/screen.css">
<script src="js/owl.carousel.js"></script>
<script src="https://apps.bazaarvoice.com/deployments/dewalt/main_site/production/en_US/reviews-config.js"></script>
<script src="js/reviews.js"></script>
<script src="https://www.dewalt.com/_JS/Dewalt/plugins/external/require.js"></script>
<script src="js/scroll/bootstrap.min.js"></script>
<script src="js/scroll/jquery.easing.min.js"></script>
</body>
</html>