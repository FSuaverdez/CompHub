<header id="header-nav" class="container-fluid header-custom px-0" style="width: 100%">
    <nav class="navbar navbar-expand-md navbar-custom p-0">
        <div id="navbar" style="background: url(../images/nav-big-bg.svg); background-size: cover; background-position: center">
            <a class="navbar-brand logo" id="nav-logo" href="home.php" style="display:none">
                <img src="../images/CompHub-logo.png" class="mx-auto my-2" style="height: 65px" />
            </a>
            <button class="navbar-toggler custom-toggler my-3" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" onclick="changeHeight()" style="float: right">
                <span class="navbar-toggler-icon "></span>
            </button>

            <div class="collapse navbar-collapse my-2 py-2" id="collapsibleNavbar">
                <ul class="navbar-nav navbar-custom mr-auto my-auto">
                    <li class="nav-item"><a class="nav-link mx-1 px-3 pt-3 pb-2" href="home.php" id="home">HOME</a></li>
                    <li class="nav-item"><a class="nav-link mx-1 px-3 pt-3 pb-2" href="shop.php" id="shop">SHOP</a></li>
                    <li class="nav-item"><a class="nav-link mx-1 px-3 pt-3 pb-2" href="repair.php" id="repair">REPAIR</a></li>
                    <!-- <li class="nav-item"><a class="nav-link mx-1 px-3 pt-3 pb-2" href="about.php" id="about">ABOUT US</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
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
            document.getElementById("navbar").style.padding = "30px 50px";
            document.getElementById("navbar").style.height = "100vh";
            document.getElementById("navbar").style.background = "url(../images/nav-big-bg.svg)";
            document.getElementById("navbar").style.backgroundSize = "cover";
            document.getElementById("navbar").style.backgroundPosition = "center";
            document.getElementById("nav-logo").style.display = "none";
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