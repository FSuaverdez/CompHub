<?php
    include('header.php');
    include('navbar.php');

    $mysqli = new mysqli('localhost', 'root', '','request') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);
?>
<main class="general-container">
    <section class="container-fluid about-holder mx-auto" style="margin-top: 7.5rem">
        <h1 class="aboutus-title">About Us</h1>
        <section class="container-fluid mb-5">
            <div class="aboutus my-3">
                <p class="aboutus-p">Welcome to Giga Shop, your number one source of computer hardware components and best repair services. We're dedicated to giving you the very best of your needs, with a focus on high-quality technology and world-class service.</p>
                <p class="aboutus-p">Founded in 2021 by Giga Masters Inc., Giga Shop has come a long way from its beginnings in the Technological University of the Philippines. When Giga Shop first started out, their passion for repair services drove them to provide better services by supplying high-quality technology so that Giga Masters Inc. can offer you world-class quality experience at your home or in your office. We now serve customers all over country, and are thrilled that we're able to turn our passion into our own website.</p>
                <p class="aboutus-p">We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
                <br/>
                <p>Sincerely,<br/>Giga Masters Inc.</p>
            </div>
        </section>

        <hr class="short-line"/>

        <h1 class="aboutus-title">Contact Us</h1>
        <div class="contact-content">
            <p><a href="https://mail.google.com/mail/?view=cm&fs=1&to=contactus.gigashop@gmail.com" target="_blank">contactus.gigashop@gmail.com</a></p>
        </div>

        <hr class="short-line"/>

        <h1 class="aboutus-title">Owners</h1>
        <section class="container-fluid about-holder mb-5 mx-auto"></section></section>
            <div class="row mx-auto text-center">
                <div class="col col-md-3 col-sm-6 my-3">
                    <div class="member-container">
                        <img src="../images/members/angelo.png" class="round-image" />
                    </div>
                    <p class="member my-2">Angelo Baclaan</p>
                </div>
                <div class="col col-md-3 col-sm-6 my-3">
                    <div class="member-container">
                        <img src="../images/members/alvin.png" class="round-image" />
                    </div>
                    <p class="member my-2">Alvin Lim</p>
                </div>
                <div class="col col-md-3 col-sm-6 my-3">
                    <div class="member-container">
                    <img src="../images/members/frannz.png" class="round-image" />
                    </div>
                    <p class="member my-2">Frannz Suaverdez</p>
                </div>
                <div class="col col-md-3 col-sm-6 my-3">
                    <div class="member-container">
                        <img src="../images/members/julius.png" class="round-image" />
                    </div>
                    <p class="member my-2">Julius Villa</p>
                </div>
            </div>
        </section>
    </section>
</main>

<script>
    document.getElementById("about").style.fontWeight = "bold";
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