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
            <!-- <div class="row-lg-2 row-md-2"> -->
                <?php include('shop-nav.php'); ?>
            <!-- </div> -->
            
            

            <hr />

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