<?php


include('header.php');
include('navbar.php');


?>



<?php
$totalAmount = 0;
$qty = 0;
require '../source/db_connect.php';


if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(

                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_qty'          =>    $_POST["qty"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(

            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_qty'          =>    $_POST["qty"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}





?>
<main class="general-container">
    <section class="container-fluid cart-holder mx-auto" style="margin-top: 7.5rem">
        <h1>Cart</h1>
        <hr />
        <div class="cart-container">
            <table class="table table-hover table-borderless">
                <thead>
                    <th scope="col" class="transaction-table-subtitle">Item</td>
                    <th scope="col" class="transaction-table-subtitle">Quantity</td>
                    <th scope="col" class="transaction-table-subtitle">Item Price</td>
                    <th scope="col" class="transaction-table-subtitle">Total Price</td>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $total = 0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                            <tr>
                                <td><?php echo $values["item_name"]; ?></td>
                                <td>
                                    <div id="checkCount"><?php echo $values["item_qty"]; ?></div>
                                </td>
                                <td>
                                    <div>₱<?php echo number_format($values["item_price"], 2); ?></div>
                                </td>
                                <td>
                                    <div>₱<span id="printSubtotal"><?php echo $values["item_price"] * $values["item_qty"]; ?></span>.00</div> <!-- checkCount * price -->
                                <?php
                                $total = $total + ($values['item_price'] * $values["item_qty"]);
                                $totalAmount = $total;
                            }
                                ?>
                                </td>
                            </tr>
                            <thead style="border-top: 1px solid #1c1a18">
                                <td class="transaction-table-total">Total</td>
                                <td class="transaction-table-total">-</td>
                                <td class="transaction-table-total">-</td>
                                <td class="transaction-table-total">
                                    <div>₱<span id="printTotal"><?php echo number_format($total, 2); ?></span></div> <!-- checkCount * price -->
                                </td>
                            </thead>
                        <?php
                    }
                        ?>
                </tbody>
            </table>
        </div>

        <button type="button" id="purchase_button" data-toggle="modal" data-target="#payment_modal" class="btn cart-button">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
            </svg>
            Purchase
        </button>


    </section>

    <div id="payment_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title movie-title">Confirm Purchase</h4>
                    <button type="button" class="close p-0 mr-1 mt-3" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <span>
                        <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>
                    </span>
                    <h6>Items</h6>
                    <td><?php echo $values["item_name"]; ?></td>
                    <span class="branch-title"></span>
                    <br><br>

                    <h6>Price: </h6>
                    <td><?php echo $values["item_price"]; ?></td>
                    <span class="branch-price"></span>
                    <br><br>
                    <h6>Quantity </h6>
                    <td><?php echo $values["item_qty"]; ?></td>
                    <span class="branch-price"></span>
                    <br><br>
                    <h6>Total</h6>
            <?php
                                $products = $values["item_name"];
                                $total = $total + ($values['item_price'] * $values['item_qty']);
                                $qty += $values['item_qty'];
                            }
                        }
            ?>
            <td><?php echo number_format($total, 2); ?></td>
            <span class="branch-title"></span>
            <br><br>

            <h6>Choose Payment Method: </h6>
            <div id="paypal-payment-button">
                <form method="post">

                    <input type="hidden" name="hidden_product" value="<?php foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                                            $values["item_name"];
                                                                        } ?>" />
                    <input type="hidden" name="hidden_total" value="<?php echo $total ?>" />

                    <div id="paypal-button"></div>

                </form>
                <!-- Transaction Button -->
            </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
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
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'AS0OYjYmD_LErfQVR-HptUpYDyRppEksv0HIXoB0ffSf1sufasjp64RCJdVkCmVDThFo9klYQQ1Ub0cL',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },
        // Enable Pay Now checkout flow (optional)
        commit: true,
        // Set up a payment
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: <?php echo $totalAmount; ?>,
                        currency: 'PHP'
                    },
                    item_list: {
                        items: [<?php foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                    echo json_encode(['name' => $values["item_name"], 'description' => $values["item_name"], 'quantity' => $values["item_qty"], 'price' => $values["item_price"], 'tax' => '0.1', "sku" => $keys + 1, "currency" => "PHP"]);
                                } ?>]
                    }
                }]
            });
        },

        // Execute the payment
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(async function(data) {
                console.log(data)
                $.ajax({
                    type: "POST",
                    url: "transaction.php",
                    data: {
                        hidden_product: '<?php foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                echo $values["item_name"];
                                            } ?>',
                        hidden_total: <?php echo $totalAmount; ?>,
                        transaction_id: data.transactions[0].related_resources[0].sale.id,
                        qty: <?php echo $qty; ?>,
                    },
                    cache: false,
                    success: function(data) {
                        const response = JSON.parse(data)
                        if (response.transaction_id) {
                            alert('Payment Successful');
                            window.location.assign('home.php')
                        } else {
                            alert('Payment Error');
                            window.location.assign('home.php')
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                        alert('Payment Error');
                        window.location.assign('home.php')
                    }
                })
            }).catch(error => {
                console.log('error')
            });
        }
    }, '#paypal-button');
</script>
<?php include('footer.php'); ?>