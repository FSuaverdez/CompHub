<?php
    include('header.php');
    include('navbar.php');

    $mysqli = new mysqli('localhost', 'root', '','request') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);
?>
<main class="general-container">
    <section class="container-fluid shop-holder mx-auto" style="margin-top: 7.5rem">
        <div class="row">
            <h1 class= "col-lg-4 col-md-4 col-sm-6 col-xs-12">Shop</h1>
            <div class="col-lg-2 col-md-2"></div>
            <!-- Search form -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-3">
                <div class="row">
                    <div class="col-3"></div>
                    <ul class="col-3 navbar-nav ml-md-auto mr-sm-auto">
                        <li class="nav-item"><a class="nav-link mx-1 px-3 py-2" href="cart.php" id="cart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> CART</a></li>
                    </ul>
                    <form class="col-6 row form-inline form-search-custom ml-auto"  method="post">
                        <input name="valueToSearch" id="search_text" class="col form-control search-custom" type="text" placeholder="Search Bar..." autocomplete="off" aria-label="Search">
                        <button type="submit" class="btn col p-0" name="search_button" id="search_button">
                            <i class="fa fa-search text-black ml-3 d-lg-inline d-none" aria-hidden="true"></i>
                        </button>
                        <div class="search-result" id="result"></div>
                    </form>
                </div>
            </div>

            <hr/>
            
            <div class="container-fluid d-flex justify-content-center">
                <div class="row mx-3 px-auto">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col mb-3 px-3">
                        <form action="cart.php" method="post">
                            <div class="card card-container">
                            <img src="../admin/images/<?= $row['image']?>" class="card-img-top">
                                <div class="card-body">
                                    <h5>
                                        <?=
                                            substr($row['product_name'], 0, 15);
                                            if(strlen($row['product_name']) > 15) {
                                                echo "...";
                                            }
                                        ?>
                                    </h5>
                                    <input type="number" name="qty" class="input-quantity"> | <?php echo $row['stocks'] ?> pcs | ₱ <?php echo $row['price']; ?></h6>
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                    <input type="submit" class="btn cart-button" name="add_to_cart" value="Add to Cart">
                                </div>
                            </div>
                        </form>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    document.getElementById("shop").style.fontWeight = "bold";
    document.getElementById("navbar").style.padding = "0px 30px";
    document.getElementById("navbar").style.height = "auto";
    document.getElementById("navbar").style.background = "#F7F8F3";
    document.getElementById("navbar").style.transition = "0s";
    document.getElementById("nav-logo").style.display = "block";
                
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").style.padding = "0px 30px";
            document.getElementById("navbar").style.height = "auto";
            document.getElementById("navbar").style.background = "#F7F8F3";
            document.getElementById("nav-logo").style.display = "block";
        } else {
            document.getElementById("navbar").style.padding = "0px 30px";
            document.getElementById("navbar").style.height = "auto";
            document.getElementById("navbar").style.background = "#F7F8F3";
            document.getElementById("nav-logo").style.display = "block";
        }
    }

    function changeHeight(){
        var x = document.getElementById("navbar");
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            if (x.style.height === "90px") {
                x.style.height = "375px";
            } else {
                x.style.height = "90px";
            }
        // } else if (x.style.height === "100vh" && (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50)) {
        //     if (x.style.height === "100vh") {
        //         x.style.height = "100vh";
        //     } else if (x.style.height === "100vh" && (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50)) {
        //         x.style.height = "375px";
        //     } else {
        //         // x.style.height = "90px";
        //         x.style.height = "375px";
        //     }
        }
    }
</script>

<?php include('footer.php'); ?>