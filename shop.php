<?php
include 'includes/header.php';
include 'check_if_added.php';
if(empty($_GET['product']))
{
    header('Location:/');
}

$product = new Product;
$details = $product->product_details[0];
$images = $product->get_product_images();
$pricing = $product->get_product_pricing();
?>
<html>

<body class='container' style="text-align:center;" >
    <div>
        <?php foreach ($images as $image) {
            echo '<img width="200" src=' . $image['image_url'] . ' />';
        } ?>
    </div>
    <div>
        <input id="product_id" type="hidden" value="<?php echo $product->product_id; ?>" />
        <div class="product_desc">
            <span class="sku">SKU:<?php echo $details['sku_id']; ?> </span>
            <h1><?php echo $details['title']; ?></h1>
            <div class="star_rating">
                <form action="" method="post">
                    <p class="clasificacion">
                        <input id="radio1" type="radio" name="estrellas" value="5"><label for="radio1">★</label>
                        <input id="radio2" type="radio" name="estrellas" value="4"><label for="radio2">★</label>
                        <input id="radio3" type="radio" name="estrellas" value="3"><label for="radio3">★</label>
                        <input id="radio4" type="radio" name="estrellas" value="2"><label for="radio4">★</label>
                        <input id="radio5" type="radio" name="estrellas" value="1"><label for="radio5">★</label>
                    </p>
                </form>
                <p class="rating">4.5 Rating (20)</p>
                <a href="#" class="write_rating">Write a Review</a>
            </div>
            <p><?php echo $details['short_description']; ?>.</p>
            <span id="price"><?php echo '$' . $pricing['0']['price_value']; ?></span>
            <div class="product_type">
                <p>Door Height :</p>
                <select  id="price_value" style="display: none;" >
                    <?php
                    foreach ($pricing as $price) {
                        echo '<option text = ' . $price['price_text'] . ' value =' . $price['pricing_id'] . ' >' . $price['price_text'] . '</option>';
                    }
                    ?>
                </select>
                <div id="prices">
                    <?php
                    foreach ($pricing as $price) {
                        echo '<input type="checkbox" onclick="checkbox(this)" class="price-chechbox" data-text=' . $price['price_value'] . ' value =' . $price['price_value'] . ' />' . $price['price_text'] . '';
                    }
                    ?>
                </div>

            </div>
            <?php
            if(check_if_added_to_cart($product->product_id)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a id="cart" href="cart_add.php?id=<?php echo $product->product_id ?>" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                            ?>
            <ul class="social_icons">
                <li>SHARE THIS PRODUCT:</li>
                <li><a href="#"><img src="images/facebook.svg" alt="" width="18"></a></li>
                <li><a href="#"><img src="images/youtube.svg" alt="" width="16"></a></li>
                <li><a href="#"><img src="images/instagram.svg" alt="" width="18"></a></li>
                <li><a href="#"><img src="images/bbb.svg" alt="" width="15"></a></li>
                <li><a href="#"><img src="images/home.svg" alt="" width="18"></a></li>
                <li><a href="#"><img src="images/yellow-pages-icon.png" alt="" width="15"></a></li>
                <li><a href="#"><img src="images/google.svg" alt="" width="18"></a></li>
                <li><a href="#"><img src="images/yelp.svg" alt="" width="18"></a></li>
            </ul>
        </div>
        <div>
            <?php echo $details['long_description']; ?>
        </div>
    </div>
</body>
<script>
    var pricing_value = document.getElementById('price_value');
    var price_text = document.getElementById('price');
    pricing_value.addEventListener('change', function(e) {
        price_text.innerHTML = '$' + pricing_value.text;
        console.log(pricing_value.value);
    })
    document.querySelector('#prices').onclick = function(ev) {
  if(ev.target.value) {
    console.log(ev.target.checked, ev.target.value, ev.target.getAttribute('data-text'));
    price_text.innerHTML = '$' + ev.target.getAttribute('data-text');
    var add = document.getElementById('cart');
    var value = ev.target.value;
    var product_id = document.getElementById('product_id').value;
   add.href = 'cart_add.php?id=' + product_id +  `&product_id=`+value;
    console.log(add);
  }
}
window.onload = function () {
        var price_checkbox = document.getElementById("prices");
        var chks = price_checkbox.getElementsByTagName("INPUT");
        for (var i = 0; i < chks.length; i++) {
            chks[i].onclick = function () {
                for (var i = 0; i < chks.length; i++) {
                    if (chks[i] != this && this.checked) {
                        chks[i].checked = false;
                    }
                }
            };
        }
    };
</script>

</html>