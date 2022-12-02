<?php
include 'includes/header.php';
require_once "config.php";
$select_cart  = mysqli_query($link, "SELECT * FROM cart");

if(mysqli_num_rows($select_cart) > 0){
    while($fetch_cart = mysqli_fetch_assoc($select_cart)){

    }
}

$select_cart = mysqli_query($link, "SELECT * FROM cart");
$grand_total = 0;
if(mysqli_num_rows($select_cart) > 0){
   while($fetch_cart = mysqli_fetch_assoc($select_cart)){
?>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Koszyk</h2>
                </div>
                <div class="content">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image">
                                                <img src="assets/img/products/<?php echo $row[5];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#"><?php echo $fetch_cart['name']; ?></a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="form-label d-none d-md-block" for="quantity">Ilość</label><input type="number" id="number" class="form-control quantity-input" value="<?php echo $fetch_cart['quantity']; ?>"></div>
                                        <div class="col-6 col-md-2 price"><span><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?> zł</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Podliczenie</h3>
                                <h4><span class="text">Razem</span><span class="price"><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?> zł</span></h4><a href="payment-page.php"><button class="btn btn-primary btn-lg d-block w-100" type="button">Zamów</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
$grand_total += $sub_total;  
};
};
include 'includes/footer.php';
?>