<?php

$meta_Title = 'Garage Door Repair in Massachusetts';
$meta_Description = 'Mass Garage Doors Expert is the team to call for your garage door repair in Massachusetts. We have locations across the state to help with your situation!';
$meta_url = 'https://massgaragedoorsexpert.com/';
$meta_ogTitle = 'Home';
?>
	<?php
session_start();
include 'connection.php';
include 'includes/header.php';
?>
		<section class="banner">
			<div class="owl-carousel owl-theme bannerSlider">
				<div class="item"> <img src="/images/residential-banner.jpg" alt="">
					<div class="banner_text">
						<div class="wrapper">
							<div class="cont">
								<h2>RESIDENTIAL GARAGE DOOR EXPERTS</h2>
								<h5><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</h5>
								<p>Our garage door technicians are available for you 24 hours a day, 7 days a week. Our garage door service area includes
									<?php echo $city_name  ?> proper and the counties of Suffolk MA, Middlesex MA, Norfolk MA, Plymouth MA, Bristol MA, Worcester MA, Essex MA, Rockingham NH, Hillsborough NH, and Providence RI. Call now for your free consultation and get the garage door you need.</p>
								<ul class="btn_list">
									<li>
										<button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
									</li>
									<li>
										<a href="tel:<?=$printableNumber?>" class="btn2"><img src="images/phone.svg" alt="" style="width: 26px;display: inline-block;"><span class="respo">Call:

                                    </span><?=$printableNumber?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="item"> <img src="images/truck.jpeg" alt="">
					<div class="banner_text">
						<div class="wrapper">
							<div class="cont">
								<h2>COMMERCIAL GARAGE DOOR EXPERTS</h2>
								<h5><?php echo $city_name . ",";  ?> <?php echo $state_name  ?> Top Rated Company</h5>
								<p>Our garage door technicians are available for you 24 hours a day, 7 days a week. Our garage door service area includes
									<?php echo $city_name  ?> proper and the counties of Suffolk MA, Middlesex MA, Norfolk MA, Plymouth MA, Bristol MA, Worcester MA, Essex MA, Rockingham NH, Hillsborough NH, and Providence RI. Call now for your free consultation and get the garage door you need.</p>
								<ul class="btn_list">
									<li>
										<button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
									</li>
									<li>
										<a href="tel:<?=$printableNumber?>" class="btn2"><img src="images/phone.svg" alt="" style="width: 26px;display: inline-block;"><span class="respo">Call:

                                    </span><?=$printableNumber?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
			$('.bannerSlider').owlCarousel({
				items: 1,
				margin: 0,
				loop: true,
				autoplay: true,
				autoplayTimeout: 30000
			});
			</script>
		</section>
		<section class="home_row1">
			<h1 class="headstrip">See What Else We're Doing</h1>
			<div class="grid">
				<div href="/residential-garage-doors.php" class="col">
					<div class="front"> <img src="images/residential-icon.jpg" alt="">
						<div class="hover">
							<div class="text">
								<h4>Residential Garage Doors</h4> <a href="/residential-garage-doors.php" class="btn1">More Info</a> </div>
						</div>
					</div>
				</div>
				<div href="#" class="col">
					<div class="front"> <img src="images/commercial-garage-doors.jpg" alt="">
						<div class="hover">
							<div class="text">
								<h4>Commercial Garage Doors</h4> <a href="/commercial-garage-doors.php" class="btn1">More Info</a> </div>
						</div>
					</div>
				</div>
				<div href="#" class="col">
					<div class="front"> <img src="images/gates-small.jpg" alt="">
						<div class="hover">
							<div class="text">
								<h4>Gates</h4> <a href="#gate" class="btn1">More Info</a> </div>
						</div>
					</div>
				</div>
				<div href="#" class="col">
					<div class="front"> <img src="images/storage-small.jpg" alt="">
						<div class="hover">
							<div class="text">
								<h4>Storage</h4> <a href="#storage" class="btn1">More Info</a> </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--
<section class="product_slider" style='display:none;' >

<div class="product_title">

    <div class="wrapper">

        <h3 class="productTitle activeTitle" data-id="tab1"><span>Featured Product</span>Wall-Mount Openers

        </h3>

        <h3 class="productTitle" data-id="tab2"><span>Belt Drive Garage Door Openers</span>Accessories</h3>

        <h3 class="productTitle" data-id="tab3"><span>Chain Drive Garage Door Openers</span>Tools</h3>

        <ul class="tabs productTab">

            <li class="tablink active" data-id="tab1">Wall-Mount Openers</li>

            <li class="tablink" data-id="tab2">Belt Drive Garage Door Openers</li>

            <li class="tablink" data-id="tab3">Chain Drive Garage Door Openers</li>

        </ul>

    </div>

</div>

<div class="section itemSlider">

    <div class="wrapper">

        <div class="section owl-carousel owl-theme productSlider tab-active" data-id="tab1">

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

        </div>

        <div class="section owl-carousel owl-theme productSlider" data-id="tab2">

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

        </div>

        <div class="section owl-carousel owl-theme productSlider" data-id="tab3">

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

            <div class="item">

                <img src="images/product-img.jpg" alt="">

                <div class="star">

                    <img src="images/star.png" alt="">

                    <span class="rating_count">(12)</span>

                    <h3>Garage Door Roller 4 Inch Stem Standard Rollers Black Nylon Wheel</h3>

                    <span class="price">$195.00</span>

                    <a href="#" class="btn1">Buy Now</a>

                </div>

            </div>

        </div>

    </div>

</div>

</section>-->
		<section class="product_slider">
			<div class="product_title">
				<div class="wrapper">
					<h3 class="productTitle activeTitle" data-id="tab1"><span>Featured Product</span>Wall-Mount Openers</h3>
					<h3 class="productTitle" data-id="tab2"><span>Featured Product</span>Belt Drive Openers</h3>
					<h3 class="productTitle" data-id="tab3"><span>Featured Product</span>Chain Drive Openers</h3>
					<ul class="tabs productTab">
						<li class="tablink active" data-id="tab1">Wall-Mount Openers</li>
						<li class="tablink" data-id="tab2">Belt Drive Openers</li>
						<li class="tablink" data-id="tab3">Chain Drive Openers</li>
					</ul>
				</div>
			</div>
			<div class="section itemSlider">
				<div class="wrapper">
                    <div class="section tab_box tab-active" data-id="tab1">
                        <?php
                            $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=1");
                            $num_products = mysqli_num_rows($data);
                            if($num_products > 5){
                        ?>
                        <div class="section owl-carousel owl-theme productSlider">
                            <?php
                                $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=1");
                                $num_products = mysqli_num_rows($data);
                                echo $num_products;
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
                            <div class="item"> 
                                <img src="<?php echo $product_image ?>" alt="">
                                <div class="star">
                                    <h3><?php echo $product_title; ?></h3>
                                    <?php if ($product_options > 1) { ?> 
                                        <span class="price">$<?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?></span>
                                        <?php } else if ($product_options < 1) { ?> 
                                            <span class="price">Contact for price</span>
                                        <?php } else { ?> 
                                            <span class="price">$<?php echo $product_price ?></span>
                                        <?php } ?> 
                                    <a href="#" class="btn1">Buy Now</a> </div>
                                </div>
                            <?php $i++; } ?>
                        </div>
                        <?php } else { ?>
                        <div class="section productGrid tab-active" data-id="tab1">
                            <?php
                                $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=1");
                                $num_products = mysqli_num_rows($data);
                                echo $num_products;
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
                        
                        
                            
                        
                        
                            <div class="item"> 
                                <img src="<?php echo $product_image ?>" alt="">
                                <div class="star">
                                    <h3><?php echo $product_title; ?></h3>
                                    <?php if ($product_options > 1) { ?> 
                                        <span class="price">$<?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?></span>
                                        <?php } else if ($product_options < 1) { ?> 
                                            <span class="price">Contact for price</span>
                                        <?php } else { ?> 
                                            <span class="price">$<?php echo $product_price ?></span>
                                        <?php } ?> 
                                    <a href="#" class="btn1">Buy Now</a> 
                                </div>
                            </div>
                        <?php $i++; } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="section tab_box" data-id="tab2">
                        <?php
                            $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=2");
                            $num_products = mysqli_num_rows($data);
                            if($num_products > 5){
                        ?>
                        <div class="section owl-carousel owl-theme productSlider">
                            <?php 
                                $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=2");
                                $num_products = mysqli_num_rows($data);
                                echo $num_products;
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

                                    $product_title = $title['title'];

                                ?>
                                <div class="item"> <img src="<?php echo $product_image ?>" alt="">
                                    <div class="star">
                                        <h3><?php echo $product_title; ?></h3>
                                        <?php if ($product_options > 1) { ?> <span class="price">$<?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?></span>
                                            <?php } else if ($product_options < 1) { ?> <span class="price">Contact for price</span>
                                                <?php } else {
                                ?> <span class="price">$<?php echo $product_price ?></span>
                                                    <?php }
                                ?> <a href="#" class="btn1">Buy Now</a> </div>
                                </div>
                                <?php $i++; } ?>
                        </div>
                        <?php } else { ?>
                            <div class="section productGrid" data-id="tab2">
                                <?php 
                                    $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=2");
                                    $num_products = mysqli_num_rows($data);
                                    echo $num_products;
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

                                        $product_title = $title['title'];

                                    ?>
                                    <div class="item"> <img src="<?php echo $product_image ?>" alt="">
                                        <div class="star">
                                            <h3><?php echo $product_title; ?></h3>
                                            <?php if ($product_options > 1) { ?> <span class="price">$<?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?></span>
                                                <?php } else if ($product_options < 1) { ?> <span class="price">Contact for price</span>
                                                    <?php } else {
                                    ?> <span class="price">$<?php echo $product_price ?></span>
                                                        <?php }
                                    ?> <a href="#" class="btn1">Buy Now</a> </div>
                                    </div>
                                    <?php $i++; } ?>
                            <?php } ?>
					    </div>
					</div>
                    <div class="section tab_box" data-id="tab3">
                        <?php
                            $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=3");
                            $num_products = mysqli_num_rows($data);
                            if($num_products > 5){
                        ?>
                        <div class="section owl-carousel owl-theme productSlider">
                            <?php
                            echo $num_products;
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
                                $product_title = $title['title'];
                            ?>
                                <div class="item"> <img src="<?php echo $product_image ?>" alt="">
                                    <div class="star">
                                        <h3><?php echo $product_title; ?></h3>
                                        <?php if ($product_options > 1) { ?> <span class="price">$<?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?></span>
                                            <?php } else if ($product_options < 1) { ?> <span class="price">Contact for price</span>
                                                <?php } else {
                                ?> <span class="price">$<?php echo $product_price ?></span>
                                                    <?php }
                                ?> <a href="#" class="btn1">Buy Now</a> </div>
                                </div>
                                <?php $i++; } ?>
                        </div>
                        <?php } else  { ?>
                            <div class="section productGrid" data-id="tab3">
                                <?php 
                                    $data = mysqli_query($con, "SELECT * FROM `product` WHERE `category_id`=3");
                                    $num_products = mysqli_num_rows($data);
                                    echo $num_products;
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

                                        $product_title = $title['title'];

                                    ?>
                                    <div class="item"> <img src="<?php echo $product_image ?>" alt="">
                                        <div class="star">
                                            <h3><?php echo $product_title; ?></h3>
                                            <?php if ($product_options > 1) { ?> <span class="price">$<?php echo number_format((float) $product_Min_Price, 2, '.', ',') ?> – $<?php echo number_format((float) $product_Max_Price, 2, '.', ',') ?></span>
                                                <?php } else if ($product_options < 1) { ?> <span class="price">Contact for price</span>
                                                    <?php } else {
                                    ?> <span class="price">$<?php echo $product_price ?></span>
                                                        <?php }
                                    ?> <a href="#" class="btn1">Buy Now</a> </div>
                                    </div>
                                    <?php $i++; } ?>
                        <?php } ?>
					</div>
					</div>
				</div>
			</div>
		</section>
		<script>
		// Product Tab
		$('.tablink').click(function() {
			$(".tab_box").removeClass('tab-active');
			$(".tab_box[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
			$(".productTitle[data-id='" + $(this).attr('data-id') + "']").addClass("activeTitle").siblings().removeClass('activeTitle');
			$(this).removeClass('active-a');
			$(this).addClass('active').siblings().removeClass('active');
		});
		</script>
		<section class="black_dividers">
			<div class="wrapper">
				<a name="residential"></a>
				<h3>Residential Garage Door Services</h3>
				<p>From accidental scratches, dents, dings or bumps to a jammed inner track, complete panel bend, or broken window, or lock mechanism, your garage door is tested daily. Even an unusual turn in the weather can cause storm damage, but a garage door repair is not something you should tackle with a DIY fix. Instead, you can rely upon the professional expertise know-how of the properly trained technicians from Mass Garage Doors for all your garage door needs, maintenance, repair, or sales/replacement. Our Boston central hub service center is ready to resolve your garage door requirements. </p>
			</div>
		</section>
		<section class="split_row">
			<div class="cont">
				<h3>Custom Design with Our Customers in Mind.</h3>
				<p>We work with our clients to design an entire garage entryway rebuilds or brand new addons if you are in that market. For example, do you have an existing shed or tool barn on your property that you would love to transform into a single car, motorcycle or other form of recreational vehicle secured storage? Or maybe you are a seasonal gardening enthusiast or budding mechanic who works from home? By adding a lockable, sturdy, and insulated garage door, think of the savings you can earn by avoiding storage fees off property, added insurance coverage, drive time to the unit etc. Be it an exterior “facelift” to a brand-new install; Mass Garage Doors works with top-of-the-line products from Amarr®, Wayne Dalton®, Garaga®, and Clopay® to Genie®, Liftmaster®, and Chamberlain®.; all industry standouts in the field. There is no second quality here from springs to latches, insulating strips, and precisely forged and striated anchoring nuts and bolts. </p> <a href="/residential-garage-doors.php" class="btn1">Read More</a> </div>
			<div class="img"><img src="images/residential-medium.jpg" alt=""></div>
		</section>
		<section class="black_dividers" style="background-color: #ffc600;">
			<div class="wrapper">
				<a name="commercial"></a>
				<h3 style="color:black;">Commercial and Industrial Meet Sleek and Unique</h3>
				<p style="color:black;">Here at Mass Garage Door, we believe that a successful business relationship starts with understanding. Not only do we want to make your brand-new commercial access the talk of the town, we want you to rest easy knowing that we can be trusted to outshine any other repair company in the area. Choices of commercial garage doors should be best suited to your space, type of business, and labor-intensive daily wear and tear. Maintenance and repairs should not be avoided as safety dictates your business productivity, minimizes the risk of injury, and overall, adheres to insurance or code guidelines. </p>
			</div>
		</section>
		<section class="split_row">
			<div class="img"><img src="images/commercial-garage-doors-medium.jpg" alt=""></div>
			<div class="cont">
				<h3>Rolling out the showcase</h3>
				<p style="all:unset;">For your consideration, take a look at some options to choose from:</p>
				<br>
				<ul style="margin-left:2.3% ;">
					<li style="list-style: disc;"> Overhead/Sectional doors, either paneled or one-piece, track from the ceiling much like a residential garage, allow for add-on options like windows, insulation, remote entry locks, plus your choice of construction material; wood, aluminum, vinyl etc. </li>
					<li style="list-style: disc;"> Roll up /Slat coiled doors are remarkable space savers because they roll up into self-contained tubes that free up ceiling storage space by avoiding the need to be tracked like the overhead sectional doors. </li>
					<li style="list-style: disc;"> Fire Doors are a legal requirement if your business relies on operational equipment to be flammable, incendiary, chemical or other based fire or emissions hazard potential risk factors. Fire doors can be used as a containment or barrier prevention from other sections of your building; these doors can be operated manually or by auto-detected emergency activation sensors. </li>
					<li style="list-style: disc;"> High-Speed garage doors are perfect for operation in temperate controlled work environments, pressure-sensitive sections, or severe extreme weather geographic regions. </li>
					<li style="list-style: disc;"> Ultra-Sleek High-End Aluminum and/or Glass garage or access doors add the absolute upper niche to your business showroom, uber chic restaurants, and nightclubs. In addition, multi-staffed divided workspace areas that once utilized room dividers for boardrooms and office cubicles are also now opting for full floor to ceiling dividers. A must-consider contender for the upper trendy business owner. </li>
					<ul> <a href="/commercial-garage-doors.php" class="btn1">Read More</a> </div>
		</section>
		<section class="black_dividers">
			<div class="wrapper">
				<a name="gate"></a>
				<h3>Upgrade, Update or Renovate Your Gate.</h3>
				<p>Your home is your pride and joy, your castle and place of safety and comfort. When your thoughts turn to the idea of the look, and added secure stability of a driveway access gate, make sure you include Mass Garage Doors Experts on your list. Within the Boston region, Ronen and his family of New England proud design, installation and maintenance stylists will outfit you with the elegant old-style charm of a top-of-the-line gate suited for new world service and purposes within a realistic and best cost-efficient way possible. At Mass Garage Doors, we strongly believe that individual custom work and top-line suppliers can be made available to all walks of homestyle life. You are virtually turning back the pages of history and applying superior new age appeal, giving your home a shining edge with an old-world feel. </p>
			</div>
		</section>
		<section class="split_row">
			<div class="cont">
				<h3>Style and Function</h3>
				<p style="all:unset;">The three common styles of driveway gates are:</p>
				<br>
				<ul style="list-style: disc;margin-left:2.3% ">
					<li style="list-style: disc;"> The Swinging Gate. True to its name, it swings open from either left- or right-hand side of the driveway access and unless you have a remarkably steep slope, the door will open inward. Keep in mind that with ANY style, a high angle sloped driveway needs proper clearance to the road or sidewalk as the basic rule of gravitational safety deems that in that case, the door should be fitted to swing outward to allow for ease of vehicle access.</li>
					<li style="list-style: disc;"> The Double or Center Swing Gate. This dual gate splits in the middle into two gated sections and is best suited for an extra wide driveway. Esthetically, it is also the most requested upgrade or install due to its affable curb appeal.</li>
					<li style="list-style: disc;"> The Slider Gate rounds out the top 3 and touts its compatibility to work with small spaces as a super sell point within smaller residential or urban downtown living, where land is of premium limitation. Automated slider gates are a perfect add-on to city dwellers and cottage owners and single-family homes or even as a pool surrounding patio enclosure. </li>
				</ul> <a href="#" class="btn1">Read More</a> </div>
			<div class="img"><img src="images/gates-medium.jpg" alt=""></div>
		</section>
		<section class="black_dividers" style="background-color: #ffc600;">
			<div class="wrapper">
				<a name="storage"></a>
				<h3 style="color:black;">Garage Storage: Where Bold Meets Old.</h3>
				<p style="color:black;">Our vision for adding garage storage doesn’t just stop with updated metal shelving and color-coordinated cabinets. We are inspired by the new generation of ultra-tech design that takes transformable units and components beyond the future of interior renovation and garage remodeling. Consider it to be our revolution on architectural storage.
					<br> Suppose you invest your weekends working on mechanical hobbies, woodworking, crafting, or auto maintenance or operate a home business that requires you to work with tools of any sort. In that case, you OWE it to your venture to call us at Mass Garage Doors Experts and begin to share YOUR vision with our expertise to custom create the showroom workspace of your dreams. </p>
			</div>
		</section>
		<section class="split_row">
			<div class="img"><img src="images/storage-medium.jpg" alt=""></div>
			<div class="cont">
				<h3>New age style.</h3>
				<p>I am Ronen Sisso, a visualist with a huge handle on the future of home/garage renovation techniques. That is why I quickly became New England’s top choice for superior custom creativity. I truly believe in top quality, not cookie-cutter mass quantity, and my ethics showcase this because I hand-selected and trained my design team to share my dreams and bring them to life on your stage with their own expertise. So, if you consider a “new look” feel for your garage, workshop, man cave, or shed, we are the crafts team for you. </p> <a href="#" class="btn1">Read More</a> </div>
		</section>
		<section class="black_dividers">
			<div class="wrapper">
				<a name="residential"></a>
				<h3>Reach Out to Us</h3>
				<p>Our friendly and trustworthy technicians are available whenever you need them. We serve clients in the Greater Boston, area as well as the counties of Suffolk, Middlesex, Norfolk, and Essex, MA. We would also appreciate any feedback from our valued clients. If you have any questions about our services or rates, feel free to get in touch with us. We always look forward to hearing from you!</p>
				<button onclick="show_workiz()" role="button" id="book_an_appointment" class="btn1">BOOK AN APPOINTMENT</button>
			</div>
		</section>
		<?php
include 'includes/footer.php';
?>