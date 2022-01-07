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
        <section style="margin-top: 30vh">
            <div class="dark-div d-flex align-items-center">
                <div class="col">
                    <h3>What We Do</h3>
                    <p>
                        Giga Shop is your number one source of computer hardware components and best repair services.<br/>
                        We're dedicated to giving you the very best of your needs, with a focus on<br/>
                        <span>high-quality technology</span> and <span>world-class service.</span>
                    </p>
                    <a href="about.php" class="btn btn-wwd">Learn More</a>
                </div>
            </div>
        </section>

        <!-- Buttons -->
        <section class="container-fluid section-buttons mb-5">
            <div class="general-container d-flex justify-content-center align-items-center full-div">
                <div class="row">
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
                                    <img src="../images/assist.png" class="card-img-top" alt="Repair">
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