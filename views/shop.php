<?php
include('header.php');
include('navbar.php');

$mysqli = new mysqli('localhost', 'root', '', 'request') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);

if (isset($_POST['valueToSearch'])) {
    $search = $_POST['valueToSearch'];
}

?>
<main class="general-container">
    <h1 class="shop-title col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto" style="margin-top: 7.5rem">Shop</h1>
    <section class="container-fluid shop-holder mx-auto">
        <div class="row">
            <?php include('shop-nav.php'); ?>
            
            <hr />

        <div class="tab-content">   
            <!-- Shop All Content -->
            <div class="tab-pane fade show active" id="shopAll" role="tabpanel" aria-labelledby="shopAll-tab">
                <div class="container-fluid d-flex justify-content-center">
                    <div class="row mx-3 px-auto">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <?php
                            if (isset($_POST['valueToSearch'])) {
                                $search = $_POST['valueToSearch'];
                                if (!str_contains(strtolower($row['product_name']), strtolower($search))) {
                                    continue;
                                }
                            } ?>
                            <div class="d-flex justify-content-around col mb-3 px-3">
                                <form action="cart.php" method="post">
                                    <div class="card card-container">
                                        <img src="../admin/images/<?= $row['image'] ?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5>
                                                <?=
                                                substr($row['product_name'], 0, 18);
                                                if (strlen($row['product_name']) > 18) {
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

            <!-- Shop Computers Content -->
            <div class="tab-pane fade" id="shopComputer" role="tabpanel" aria-labelledby="shopComputer-tab">
                <?php 
                    $result2 = $mysqli->query("SELECT * FROM products WHERE product_category = 'Computers'") or die($mysqli->error);
                ?>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="row mx-5 px-2">
                        <?php while ($row2 = $result2->fetch_assoc()): ?>
                            <div class="col mb-3 px-3">
                                <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <div class="card card-container">
                                    <img src="../admin/images/<?= $row2['image']?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5>
                                                <?=
                                                    substr($row2['product_name'], 0, 18);
                                                    if(strlen($row2['product_name']) > 18) {
                                                        echo "...";
                                                    }
                                                ?>
                                            </h5>
                                            <input type="number" name="qty" class="input-quantity"> | <?php echo $row2['stocks'] ?> pcs | ₱ <?php echo $row2['price']; ?></h6>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row2["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price" value="<?php echo $row2["price"]; ?>" />
                                            <input type="submit" class="btn cart-button" name="add_to_cart" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <!-- Shop Monitors Content -->
            <div class="tab-pane fade" id="shopMonitor" role="tabpanel" aria-labelledby="shopMonitor-tab">
                <?php 
                    $result3 = $mysqli->query("SELECT * FROM products WHERE product_category = 'Monitors'") or die($mysqli->error);
                ?>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="row mx-5 px-2">
                        <?php while ($row3 = $result3->fetch_assoc()): ?>
                            <div class="col mb-3 px-3">
                                <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <div class="card card-container">
                                    <img src="../admin/images/<?= $row3['image']?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5>
                                                <?=
                                                    substr($row3['product_name'], 0, 18);
                                                    if(strlen($row3['product_name']) > 18) {
                                                        echo "...";
                                                    }
                                                ?>
                                            </h5>
                                            <input type="number" name="qty" class="input-quantity"> | <?php echo $row3['stocks'] ?> pcs | ₱ <?php echo $row3['price']; ?></h6>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row3["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price" value="<?php echo $row3["price"]; ?>" />
                                            <input type="submit" class="btn cart-button" name="add_to_cart" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <!-- Shop Audio Content -->
            <div class="tab-pane fade" id="shopComputer" role="tabpanel" aria-labelledby="shopComputer-tab">
                <?php 
                    $result4 = $mysqli->query("SELECT * FROM products WHERE product_category = 'Audio'") or die($mysqli->error);
                ?>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="row mx-5 px-2">
                        <?php while ($row4 = $result4->fetch_assoc()): ?>
                            <div class="col mb-3 px-3">
                                <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <div class="card card-container">
                                    <img src="../admin/images/<?= $row4['image']?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5>
                                                <?=
                                                    substr($row4['product_name'], 0, 18);
                                                    if(strlen($row4['product_name']) > 18) {
                                                        echo "...";
                                                    }
                                                ?>
                                            </h5>
                                            <input type="number" name="qty" class="input-quantity"> | <?php echo $row4['stocks'] ?> pcs | ₱ <?php echo $row4['price']; ?></h6>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row4["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price" value="<?php echo $row4["price"]; ?>" />
                                            <input type="submit" class="btn cart-button" name="add_to_cart" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <!-- Shop Storage Content -->
            <div class="tab-pane fade" id="shopStorage" role="tabpanel" aria-labelledby="shopStorage-tab">
                <?php 
                    $result5 = $mysqli->query("SELECT * FROM products WHERE product_category = 'Storage'") or die($mysqli->error);
                ?>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="row mx-5 px-2">
                        <?php while ($row5 = $result5->fetch_assoc()): ?>
                            <div class="col mb-3 px-3">
                                <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <div class="card card-container">
                                    <img src="../admin/images/<?= $row5['image']?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5>
                                                <?=
                                                    substr($row5['product_name'], 0, 18);
                                                    if(strlen($row5['product_name']) > 18) {
                                                        echo "...";
                                                    }
                                                ?>
                                            </h5>
                                            <input type="number" name="qty" class="input-quantity"> | <?php echo $row5['stocks'] ?> pcs | ₱ <?php echo $row5['price']; ?></h6>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row5["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price" value="<?php echo $row5["price"]; ?>" />
                                            <input type="submit" class="btn cart-button" name="add_to_cart" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <!-- Shop Peripherals Content -->
            <div class="tab-pane fade" id="shopPeripherals" role="tabpanel" aria-labelledby="shopPeripherals-tab">
                <?php 
                    $result6 = $mysqli->query("SELECT * FROM products WHERE product_category = 'Peripherals'") or die($mysqli->error);
                ?>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="row mx-5 px-2">
                        <?php while ($row6 = $result6->fetch_assoc()): ?>
                            <div class="col mb-3 px-3">
                                <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <div class="card card-container">
                                    <img src="../admin/images/<?= $row6['image']?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5>
                                                <?=
                                                    substr($row6['product_name'], 0, 18);
                                                    if(strlen($row6['product_name']) > 18) {
                                                        echo "...";
                                                    }
                                                ?>
                                            </h5>
                                            <input type="number" name="qty" class="input-quantity"> | <?php echo $row6['stocks'] ?> pcs | ₱ <?php echo $row6['price']; ?></h6>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row6["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price" value="<?php echo $row6["price"]; ?>" />
                                            <input type="submit" class="btn cart-button" name="add_to_cart" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <!-- Shop Others Content -->
            <div class="tab-pane fade" id="shopOthers" role="tabpanel" aria-labelledby="shopOthers-tab">
                <?php 
                    $result7 = $mysqli->query("SELECT * FROM products WHERE product_category = 'Others'") or die($mysqli->error);
                ?>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="row mx-5 px-2">
                        <?php while ($row7 = $result7->fetch_assoc()): ?>
                            <div class="col mb-3 px-3">
                                <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <div class="card card-container">
                                    <img src="../admin/images/<?= $row7['image']?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5>
                                                <?=
                                                    substr($row7['product_name'], 0, 18);
                                                    if(strlen($row7['product_name']) > 18) {
                                                        echo "...";
                                                    }
                                                ?>
                                            </h5>
                                            <input type="number" name="qty" class="input-quantity"> | <?php echo $row7['stocks'] ?> pcs | ₱ <?php echo $row7['price']; ?></h6>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row7["product_name"]; ?>" />
                                            <input type="hidden" name="hidden_price" value="<?php echo $row7["price"]; ?>" />
                                            <input type="submit" class="btn cart-button" name="add_to_cart" value="Add to Cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endwhile; ?>
                    </div>
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

    window.onscroll = function() {
        scrollFunction()
    };

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

    function changeHeight() {
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