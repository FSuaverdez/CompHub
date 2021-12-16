<?php
    include('header.php');
?>

<body>
    <?php
        include('navbar.php');
    ?>
    <hr />
    <!-- main body -->
    <main>
        <!-- Banner -->
        <section>

        </section>

        <!-- Buttons -->
        <section class="container-fluid mb-5" style="margin-top: 40vh">
            <div class="general-container d-flex justify-content-center">
                <div class="row" style="margin-bottom: 10vh">
                    <div class="col">
                        <a href="shop.php">
                            <div class="card mx-4" style="width: 15rem;">
                                    <img src="../images/cart.png" class="card-img-top" alt="Shop">
                                <div class="card-body home-btn">
                                    <a href="shop.php">Buy Products</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="repair.php">
                            <div class="card mx-4" style="width: 15rem;">
                                    <img src="../images/repair.png" class="card-img-top" alt="Repair">
                                <div class="card-body home-btn">
                                    <a href="repair.php">Ask for Assistance</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End of Main Body -->

    <script>
        document.getElementById("home").style.fontWeight = "bold";
    </script>

    <?php include('footer.php'); ?>

</body>


</html>